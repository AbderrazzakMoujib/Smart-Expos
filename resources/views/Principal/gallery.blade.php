@extends('Layouts.master')

@section('title', __('message.gallery_title'))
@section('description', __('message.gallery_desc'))

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">
@endpush

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="sg-hero">
  <video class="sg-hero__video" autoplay muted loop playsinline preload="auto">
    <source src="{{ asset('assets/img/video/IMMOTECH 2024.mp4') }}" type="video/mp4">
  </video>
  <div class="sg-hero__overlay" aria-hidden="true"></div>
  <div class="sg-hero__content">
    <span class="sg-hero__kicker">{{ __('message.gallery_hero_kicker') }}</span>
    <h1 class="sg-hero__title">{{ __('message.gallery_hero_h1a') }}<br>{{ __('message.gallery_hero_h1b') }} <em>{{ __('message.gallery_hero_em') }}</em></h1>
    <p class="sg-hero__sub">{{ __('message.gallery_hero_sub') }}</p>
    <nav class="sg-hero__breadcrumb" aria-label="Fil d'Ariane">
      <a href="{{ route('home') }}">{{ __('message.breadcrumb_home') }}</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">{{ __('message.breadcrumb_gallery') }}</span>
    </nav>
  </div>
</section>

{{-- ===================== UNIFIED GRID ===================== --}}
<section class="sg-section">
  <div class="sg-container">

    <header class="sg-section-header">
      <span class="sg-kicker">{{ __('message.gallery_kicker') }}</span>
      <h2 class="sg-title">{{ __('message.gallery_h2') }}</h2>
      <p class="sg-lead">{{ __('message.gallery_lead') }}</p>
    </header>

    @if($myposts->isEmpty() && $categories->isEmpty())
    <div style="text-align:center;color:#999;padding:60px 0;font-size:1rem">
      {{ __('message.gallery_empty') }}
    </div>
    @else
    <div class="sg-logos-grid">

      {{-- ── Events ── --}}
      @foreach($myposts as $post)
      @php
        $photos = array_values(array_filter([
          $post->img1 ? asset('storage/'.$post->img1) : null,
          $post->img2 ? asset('storage/'.$post->img2) : null,
          $post->img3 ? asset('storage/'.$post->img3) : null,
        ]));
        foreach ($post->extra_photos ?? [] as $ep) {
          $photos[] = asset("storage/{$ep}");
        }
        $hasPhotos  = count($photos) > 0;
        $logoSrc    = $post->logo  ? asset('storage/'.$post->logo)  : null;
        $coverSrc   = $post->image ? asset('storage/'.$post->image) : null;
        $displayImg = $logoSrc ?: $coverSrc;
      @endphp

      <div class="sg-logo-card sg-reveal {{ $hasPhotos ? 'has-photos' : '' }}"
           data-photos="{{ $hasPhotos ? json_encode($photos) : '[]' }}"
           data-title="{{ $post->title }}">
        <div class="sg-logo-card__inner">

          <div class="sg-logo-card__front">
            <div class="sg-logo-card__img-wrap">
              @if($displayImg)
                <img src="{{ $displayImg }}" alt="{{ $post->title }}" loading="lazy">
              @else
                <div class="sg-logo-card__placeholder">
                  <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                  <span>{{ $post->title }}</span>
                </div>
              @endif
              @if($hasPhotos)
              <div class="sg-logo-card__overlay">
                <span class="sg-logo-card__view">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  {{ count($photos) }} photo{{ count($photos) > 1 ? 's' : '' }}
                </span>
              </div>
              @endif
            </div>
            <div class="sg-logo-card__info">
              <span class="sg-logo-card__name">{{ Str::limit($post->title, 38) }}</span>
              @if($post->event_type)
              <span class="sg-logo-card__tag">{{ $post->event_type }}</span>
              @endif
            </div>
          </div>

          @if($hasPhotos)
          <div class="sg-logo-card__back">
            <div class="sg-logo-card__back-header">
              <span class="sg-logo-card__back-title">{{ Str::limit($post->title, 28) }}</span>
              <button class="sg-logo-card__back-close" aria-label="Retourner">&#x2715;</button>
            </div>
            <div class="sg-logo-card__photos">
              @foreach($photos as $src)
              <div class="sg-photo-thumb" data-src="{{ $src }}">
                <img src="{{ $src }}" alt="{{ $post->title }}" loading="lazy">
              </div>
              @endforeach
            </div>
            <a href="{{ route('post.show', $post->slug) }}" class="sg-logo-card__back-link">
              {{ __('message.gallery_view_event') }}
            </a>
          </div>
          @endif

        </div>
      </div>
      @endforeach

      {{-- ── Categories (manually created) ── --}}
      @foreach($categories as $cat)
      @php
        $catPhotos  = $cat->photos->map(fn($p) => asset('storage/'.$p->path))->values()->toArray();
        $catCover   = $cat->cover ? asset('storage/'.$cat->cover) : ($catPhotos[0] ?? null);
        $catCount   = count($catPhotos);
      @endphp

      <div class="sg-logo-card sg-reveal {{ $catCount > 0 ? 'has-photos' : '' }}"
           data-photos="{{ json_encode($catPhotos) }}"
           data-title="{{ $cat->name }}">
        <div class="sg-logo-card__inner">

          <div class="sg-logo-card__front">
            <div class="sg-logo-card__img-wrap">
              @if($catCover)
                <img src="{{ $catCover }}" alt="{{ $cat->name }}" loading="lazy">
              @else
                <div class="sg-logo-card__placeholder">
                  <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                  <span>{{ $cat->name }}</span>
                </div>
              @endif
              @if($catCount > 0)
              <div class="sg-logo-card__overlay">
                <span class="sg-logo-card__view">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                  {{ $catCount }} photo{{ $catCount > 1 ? 's' : '' }}
                </span>
              </div>
              @endif
            </div>
            <div class="sg-logo-card__info">
              <span class="sg-logo-card__name">{{ Str::limit($cat->name, 38) }}</span>
              <span class="sg-logo-card__tag">{{ __('message.gallery_album_tag') }}</span>
            </div>
          </div>

          @if($catCount > 0)
          <div class="sg-logo-card__back">
            <div class="sg-logo-card__back-header">
              <span class="sg-logo-card__back-title">{{ Str::limit($cat->name, 28) }}</span>
              <button class="sg-logo-card__back-close" aria-label="Retourner">&#x2715;</button>
            </div>
            <div class="sg-logo-card__photos">
              @foreach($catPhotos as $src)
              <div class="sg-photo-thumb" data-src="{{ $src }}">
                <img src="{{ $src }}" alt="{{ $cat->name }}" loading="lazy">
              </div>
              @endforeach
            </div>
          </div>
          @endif

        </div>
      </div>
      @endforeach

    </div>
    @endif

  </div>
</section>

{{-- ===================== LIGHTBOX ===================== --}}
<div class="sg-lightbox" id="sgLightbox" role="dialog" aria-modal="true" aria-label="Visionneuse photos">
  <div class="sg-lightbox__backdrop" id="sgLbBackdrop"></div>
  <div class="sg-lightbox__panel">
    <div class="sg-lightbox__header">
      <span class="sg-lightbox__event-title" id="sgLbTitle"></span>
      <button class="sg-lightbox__close" id="sgLbClose" aria-label="Fermer">&#x2715;</button>
    </div>
    <div class="sg-lightbox__stage">
      <button class="sg-lightbox__prev" id="sgLbPrev" aria-label="Précédent">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
      </button>
      <div class="sg-lightbox__img-wrap">
        <img class="sg-lightbox__img" id="sgLbImg" src="" alt="">
      </div>
      <button class="sg-lightbox__next" id="sgLbNext" aria-label="Suivant">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
      </button>
    </div>
    <div class="sg-lightbox__footer">
      <div class="sg-lightbox__thumbs" id="sgLbThumbs"></div>
      <span class="sg-lightbox__counter" id="sgLbCounter"></span>
    </div>
  </div>
</div>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/gallery.js') }}"></script>
@endpush

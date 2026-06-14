@extends('Layouts.master')

@section('title', __('message.salons_title'))
@section('description', __('message.salons_desc'))

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/salons.css') }}">
@endpush

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="ss-hero">
  <video class="ss-hero__video" autoplay muted loop playsinline preload="auto">
    <source src="{{ asset('assets/img/video/seafood4africa2026.mp4') }}" type="video/mp4">
  </video>
  <div class="ss-hero__overlay" aria-hidden="true"></div>
  <div class="ss-hero__content">
    <span class="ss-hero__kicker">{{ __('message.salons_hero_kicker') }}</span>
    <h1 class="ss-hero__title">{{ __('message.salons_hero_h1a') }} <em>{{ __('message.salons_hero_em') }}</em><br>{{ __('message.salons_hero_h1b') }}</h1>
    <p class="ss-hero__sub">{{ __('message.salons_hero_sub') }}</p>
    <nav class="ss-hero__breadcrumb" aria-label="Fil d'Ariane">
      <a href="{{ route('home') }}">{{ __('message.breadcrumb_home') }}</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">{{ __('message.breadcrumb_salons') }}</span>
    </nav>
  </div>
</section>

{{-- ===================== EVENTS GRID ===================== --}}
<section class="ss-section">
  <div class="ss-container">

    <header class="ss-section-header">
      <span class="ss-kicker">{{ __('message.salons_kicker') }}</span>
      <h2 class="ss-title">{{ __('message.salons_h2') }}</h2>
      <p class="ss-lead">{{ __('message.salons_lead') }}</p>
    </header>

    <div class="ss-grid">
      @forelse($myposts as $post)
      <a href="{{ route('post.show', ['slug' => $post->slug]) }}" class="ss-card">

        <div class="ss-card__img-wrap">
          @php $cover = $post->image ?: $post->logo; @endphp
          <img src="{{ asset("storage/$cover") }}"
               alt="{{ $post->title }}"
               loading="lazy">

          @if($post->date)
          <div class="ss-card__date">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
              <rect x="3" y="4" width="18" height="18" rx="2"/>
              <line x1="16" y1="2" x2="16" y2="6"/>
              <line x1="8" y1="2" x2="8" y2="6"/>
              <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            <span>{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d M Y') }}</span>
          </div>
          @endif

          <div class="ss-card__arrow">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </div>
        </div>

        <div class="ss-card__body">
          <span class="ss-card__tag">{{ __('message.salons_tag') }}</span>
          <h3 class="ss-card__title">{{ $post->title }}</h3>
          <span class="ss-card__cta">
            {{ __('message.salons_discover') }}
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </span>
        </div>

      </a>
      @empty
        <p class="ss-empty">{{ __('message.salons_empty') }}</p>
      @endforelse
    </div>

  </div>
</section>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/salons.js') }}"></script>
@endpush

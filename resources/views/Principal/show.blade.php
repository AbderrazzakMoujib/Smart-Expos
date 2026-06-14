@extends('Layouts.master')

@section('title', ($post->seo_title ?: $post->title) . ' — Smart Expos & Events Morocco')
@section('description', $post->meta_description ?: $post->excerpt)
@section('og_type', 'article')
@php
  $_ogImg = $post->image ? 'storage/'.$post->image : ($post->logo ? 'storage/'.$post->logo : 'assets/img/Smart-Expo-&-Events-Morocco.png');
@endphp
@section('og_image', asset($_ogImg))

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/show.css') }}">
@endpush

@push('schema')
@php
  $eventSchema = [
    '@context'  => 'https://schema.org',
    '@type'     => 'Event',
    'name'      => $post->title,
    'description' => $post->meta_description ?: $post->excerpt ?: $post->title . ' — Événement professionnel organisé par Smart Expos & Events Morocco.',
    'location'  => [
      '@type'   => 'Place',
      'name'    => $post->location ?: 'Maroc',
      'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'MA'],
    ],
    'organizer' => [
      '@type' => 'Organization',
      'name'  => 'Smart Expos & Events Morocco',
      'url'   => config('app.url'),
    ],
    'url'   => url()->current(),
    'image' => config('app.url').'/'.ltrim($_ogImg, '/'),
  ];
  if ($post->date) $eventSchema['startDate'] = \Carbon\Carbon::parse($post->date)->toIso8601String();
@endphp
<script type="application/ld+json">{!! json_encode($eventSchema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@php
  $breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
      ['@type' => 'ListItem', 'position' => 1, 'name' => 'Accueil',          'item' => route('home')],
      ['@type' => 'ListItem', 'position' => 2, 'name' => 'Nos Événements',   'item' => route('salons')],
      ['@type' => 'ListItem', 'position' => 3, 'name' => $post->title,       'item' => url()->current()],
    ],
  ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="sv-hero">
  @if($video)
  <video class="sv-hero__img sv-hero__video" autoplay muted loop playsinline preload="auto">
    <source src="{{ $video }}" type="video/mp4">
  </video>
  @elseif($post->image)
  <img class="sv-hero__img"
       src="{{ asset('storage/'.$post->image) }}"
       alt="{{ $post->title }}"
       loading="eager">
  @else
  <div class="sv-hero__img sv-hero__fallback"></div>
  @endif
  <div class="sv-hero__overlay" aria-hidden="true"></div>
  <div class="sv-hero__content">
    @if($post->event_type)
    <span class="sv-hero__type">{{ $post->event_type }}</span>
    @endif
    @if($post->date)
    <div class="sv-hero__date">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
        <rect x="3" y="4" width="18" height="18" rx="2"/>
        <line x1="16" y1="2" x2="16" y2="6"/>
        <line x1="8" y1="2" x2="8" y2="6"/>
        <line x1="3" y1="10" x2="21" y2="10"/>
      </svg>
      {{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}
    </div>
    @endif
    <h1 class="sv-hero__title">{{ $post->title }}</h1>
    <nav class="sv-hero__breadcrumb" aria-label="Fil d'Ariane">
      <a href="{{ route('home') }}">{{ __('message.breadcrumb_home') }}</a>
      <span aria-hidden="true">›</span>
      <a href="{{ route('salons') }}">{{ __('message.breadcrumb_salons') }}</a>
      <span aria-hidden="true">›</span>
      <span aria-current="page">{{ Str::limit($post->title, 35) }}</span>
    </nav>
  </div>
</section>

{{-- ===================== CONTENT ===================== --}}
<div class="sv-layout">

  {{-- ── Article ── --}}
  <article class="sv-article">

    <a href="{{ route('salons') }}" class="sv-back">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
        <polyline points="15 18 9 12 15 6"/>
      </svg>
      {{ __('message.show_back') }}
    </a>

    <div class="sv-divider"></div>

    {{-- Description --}}
    @if($post->body)
    <div class="sv-article__body">
      {!! $post->body !!}
    </div>
    @endif

    {{-- Ce qui s'est passé --}}
    @if($post->what_happened)
    <div class="sv-info-block sv-info-block--green">
      <div class="sv-info-block__icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <polyline points="9 11 12 14 22 4"/>
          <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
        </svg>
      </div>
      <div class="sv-info-block__content">
        <div class="sv-info-block__title">{{ __('message.show_what_happened') }}</div>
        <div class="sv-info-block__text">{{ $post->what_happened }}</div>
      </div>
    </div>
    @endif

    {{-- Ce qui va se passer --}}
    @if($post->what_upcoming)
    <div class="sv-info-block sv-info-block--blue">
      <div class="sv-info-block__icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <circle cx="12" cy="12" r="10"/>
          <polyline points="12 6 12 12 16 14"/>
        </svg>
      </div>
      <div class="sv-info-block__content">
        <div class="sv-info-block__title">{{ __('message.show_upcoming') }}</div>
        <div class="sv-info-block__text">{{ $post->what_upcoming }}</div>
      </div>
    </div>
    @endif

    {{-- Photos gallery --}}
    @php
      $photos = array_values(array_filter([
        $post->img1 ?? null,
        $post->img2 ?? null,
        $post->img3 ?? null,
      ]));
    @endphp

    @php
      $allPhotos = collect($photos)->map(fn($p) => asset('storage/'.$p));
      $catPhotos = $category
          ? $category->photos
              ->pluck('path')
              ->diff($photos)
              ->map(fn($p) => asset('storage/'.$p))
          : collect();
      $allPhotos = $allPhotos->merge($catPhotos)->values();
    @endphp

    @if($allPhotos->count())
    <div class="sv-gallery">
      <h2 class="sv-gallery__title">{{ __('message.show_photos_title') }}</h2>
      <div class="sv-gallery__grid">
        @foreach($allPhotos as $src)
        <div class="sv-gallery__item" data-src="{{ $src }}">
          <img src="{{ $src }}" alt="{{ $post->title }}" loading="lazy">
          <div class="sv-gallery__zoom">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
              <circle cx="11" cy="11" r="8"/>
              <line x1="21" y1="21" x2="16.65" y2="16.65"/>
              <line x1="11" y1="8" x2="11" y2="14"/>
              <line x1="8" y1="11" x2="14" y2="11"/>
            </svg>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif

  </article>

  {{-- ── Sidebar ── --}}
  <aside class="sv-sidebar">
    <div class="sv-sidebar__card">

      {{-- Logo --}}
      @if($post->logo)
      <div class="sv-sidebar__logo-wrap">
        <img src="{{ asset('storage/'.$post->logo) }}" alt="{{ $post->title }} logo" loading="lazy" decoding="async">
      </div>
      @endif

      <div class="sv-sidebar__head">
        @if($post->event_type)
        <span class="sv-sidebar__type-badge">{{ $post->event_type }}</span>
        @endif
        <span class="sv-sidebar__event">{{ $post->title }}</span>
      </div>

      <div class="sv-sidebar__body">

        @if($post->date)
        <div class="sv-sidebar__row">
          <div class="sv-sidebar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
              <rect x="3" y="4" width="18" height="18" rx="2"/>
              <line x1="16" y1="2" x2="16" y2="6"/>
              <line x1="8" y1="2" x2="8" y2="6"/>
              <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
          </div>
          <div class="sv-sidebar__info">
            <span class="sv-sidebar__info-label">{{ __('message.show_date') }}</span>
            <span class="sv-sidebar__info-val">{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}</span>
          </div>
        </div>
        <div class="sv-sidebar__sep"></div>
        @endif

        <div class="sv-sidebar__row">
          <div class="sv-sidebar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
              <circle cx="12" cy="10" r="3"/>
            </svg>
          </div>
          <div class="sv-sidebar__info">
            <span class="sv-sidebar__info-label">{{ __('message.show_location') }}</span>
            <span class="sv-sidebar__info-val">{{ $post->location ?: __('message.show_location_default') }}</span>
          </div>
        </div>
        <div class="sv-sidebar__sep"></div>

        <div class="sv-sidebar__row">
          <div class="sv-sidebar__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
              <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
            </svg>
          </div>
          <div class="sv-sidebar__info">
            <span class="sv-sidebar__info-label">{{ __('message.show_organizer') }}</span>
            <span class="sv-sidebar__info-val">Smart Expos &amp; Events Morocco</span>
          </div>
        </div>

      </div>

      <a href="{{ route('contact') }}" class="sv-sidebar__cta">
        {{ __('message.show_cta') }}
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
      </a>

    </div>
  </aside>

</div>

{{-- ===================== LIGHTBOX ===================== --}}
<div class="sv-lightbox" id="svLightbox" role="dialog" aria-modal="true">
  <div class="sv-lightbox__backdrop"></div>
  <img class="sv-lightbox__img" id="svLbImg" src="" alt="Photo de l'événement">
  <button class="sv-lightbox__close" id="svLbClose" aria-label="Fermer">&#x2715;</button>
</div>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/show.js') }}"></script>
@endpush

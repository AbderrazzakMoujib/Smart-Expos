{{-- ============================================================
     resources/views/Principal/home.blade.php
     Home page — Smart Expos & Events Morocco
     ============================================================ --}}

@extends('Layouts.master')

@section('title', setting('site.title'))
@section('description', setting('site.description'))

@section('preload_lcp')
  <link rel="preload" as="image" href="{{ asset('assets/img/logo_smart.webp') }}" fetchpriority="high">
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="hero" aria-label="Hero video slider">

  {{-- Slides vidéo --}}
  <div class="hero-slide is-active">
    <video class="hero-video" autoplay muted loop playsinline preload="metadata">
      <source src="{{ asset('assets/img/video/cérémonie_d-ouverture-l-exposition.mp4') }}" type="video/mp4">
    </video>
  </div>
  <div class="hero-slide">
    <video class="hero-video" autoplay muted loop playsinline preload="none">
      <source src="{{ asset('assets/img/video/Refrigairexpo_22-20Mai_202025.mp4') }}" type="video/mp4">
    </video>
  </div>
  <div class="hero-slide">
    <video class="hero-video" autoplay muted loop playsinline preload="none">
      <source src="{{ asset('assets/img/video/seafood4africa2026.mp4') }}" type="video/mp4">
    </video>
  </div>

  {{-- Overlay dégradé --}}
  <div class="hero-overlay" aria-hidden="true"></div>

  {{-- Contenu central --}}
  <div class="hero-content">

    <span class="hero-kicker">
      <span class="hero-kicker__dot"></span>
      {{ __('message.hero_kicker') }}
    </span>

    <h1 class="hero-title">
      {{ __('message.hero_title1') }}
      <em class="hero-title__accent">{{ __('message.hero_title_em') }}</em><br>
      {{ __('message.hero_title2') }}
    </h1>

    <p class="hero-subtitle">
      {!! __('message.hero_subtitle') !!}
    </p>

    <div class="hero-actions">
      <a href="{{ route('about') }}" class="hero-btn hero-btn--primary">
        <span>{{ __('message.hero_btn1') }}</span>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
      <a href="{{ route('salons') }}" class="hero-btn hero-btn--outline">
        <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" stroke-width="2" fill="none" stroke="currentColor"/><path d="M16 2v4M8 2v4M3 10h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        <span>{{ __('message.hero_btn2') }}</span>
      </a>
    </div>

    {{-- Indicateurs de confiance --}}
    <div class="hero-stats" aria-label="{{ __('message.hero_kicker') }}">
      <div class="hero-stat">
        <strong class="hero-stat__num">{{ __('message.hero_stat1_num') }}</strong>
        <span class="hero-stat__label">{{ __('message.hero_stat1_lbl') }}</span>
      </div>
      <div class="hero-stat__divider" aria-hidden="true"></div>
      <div class="hero-stat">
        <strong class="hero-stat__num">{{ __('message.hero_stat2_num') }}</strong>
        <span class="hero-stat__label">{{ __('message.hero_stat2_lbl') }}</span>
      </div>
      <div class="hero-stat__divider" aria-hidden="true"></div>
      <div class="hero-stat">
        <strong class="hero-stat__num">{{ __('message.hero_stat3_num') }}</strong>
        <span class="hero-stat__label">{{ __('message.hero_stat3_lbl') }}</span>
      </div>
    </div>

  </div>

  {{-- Indicateur de scroll --}}
  <button class="hero-scroll" aria-label="{{ __('message.hero_scroll') }}" onclick="document.getElementById('about-sec').scrollIntoView({behavior:'smooth'})">
    <span class="hero-scroll__line"></span>
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
  </button>

  {{-- Pagination points vidéo --}}
  <div class="hero-dots" role="tablist" aria-label="Navigation vidéo">
    <button class="hero-dot is-active" role="tab" aria-selected="true"  aria-label="Vidéo 1"></button>
    <button class="hero-dot"           role="tab" aria-selected="false" aria-label="Vidéo 2"></button>
    <button class="hero-dot"           role="tab" aria-selected="false" aria-label="Vidéo 3"></button>
  </div>

</section>


{{-- ===================== ABOUT ===================== --}}
<section class="se-about" id="about-sec">
  <div class="se-container se-about__grid">

    {{-- Media column --}}
    <div class="se-about__media">
      <div class="se-stack">
        <img src="{{ asset('assets/img/normal/about_22.webp') }}"
             alt="Smart Expos Team"
             class="se-stack__main"
             width="600" height="450"
             loading="lazy" decoding="async">
        <img src="{{ asset('assets/img/normal/about_11.webp') }}"
             alt="Smart Expos Work"
             class="se-stack__overlay"
             width="300" height="220"
             loading="lazy" decoding="async">
      </div>

      <div class="se-badge" aria-label="+5 années d'expérience">
        <span class="se-badge__num counter" data-target="5">0</span>
        <span class="se-badge__label">{{ __('message.list7') }}</span>
      </div>
    </div>

    {{-- Content column --}}
    <div class="se-about__content">
      <span class="se-kicker">{{ __('message.about') }}</span>
      <h2 class="se-title">Smart Expos &amp; Events Morocco</h2>
      <p class="se-lead">{{ __('message.textAbout') }}</p>

      <ul class="se-checklist">
        <li>{{ __('message.list1') }}</li>
        <li>{{ __('message.list2') }}</li>
        <li>{{ __('message.list3') }}</li>
        <li>{{ __('message.list4') }}</li>
        <li>{{ __('message.list5') }}</li>
        <li>{{ __('message.list6') }}</li>
      </ul>

      <a href="{{ route('about') }}" class="se-btn se-btn--primary">
        <span>{{ __('message.btn1') }}</span>
      </a>
    </div>

  </div>
</section>


{{-- ===================== SERVICES ===================== --}}
<section class="se-services" id="services"
         data-bg="{{ asset('assets/img/normal/services-bg.webp') }}">
  <div class="se-container">

    <header class="se-section-header">
      <span class="se-kicker">{{ __('message.services_kicker') }}</span>
      <h2 class="se-section-title">{{ __('message.services_title') }}</h2>
      <p class="se-section-lead">{{ __('message.services_lead') }}</p>
    </header>

    {{-- Ligne 1 : 3 cartes --}}
    <div class="se-services__grid">

      {{-- Card 1 --}}
      <article class="se-service-card">
        <div class="se-service-card__inner">
          <div class="se-service-card__front">
            <span class="se-service-card__num">01</span>
            <div class="se-service-card__icon">
              <svg viewBox="0 0 64 64" aria-hidden="true">
                <rect x="12" y="16" width="40" height="32" rx="4" stroke="currentColor" stroke-width="3" fill="none"/>
                <path d="M20 24h24M20 32h24M20 40h16" stroke="currentColor" stroke-width="2.5"/>
              </svg>
            </div>
            <h3 class="se-service-card__title">{{ __('message.svc1_title') }}</h3>
            <p class="se-service-card__brief">{{ __('message.svc1_brief') }}</p>
            <span class="se-service-card__cta" aria-hidden="true">
              {{ __('message.svc_discover') }}
              <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </div>
          <div class="se-service-card__back">
            <h3 class="se-service-card__title">{{ __('message.svc1_title') }}</h3>
            <ul>
              <li>{{ __('message.svc1_back1') }}</li>
              <li>{{ __('message.svc1_back2') }}</li>
              <li>{{ __('message.svc1_back3') }}</li>
              <li>{{ __('message.svc1_back4') }}</li>
              <li>{{ __('message.svc1_back5') }}</li>
              <li>{{ __('message.svc1_back6') }}</li>
            </ul>
            <button type="button" class="se-btn se-btn--card se-quote-trigger" data-service="{{ __('message.svc1_title') }}">{{ __('message.svc_quote') }}</button>
          </div>
        </div>
      </article>

      {{-- Card 2 --}}
      <article class="se-service-card">
        <div class="se-service-card__inner">
          <div class="se-service-card__front">
            <span class="se-service-card__num">02</span>
            <div class="se-service-card__icon">
              <svg viewBox="0 0 64 64" aria-hidden="true">
                <path d="M8 48V24L32 12l24 12v24M16 28v20M24 28v20M40 28v20M48 28v20" stroke="currentColor" stroke-width="3" fill="none"/>
              </svg>
            </div>
            <h3 class="se-service-card__title">{{ __('message.svc2_title') }}</h3>
            <p class="se-service-card__brief">{{ __('message.svc2_brief') }}</p>
            <span class="se-service-card__cta" aria-hidden="true">
              {{ __('message.svc_discover') }}
              <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </div>
          <div class="se-service-card__back">
            <h3 class="se-service-card__title">{{ __('message.svc2_title') }}</h3>
            <ul>
              <li>{{ __('message.svc2_back1') }}</li>
              <li>{{ __('message.svc2_back2') }}</li>
              <li>{{ __('message.svc2_back3') }}</li>
              <li>{{ __('message.svc2_back4') }}</li>
              <li>{{ __('message.svc2_back5') }}</li>
              <li>{{ __('message.svc2_back6') }}</li>
            </ul>
            <button type="button" class="se-btn se-btn--card se-quote-trigger" data-service="{{ __('message.svc2_title') }}">{{ __('message.svc_quote') }}</button>
          </div>
        </div>
      </article>

      {{-- Card 3 --}}
      <article class="se-service-card">
        <div class="se-service-card__inner">
          <div class="se-service-card__front">
            <span class="se-service-card__num">03</span>
            <div class="se-service-card__icon">
              <svg viewBox="0 0 64 64" aria-hidden="true">
                <rect x="8" y="16" width="48" height="32" rx="4" stroke="currentColor" stroke-width="3" fill="none"/>
                <circle cx="32" cy="32" r="6" fill="currentColor"/>
                <path d="M20 32h6M38 32h6M32 26v-6M32 38v6" stroke="currentColor" stroke-width="2.5"/>
              </svg>
            </div>
            <h3 class="se-service-card__title">{{ __('message.svc3_title') }}</h3>
            <p class="se-service-card__brief">{{ __('message.svc3_brief') }}</p>
            <span class="se-service-card__cta" aria-hidden="true">
              {{ __('message.svc_discover') }}
              <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </div>
          <div class="se-service-card__back">
            <h3 class="se-service-card__title">{{ __('message.svc3_title') }}</h3>
            <ul>
              <li>{{ __('message.svc3_back1') }}</li>
              <li>{{ __('message.svc3_back2') }}</li>
              <li>{{ __('message.svc3_back3') }}</li>
              <li>{{ __('message.svc3_back4') }}</li>
              <li>{{ __('message.svc3_back5') }}</li>
              <li>{{ __('message.svc3_back6') }}</li>
            </ul>
            <button type="button" class="se-btn se-btn--card se-quote-trigger" data-service="{{ __('message.svc3_title') }}">{{ __('message.svc_quote') }}</button>
          </div>
        </div>
      </article>

    </div>{{-- /.se-services__grid --}}

    {{-- Ligne 2 : 2 cartes centrées --}}
    <div class="se-services__grid-row2">

      {{-- Card 4 --}}
      <article class="se-service-card">
        <div class="se-service-card__inner">
          <div class="se-service-card__front">
            <span class="se-service-card__num">04</span>
            <div class="se-service-card__icon">
              <svg viewBox="0 0 64 64" aria-hidden="true">
                <path d="M16 32l12-12 12 12 12-12" stroke="currentColor" stroke-width="3" fill="none"/>
                <circle cx="16" cy="32" r="4" fill="currentColor"/>
                <circle cx="28" cy="20" r="4" fill="currentColor"/>
                <circle cx="40" cy="32" r="4" fill="currentColor"/>
                <circle cx="52" cy="20" r="4" fill="currentColor"/>
              </svg>
            </div>
            <h3 class="se-service-card__title">{{ __('message.svc4_title') }}</h3>
            <p class="se-service-card__brief">{{ __('message.svc4_brief') }}</p>
            <span class="se-service-card__cta" aria-hidden="true">
              {{ __('message.svc_discover') }}
              <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </div>
          <div class="se-service-card__back">
            <h3 class="se-service-card__title">{{ __('message.svc4_title') }}</h3>
            <ul>
              <li>{{ __('message.svc4_back1') }}</li>
              <li>{{ __('message.svc4_back2') }}</li>
              <li>{{ __('message.svc4_back3') }}</li>
              <li>{{ __('message.svc4_back4') }}</li>
              <li>{{ __('message.svc4_back5') }}</li>
              <li>{{ __('message.svc4_back6') }}</li>
            </ul>
            <button type="button" class="se-btn se-btn--card se-quote-trigger" data-service="{{ __('message.svc4_title') }}">{{ __('message.svc_quote') }}</button>
          </div>
        </div>
      </article>

      {{-- Card 5 --}}
      <article class="se-service-card">
        <div class="se-service-card__inner">
          <div class="se-service-card__front">
            <span class="se-service-card__num">05</span>
            <div class="se-service-card__icon">
              <svg viewBox="0 0 64 64" aria-hidden="true">
                <circle cx="32" cy="20" r="8" stroke="currentColor" stroke-width="3" fill="none"/>
                <path d="M18 52V38c0-4 4-6 14-6s14 2 14 6v14" stroke="currentColor" stroke-width="3" fill="none"/>
              </svg>
            </div>
            <h3 class="se-service-card__title">{{ __('message.svc5_title') }}</h3>
            <p class="se-service-card__brief">{{ __('message.svc5_brief') }}</p>
            <span class="se-service-card__cta" aria-hidden="true">
              {{ __('message.svc_discover') }}
              <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </div>
          <div class="se-service-card__back">
            <h3 class="se-service-card__title">{{ __('message.svc5_title') }}</h3>
            <ul>
              <li>{{ __('message.svc5_back1') }}</li>
              <li>{{ __('message.svc5_back2') }}</li>
              <li>{{ __('message.svc5_back3') }}</li>
              <li>{{ __('message.svc5_back4') }}</li>
              <li>{{ __('message.svc5_back5') }}</li>
              <li>{{ __('message.svc5_back6') }}</li>
            </ul>
            <button type="button" class="se-btn se-btn--card se-quote-trigger" data-service="{{ __('message.svc5_title') }}">{{ __('message.svc_quote') }}</button>
          </div>
        </div>
      </article>

    </div>{{-- /.se-services__grid-row2 --}}

  </div>
</section>


{{-- ===================== BLOG + GALLERY (parallax wrapper) ===================== --}}
<div class="se-parallax-wrap" data-bg="{{ asset('assets/img/normal/glitter-bokeh-background.webp') }}">

{{-- ===================== BLOG ===================== --}}
<section class="se-blog" aria-label="Blog slider">
  <div class="se-container">
    <header class="se-section-header">
      <span class="se-kicker">{{ __('message.blog_kicker') }}</span>
      <h2 class="se-section-title">{{ __('message.blog_title') }}</h2>
    </header>

    <div class="se-slider" data-slider>
      <div class="se-slider__track">

        @foreach($myposts as $post)
          <article class="se-card">
            <div class="se-card__media">
              @if($post->image)
                <img src="{{ asset("storage/{$post->image}") }}" alt="{{ $post->title }}" width="400" height="200" loading="lazy" decoding="async">
              @elseif($post->logo)
                <img src="{{ asset("storage/{$post->logo}") }}" alt="{{ $post->title }}" width="400" height="200" loading="lazy" decoding="async">
              @else
                <div class="se-card__media-placeholder"></div>
              @endif
            </div>
            <div class="se-card__body">
              <div class="se-card__meta">
                @if($post->date)
                  <time>{{ \Carbon\Carbon::parse($post->date)->translatedFormat('d F Y') }}</time>
                @endif
                <span>{{ __('message.blog_by') }}</span>
              </div>
              <h3 class="se-card__title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
            </div>
          </article>
        @endforeach

      </div>
      <button class="se-slider__btn se-slider__btn--prev" data-prev aria-label="Précédent">
        <svg viewBox="0 0 24 24" width="20" height="20"><path d="M15 6l-6 6 6 6" fill="none" stroke="currentColor" stroke-width="2"/></svg>
      </button>
      <button class="se-slider__btn se-slider__btn--next" data-next aria-label="Suivant">
        <svg viewBox="0 0 24 24" width="20" height="20"><path d="M9 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2"/></svg>
      </button>
      <div class="se-slider__dots" role="tablist" aria-label="Blog pagination"></div>
    </div>
  </div>
</section>


{{-- ===================== GALLERY ===================== --}}
<section class="se-gallery" aria-label="Gallery slider">
  <div class="se-container">

    <div class="se-gallery__head">
      <h2 class="se-kicker">{{ __('message.title4') }}</h2>
      <a href="{{ route('gallery') }}" class="se-btn se-btn--primary se-gallery__btn-desktop">{{ __('message.btn3') }}</a>
    </div>

    <div class="se-slider" data-slider>

      {{-- Track wrap handles overflow:hidden so edge fade masks work --}}
      <div class="se-slider__track-wrap">
        <div class="se-slider__track">
          @foreach($myposts as $post)
            <figure class="se-gallery__item">
              @php $thumb = $post->image ?: $post->logo; @endphp
              <img
                src="{{ asset("storage/$thumb") }}"
                alt="Smart Events Morocco Gallery"
                width="400" height="280"
                loading="{{ $loop->index < 3 ? 'eager' : 'lazy' }}"
                decoding="async"
              >
              <div class="se-gallery__overlay" aria-hidden="true"></div>
            </figure>
          @endforeach
        </div>
      </div>

      <button class="se-slider__btn se-slider__btn--prev" data-prev aria-label="Précédent">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 6l-6 6 6 6"/>
        </svg>
      </button>

      <button class="se-slider__btn se-slider__btn--next" data-next aria-label="Suivant">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 6l6 6-6 6"/>
        </svg>
      </button>

      <div class="se-slider__dots" role="tablist" aria-label="Gallery pagination"></div>

    </div>{{-- /.se-slider --}}

    <div class="se-gallery__btn-mobile">
      <a href="{{ route('gallery') }}" class="se-btn2 se-btn--primary">{{ __('message.btn3') }}</a>
    </div>

  </div>
</section>

</div>{{-- /.se-parallax-wrap --}}


{{-- ===================== DARK WRAP : PARTENAIRES + VIDÉOS ===================== --}}
<div class="se-dark-wrap" data-bg="{{ asset('assets/img/normal/abstract-background-with-dark-blue-gold-particles.webp') }}">
  <div class="se-dark-wrap__overlay" aria-hidden="true"></div>

{{-- ===================== PARTENAIRES / ÉVÉNEMENTS ===================== --}}
<section class="se-partners" aria-label="Nos événements partenaires">
  <div class="se-container">

    <header class="se-section-header">
      <span class="se-kicker">{{ __('message.partners_kicker') }}</span>
      <h2 class="se-section-title">{{ __('message.partners_title') }}</h2>
      <p class="se-section-lead">{{ __('message.partners_lead') }}</p>
    </header>

    <div class="se-partners__slider">

      {{-- Prev / Next --}}
      <button class="se-partners__btn se-partners__btn--prev" id="pSliderPrev" aria-label="Précédent" disabled>
        <svg viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
      <button class="se-partners__btn se-partners__btn--next" id="pSliderNext" aria-label="Suivant">
        <svg viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
      </button>

      <div class="se-partners__viewport">
        <div class="se-partners__track" id="pSliderTrack">
          @foreach($partners as $p)
            <div class="se-pcard" data-video="{{ $p['video'] }}"
                 data-poster="{{ $p['poster'] }}" data-name="{{ $p['name'] }}">
              <div class="se-pcard__inner">

                {{-- FRONT — cover image --}}
                <div class="se-pcard__front">
                  <img src="{{ $p['poster'] }}" alt="{{ $p['name'] }}" loading="lazy" class="se-pcard__logo">
                  <span class="se-pcard__tag">{{ $p['tag'] }}</span>
                </div>

                {{-- BACK --}}
                <div class="se-pcard__back">
                  <div class="se-pcard__poster" style="background-image:url('{{ $p['poster'] }}')">
                    <div class="se-pcard__poster-overlay"></div>
                    <button class="se-pcard__play" aria-label="Voir la vidéo">
                      <svg viewBox="0 0 24 24" width="24" height="24"><path d="M8 5v14l11-7z" fill="currentColor"/></svg>
                    </button>
                  </div>
                  <div class="se-pcard__info">
                    <span class="se-pcard__badge">{{ $p['tag'] }}</span>
                    <p class="se-pcard__name">{{ $p['name'] }}</p>
                    <span class="se-pcard__cta">{{ __('message.partner_watch') }}</span>
                  </div>
                </div>

              </div>
            </div>
          @endforeach
        </div>
      </div>

      {{-- Dots --}}
      <div class="se-partners__dots" id="pSliderDots"></div>

    </div>

  </div>
</section>


{{-- ===================== TESTIMONIALS ===================== --}}
<section class="se-testimonials" aria-label="Testimonials">
  <div class="se-container">

    <header class="se-section-header">
      <span class="se-kicker se-kicker--light">{{ __('message.testimonials_kicker') }}</span>
      <h2 class="se-section-title se-section-title--white">{{ __('message.title5') }}</h2>
      <p class="se-section-lead se-section-lead--light">{{ __('message.testimonials_lead') }}</p>
    </header>

    @php
      $testimonials = [
        ['video' => 'imottc.mp4', 'thumb' => 'user1.webp', 'name' => 'Kévin Gormand',    'role' => 'Chairman — Mubawab Group'],
        ['video' => 'imos.mp4',   'thumb' => 'user2.webp', 'name' => 'Bachir Benslimane','role' => 'CEO & Founder — Afdal'],
        ['video' => 'refri.mp4',  'thumb' => 'user3.webp', 'name' => 'M. Wael Ghoussein','role' => 'Directeur Général — Taqeef Media'],
        ['video' => 'refrig.mp4', 'thumb' => 'user4.webp', 'name' => 'Maldi Sakande',    'role' => 'General Manager — New Cold System SRL'],
      ];
    @endphp

    <div class="se-testi-slider" id="testiSlider">
      <div class="se-testi-slider__viewport" id="testiViewport">
        <div class="se-testi-slider__track" id="testiTrack">
          @foreach($testimonials as $t)
            <article class="se-testi" data-video="{{ asset('assets/img/video/' . $t['video']) }}">
              <div class="se-testi__thumb">
                <img src="{{ asset('assets/img/thumbnails/' . $t['thumb']) }}" alt="{{ $t['name'] }}" loading="lazy">
                <span class="se-testi__play" aria-hidden="true">
                  <svg viewBox="0 0 24 24" width="20" height="20"><path d="M8 5v14l11-7z" fill="currentColor"/></svg>
                </span>
              </div>
              <h6 class="se-testi__name">{{ $t['name'] }}</h6>
              <p class="se-testi__role">{{ $t['role'] }}</p>
            </article>
          @endforeach
        </div>
      </div>
      <div class="se-testi-slider__dots" id="testiDots"></div>
    </div>
  </div>
</section>

</div>{{-- /.se-dark-wrap --}}



{{-- ===================== QUOTE MODAL ===================== --}}
<div class="se-modal sq-modal" id="quoteModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="quoteModalTitle">
  <div class="sq-modal__dialog">

    {{-- Header --}}
    <div class="sq-modal__header">
      <div class="sq-modal__header-left">
        <span class="sq-modal__badge">{{ __('message.modal_badge') }}</span>
        <h2 class="sq-modal__title" id="quoteModalTitle">{{ __('message.modal_title') }}</h2>
        <p class="sq-modal__service-label">
          {{ __('message.modal_service_lbl') }} <strong id="quoteServiceName"></strong>
        </p>
      </div>
      <button class="sq-modal__close" id="quoteClose" aria-label="{{ __('message.modal_close') }}">&times;</button>
    </div>

    {{-- Form --}}
    <form class="sq-form" id="quoteForm" action="{{ route('store') }}" method="POST" novalidate>
      @csrf
      <input type="hidden" name="service" id="quoteServiceInput">

      <div class="sq-form__row">
        <div class="sq-form__group">
          <label for="qf-name">{{ __('message.modal_name') }} <span aria-hidden="true">*</span></label>
          <input type="text" id="qf-name" name="name" placeholder="{{ __('message.modal_name_ph') }}" autocomplete="name" required>
        </div>
        <div class="sq-form__group">
          <label for="qf-company">{{ __('message.modal_company') }} <span aria-hidden="true">*</span></label>
          <input type="text" id="qf-company" name="company" placeholder="{{ __('message.modal_company_ph') }}" autocomplete="organization" required>
        </div>
      </div>

      <div class="sq-form__row">
        <div class="sq-form__group">
          <label for="qf-email">{{ __('message.modal_email') }} <span aria-hidden="true">*</span></label>
          <input type="email" id="qf-email" name="email" placeholder="{{ __('message.modal_email_ph') }}" autocomplete="email" required>
        </div>
        <div class="sq-form__group">
          <label for="qf-country">{{ __('message.modal_country') }}</label>
          <select id="qf-country" name="country" autocomplete="country">
            <option value="" disabled selected>{{ __('message.modal_country_sel') }}</option>
            <option value="MA">🇲🇦 Maroc</option>
            <option value="FR">🇫🇷 France</option>
            <option value="DZ">🇩🇿 Algérie</option>
            <option value="TN">🇹🇳 Tunisie</option>
            <option value="EG">🇪🇬 Égypte</option>
            <option value="SN">🇸🇳 Sénégal</option>
            <option value="CI">🇨🇮 Côte d'Ivoire</option>
            <option value="CM">🇨🇲 Cameroun</option>
            <option value="GH">🇬🇭 Ghana</option>
            <option value="NG">🇳🇬 Nigeria</option>
            <option value="ZA">🇿🇦 Afrique du Sud</option>
            <option value="AE">🇦🇪 Émirats Arabes Unis</option>
            <option value="SA">🇸🇦 Arabie Saoudite</option>
            <option value="QA">🇶🇦 Qatar</option>
            <option value="ES">🇪🇸 Espagne</option>
            <option value="DE">🇩🇪 Allemagne</option>
            <option value="IT">🇮🇹 Italie</option>
            <option value="GB">🇬🇧 Royaume-Uni</option>
            <option value="US">🇺🇸 États-Unis</option>
            <option value="OTHER">🌍 Autre pays</option>
          </select>
          {{-- Champ texte libre si "Autre pays" — name="country" actif seulement quand visible --}}
          <input type="text" id="qf-country-other" placeholder="{{ __('message.modal_country_ph') }}" style="display:none; margin-top:8px;">
        </div>

      </div>

      <div class="sq-form__row">

        <div class="sq-form__group">
          <label for="qf-city">{{ __('message.modal_city') }}</label>
          <select id="qf-city" name="city" autocomplete="address-level2" disabled>
            <option value="" disabled selected>{{ __('message.modal_city_sel') }}</option>
          </select>
          <input type="text" id="qf-city-other" placeholder="{{ __('message.modal_city_ph') }}" style="display:none; margin-top:8px;">
        </div>

        <div class="sq-form__group">
          <label for="qf-phone">{{ __('message.modal_phone') }}</label>
          <input type="tel" id="qf-phone" name="number" placeholder="+212 6 00 00 00 00" autocomplete="tel" inputmode="tel" maxlength="20">
        </div>
      </div>


      <div class="sq-form__group sq-form__group--full">
        <label for="qf-message">{{ __('message.modal_message') }} <span aria-hidden="true">*</span></label>
        <textarea id="qf-message" name="message" rows="4" placeholder="{{ __('message.modal_message_ph') }}" required></textarea>
      </div>

      <div class="sq-form__footer">
        <p class="sq-form__note">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          {{ __('message.modal_privacy') }}
        </p>
        <button type="submit" class="sq-form__submit" id="quoteSubmit">
          <span class="sq-form__submit-text">{{ __('message.modal_submit') }}</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
      </div>

    </form>

    {{-- Success state --}}
    <div class="sq-success" id="quoteSuccess" hidden>
      <div class="sq-success__icon">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
      </div>
      <h3 class="sq-success__title">{{ __('message.modal_success_title') }}</h3>
      <p class="sq-success__text">{!! __('message.modal_success_text') !!}</p>
      <button type="button" class="sq-success__btn" id="quoteSuccessClose">{{ __('message.modal_close') }}</button>
    </div>

  </div>
</div>

{{-- Video Modal --}}
<div class="se-modal" id="videoModal" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Video player">
  <div class="se-modal__dialog">
    <button class="se-modal__close" data-close aria-label="{{ __('message.modal_close') }}">&times;</button>
    <video id="modalVideo" controls playsinline></video>
  </div>
</div>

{{-- ── Partner video lightbox ── --}}
<div class="se-vbox" id="partnerVideoBox" aria-hidden="true">
  <div class="se-vbox__backdrop"></div>
  <div class="se-vbox__dialog">
    <button class="se-vbox__close" id="partnerVideoClose" aria-label="{{ __('message.modal_close') }}">&times;</button>
    <h3 class="se-vbox__title" id="partnerVideoTitle"></h3>
    <video class="se-vbox__video" id="partnerVideo" controls playsinline preload="none"></video>
  </div>
</div>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/home.js') }}"></script>
@endpush

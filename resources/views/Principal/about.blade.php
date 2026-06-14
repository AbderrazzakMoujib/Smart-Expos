@extends('Layouts.master')

@section('title', __('message.about_title'))
@section('description', __('message.about_desc'))

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endpush

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="sa-hero">
  <video class="sa-hero__video" autoplay muted loop playsinline preload="auto">
    <source src="{{ asset('assets/img/video/Refrigairexpo_22-20Mai_202025.mp4') }}" type="video/mp4">
  </video>
  <div class="sa-hero__overlay" aria-hidden="true"></div>
  <div class="sa-hero__content">
    <span class="sa-hero__kicker">{{ __('message.about_hero_kicker') }}</span>
    <h1 class="sa-hero__title">{{ __('message.about_hero_h1a') }}<br>{{ __('message.about_hero_h1b') }} <em>{{ __('message.about_hero_em') }}</em></h1>
    <p class="sa-hero__sub">{{ __('message.about_hero_sub') }}</p>
    <nav class="sa-hero__breadcrumb" aria-label="Fil d'Ariane">
      <a href="{{ route('home') }}">{{ __('message.breadcrumb_home') }}</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">{{ __('message.breadcrumb_about') }}</span>
    </nav>
  </div>
</section>


{{-- ===================== INTRO ===================== --}}
<section class="sa-intro">
  <div class="sa-container">

    <header class="sa-section-header">
      <span class="sa-kicker">{{ __('message.about_intro_kicker') }}</span>
      <h2 class="sa-title">Smart Expos &amp; Events Morocco</h2>
      <p class="sa-lead">{{ __('message.textAbout') }}</p>
    </header>

    {{-- Orbit — Pourquoi nous choisir --}}
    <div class="sa-orbit" aria-label="{{ __('message.about_why_kicker') }}">

      <svg class="sa-orbit__svg" viewBox="0 0 560 560" aria-hidden="true">
        <defs>
          <linearGradient id="orbitGrad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%"   stop-color="#7b3f00" stop-opacity="0.10"/>
            <stop offset="45%"  stop-color="#7b3f00" stop-opacity="0.65"/>
            <stop offset="100%" stop-color="#7b3f00" stop-opacity="0.10"/>
          </linearGradient>
          <linearGradient id="ringGrad" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%"   stop-color="#7b3f00" stop-opacity="0.05"/>
            <stop offset="30%"  stop-color="#7b3f00" stop-opacity="0.35"/>
            <stop offset="70%"  stop-color="#7b3f00" stop-opacity="0.35"/>
            <stop offset="100%" stop-color="#7b3f00" stop-opacity="0.05"/>
          </linearGradient>
        </defs>
        <circle cx="280" cy="280" r="230" fill="none" stroke="url(#orbitGrad)" stroke-width="1.5" stroke-dasharray="5 8"/>
        <ellipse cx="280" cy="280" rx="310" ry="55" fill="none"
                 stroke="url(#ringGrad)" stroke-width="8" opacity="0.55"
                 transform="rotate(-18 280 280)"/>
        <ellipse cx="280" cy="280" rx="310" ry="55" fill="none"
                 stroke="url(#ringGrad)" stroke-width="2" opacity="0.25"
                 transform="rotate(-18 280 280)" stroke-dasharray="4 10"/>
        <circle cx="280" cy="280" r="120" fill="none" stroke="rgba(212,175,55,0.08)" stroke-width="1"/>
        <line x1="280" y1="50"  x2="510" y2="280" stroke="rgba(212,175,55,0.14)" stroke-width="1"/>
        <line x1="510" y1="280" x2="280" y2="510" stroke="rgba(212,175,55,0.14)" stroke-width="1"/>
        <line x1="280" y1="510" x2="50"  y2="280" stroke="rgba(212,175,55,0.14)" stroke-width="1"/>
        <line x1="50"  y1="280" x2="280" y2="50"  stroke="rgba(212,175,55,0.14)" stroke-width="1"/>
        <circle cx="280" cy="22" r="3" fill="#7b3f00" opacity="0.60"/>
        <circle cx="538" cy="280" r="2.5" fill="#7b3f00" opacity="0.50"/>
        <circle cx="280" cy="538" r="3" fill="#7b3f00" opacity="0.55"/>
        <circle cx="22"  cy="280" r="2.5" fill="#7b3f00" opacity="0.50"/>
        <circle cx="480" cy="100" r="1.8" fill="#7b3f00" opacity="0.40"/>
        <circle cx="80"  cy="450" r="1.5" fill="#7b3f00" opacity="0.35"/>
        <circle cx="460" cy="460" r="1.8" fill="#7b3f00" opacity="0.30"/>
        <circle cx="100" cy="90"  r="1.5" fill="#7b3f00" opacity="0.35"/>
      </svg>

      <div class="sa-orbit__center">
        <div class="sa-orbit__center-logo">
          <img src="{{ asset('assets/img/logo_smart.webp') }}" alt="Smart Expos" class="sa-orbit__logo">
          <p class="sa-orbit__tagline">{{ __('message.about_why_kicker') }}</p>
        </div>
        <div class="sa-orbit__center-panel">
          <span class="sa-orbit__center-icon"></span>
          <h3 class="sa-orbit__center-title"></h3>
          <p class="sa-orbit__center-text"></p>
        </div>
      </div>

      <div class="sa-orbit__node sa-orbit__node--top sa-reveal">
        <button class="sa-orbit__dot" aria-label="{{ __('message.about_why_exp_title') }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 2l3 6.5L22 9.3l-5 4.8 1.2 6.9L12 17.8l-6.2 3.2L7 14.1 2 9.3l7-.8z"/></svg>
        </button>
        <div class="sa-orbit__card">
          <span class="sa-orbit__icon">⭐</span>
          <h3 class="sa-orbit__title">{{ __('message.about_why_exp_title') }}</h3>
          <p class="sa-orbit__text">{{ __('message.about_why_exp_text') }}</p>
        </div>
      </div>

      <div class="sa-orbit__node sa-orbit__node--right sa-reveal">
        <button class="sa-orbit__dot" aria-label="{{ __('message.about_why_net_title') }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
        </button>
        <div class="sa-orbit__card">
          <span class="sa-orbit__icon">🌍</span>
          <h3 class="sa-orbit__title">{{ __('message.about_why_net_title') }}</h3>
          <p class="sa-orbit__text">{{ __('message.about_why_net_text') }}</p>
        </div>
      </div>

      <div class="sa-orbit__node sa-orbit__node--bottom sa-reveal">
        <button class="sa-orbit__dot" aria-label="{{ __('message.about_why_key_title') }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>
        </button>
        <div class="sa-orbit__card">
          <span class="sa-orbit__icon">🔑</span>
          <h3 class="sa-orbit__title">{{ __('message.about_why_key_title') }}</h3>
          <p class="sa-orbit__text">{{ __('message.about_why_key_text') }}</p>
        </div>
      </div>

      <div class="sa-orbit__node sa-orbit__node--left sa-reveal">
        <button class="sa-orbit__dot" aria-label="{{ __('message.about_why_res_title') }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </button>
        <div class="sa-orbit__card">
          <span class="sa-orbit__icon">📈</span>
          <h3 class="sa-orbit__title">{{ __('message.about_why_res_title') }}</h3>
          <p class="sa-orbit__text">{{ __('message.about_why_res_text') }}</p>
        </div>
      </div>

    </div>

    <div class="sa-intro__cta">
      <a href="{{ route('contact') }}" class="sa-btn sa-btn--primary">
        <span>{{ __('message.about_contact_btn') }}</span>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

  </div>
</section>


{{-- ===================== CHIFFRES CLÉS ===================== --}}
<section class="sa-stats">
  <div class="sa-stats__overlay" aria-hidden="true"></div>
  <div class="sa-container">
    <div class="sa-stats__grid">
      <div class="sa-stat">
        <strong class="sa-stat__num sa-counter" data-target="5">0</strong>
        <span class="sa-stat__plus">+</span>
        <span class="sa-stat__label">{{ __('message.about_stat1_lbl') }}</span>
      </div>
      <div class="sa-stat__divider"></div>
      <div class="sa-stat">
        <strong class="sa-stat__num sa-counter" data-target="7">0</strong>
        <span class="sa-stat__plus">+</span>
        <span class="sa-stat__label">{{ __('message.about_stat2_lbl') }}</span>
      </div>
      <div class="sa-stat__divider"></div>
      <div class="sa-stat">
        <strong class="sa-stat__num sa-counter" data-target="500">0</strong>
        <span class="sa-stat__plus">+</span>
        <span class="sa-stat__label">{{ __('message.about_stat3_lbl') }}</span>
      </div>
      <div class="sa-stat__divider"></div>
      <div class="sa-stat">
        <strong class="sa-stat__num sa-counter" data-target="15">0</strong>
        <span class="sa-stat__plus">+</span>
        <span class="sa-stat__label">{{ __('message.about_stat4_lbl') }}</span>
      </div>
    </div>
  </div>
</section>


{{-- ===================== NOS VALEURS ===================== --}}
<section class="sa-values">
  <div class="sa-container">
    <header class="sa-section-header">
      <span class="sa-kicker">{{ __('message.values_kicker') }}</span>
      <h2 class="sa-title">{{ __('message.title6') }}</h2>
      <p class="sa-lead">{{ __('message.values_lead') }}</p>
    </header>

    <div class="sa-values__grid">
      <div class="sa-value-card sa-reveal">
        <div class="sa-value-card__icon">
          <svg viewBox="0 0 64 64" aria-hidden="true">
            <path d="M32 8l6 14h15l-12 9 5 14-14-10-14 10 5-14L11 22h15z" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3>{{ __('message.val1_title') }}</h3>
        <p>{{ __('message.val1_text') }}</p>
      </div>
      <div class="sa-value-card sa-reveal">
        <div class="sa-value-card__icon">
          <svg viewBox="0 0 64 64" aria-hidden="true">
            <circle cx="32" cy="32" r="20" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path d="M22 32l8 8 12-14" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3>{{ __('message.val2_title') }}</h3>
        <p>{{ __('message.val2_text') }}</p>
      </div>
      <div class="sa-value-card sa-reveal">
        <div class="sa-value-card__icon">
          <svg viewBox="0 0 64 64" aria-hidden="true">
            <path d="M12 48V28l20-16 20 16v20M24 48V36h16v12" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3>{{ __('message.val3_title') }}</h3>
        <p>{{ __('message.val3_text') }}</p>
      </div>
      <div class="sa-value-card sa-reveal">
        <div class="sa-value-card__icon">
          <svg viewBox="0 0 64 64" aria-hidden="true">
            <circle cx="22" cy="24" r="8" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <circle cx="42" cy="24" r="8" stroke="currentColor" stroke-width="2.5" fill="none"/>
            <path d="M8 52c0-8 6-12 14-12s14 4 14 12M28 52c0-8 6-12 14-12s14 4 14 12" stroke="currentColor" stroke-width="2.5" fill="none"/>
          </svg>
        </div>
        <h3>{{ __('message.val4_title') }}</h3>
        <p>{{ __('message.val4_text') }}</p>
      </div>
    </div>
  </div>
</section>


{{-- ===================== CTA ===================== --}}
<section class="sa-cta">
  <div class="sa-container">
    <div class="sa-cta__box">
      <div class="sa-cta__geo" aria-hidden="true"><span></span><span></span></div>
      <div class="sa-cta__content">
        <h2>{{ __('message.title7') }}</h2>
        <p>{{ __('message.cta_sub') }}</p>
      </div>
      <a href="{{ route('contact') }}" class="sa-btn sa-btn--gold">
        <span>{{ __('message.Contctez-Nous') }}</span>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/about.js') }}"></script>
@endpush

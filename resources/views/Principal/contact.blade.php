@extends('Layouts.master')

@section('title', __('message.contact_title'))
@section('description', __('message.contact_desc'))

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@endpush

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="sc-hero">
  <div class="sc-hero__bg" aria-hidden="true"></div>
  <div class="sc-hero__overlay" aria-hidden="true"></div>
  <div class="sc-hero__content">
    <span class="sc-hero__kicker">{{ __('message.contact_kicker') }}</span>
    <h1 class="sc-hero__title">{{ __('message.contact_h1a') }} <em>{{ __('message.contact_h1_em') }}</em></h1>
    <p class="sc-hero__sub">{{ __('message.contact_sub') }}</p>
    <nav class="sc-hero__breadcrumb" aria-label="Fil d'Ariane">
      <a href="{{ route('home') }}">{{ __('message.breadcrumb_home') }}</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">{{ __('message.breadcrumb_contact') }}</span>
    </nav>
  </div>
</section>

{{-- ===================== INFO CARDS ===================== --}}
<div class="sc-info">
  <div class="sc-info__inner">

    <div class="sc-info-card">
      <div class="sc-info-card__icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
        </svg>
      </div>
      <div class="sc-info-card__body">
        <span class="sc-info-card__label">{{ __('message.contact_addr_label') }}</span>
        <span class="sc-info-card__val">{!! __('message.contact_addr_val') !!}</span>
      </div>
    </div>

    <div class="sc-info-card">
      <div class="sc-info-card__icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.72A2 2 0 012.18 1h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 8.09a16 16 0 006 6l.61-.61a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
        </svg>
      </div>
      <div class="sc-info-card__body">
        <span class="sc-info-card__label">{{ __('message.contact_phone_label') }}</span>
        <span class="sc-info-card__val">
          <a href="tel:+212660005056">+(212) 06 60 00 50 56</a><br>
          <a href="mailto:contact@smart-events.ma">contact@smart-events.ma</a>
        </span>
      </div>
    </div>

    <div class="sc-info-card">
      <div class="sc-info-card__icon">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
        </svg>
      </div>
      <div class="sc-info-card__body">
        <span class="sc-info-card__label">{{ __('message.contact_hours_label') }}</span>
        <span class="sc-info-card__val">{!! __('message.contact_hours_val') !!}</span>
      </div>
    </div>

  </div>
</div>

{{-- ===================== MAP + FORM ===================== --}}
<section class="sc-section">
  <div class="sc-container">

    {{-- Map --}}
    <div class="sc-map-col">
      <div class="sc-map-col__header">
        <span class="sc-kicker">{{ __('message.contact_map_kicker') }}</span>
        <h2 class="sc-col-title">{{ __('message.contact_map_h2a') }} <em>{{ __('message.contact_map_h2_em') }}</em></h2>
        <div class="sc-divider"></div>
      </div>
      <div class="sc-map-wrap">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.352718820441!2d-7.620667325987255!3d33.5701901430331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d3d9e297fb8d%3A0x541056a548bddea5!2sSmart%20Expos%20%26%20Events%20Morocco!5e0!3m2!1sen!2sma!4v1717291750109!5m2!1sen!2sma"
          allowfullscreen
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          title="{{ __('message.contact_map_kicker') }}">
        </iframe>
      </div>
    </div>

    {{-- Form --}}
    <div class="sc-form-col">
      <div class="sc-map-col__header">
        <span class="sc-kicker">{{ __('message.contact_form_kicker') }}</span>
        <h2 class="sc-col-title">{{ __('message.contact_form_h2a') }} <em>{{ __('message.contact_form_h2_em') }}</em></h2>
        <div class="sc-divider"></div>
      </div>

      <div class="sc-form" id="scFormWrap">

        <div class="sc-success" id="scSuccess">
          <div class="sc-success__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12"/>
            </svg>
          </div>
          <h3 class="sc-success__title">{{ __('message.contact_success_title') }}</h3>
          <p class="sc-success__text">{{ __('message.contact_success_text') }}</p>
        </div>

        <form action="{{ route('store') }}" method="POST" id="scContactForm" novalidate>
          @csrf

          <div class="sc-form__row">
            <div class="sc-field">
              <label class="sc-field__label" for="sc_name">{{ __('message.contact_field_name') }}</label>
              <input class="sc-field__input" type="text" name="name" id="sc_name"
                     placeholder="{{ __('message.contact_field_name_ph') }}" autocomplete="name">
              <svg class="sc-field__icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
              </svg>
              <span class="sc-field__error"></span>
            </div>

            <div class="sc-field">
              <label class="sc-field__label" for="sc_company">{{ __('message.contact_field_co') }}</label>
              <input class="sc-field__input" type="text" name="company" id="sc_company"
                     placeholder="{{ __('message.contact_field_co_ph') }}" autocomplete="organization">
              <svg class="sc-field__icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
              </svg>
              <span class="sc-field__error"></span>
            </div>
          </div>

          <div class="sc-form__row">
            <div class="sc-field">
              <label class="sc-field__label" for="sc_email">{{ __('message.contact_field_email') }}</label>
              <input class="sc-field__input" type="email" name="email" id="sc_email"
                     placeholder="{{ __('message.contact_field_email_ph') }}" autocomplete="email">
              <svg class="sc-field__icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
              </svg>
              <span class="sc-field__error"></span>
            </div>

            <div class="sc-field">
              <label class="sc-field__label" for="sc_number">{{ __('message.contact_field_phone') }}</label>
              <input class="sc-field__input" type="tel" name="number" id="sc_number"
                     placeholder="{{ __('message.contact_field_phone_ph') }}" autocomplete="tel">
              <svg class="sc-field__icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01 0 1.18 2 2 0 012 1h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 8.09a16 16 0 006 6l.61-.61a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
              </svg>
              <span class="sc-field__error"></span>
            </div>
          </div>

          <div class="sc-form__row">
            <div class="sc-field">
              <label class="sc-field__label" for="sc_city">{{ __('message.contact_field_city') }}</label>
              <input class="sc-field__input" type="text" name="city" id="sc_city"
                     placeholder="{{ __('message.contact_field_city_ph') }}" autocomplete="address-level2">
              <svg class="sc-field__icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
              </svg>
              <span class="sc-field__error"></span>
            </div>

            <div class="sc-field">
              <label class="sc-field__label" for="sc_service">{{ __('message.contact_field_service') }}</label>
              <select class="sc-field__select" name="service" id="sc_service">
                <option value="" disabled selected>{{ __('message.contact_field_svc_sel') }}</option>
                <option value="Organisation de salon">{{ __('message.contact_svc1') }}</option>
                <option value="Forum professionnel">{{ __('message.contact_svc2') }}</option>
                <option value="Événement d'entreprise">{{ __('message.contact_svc3') }}</option>
                <option value="Communication digitale">{{ __('message.contact_svc4') }}</option>
                <option value="Autre">{{ __('message.contact_svc5') }}</option>
              </select>
              <svg class="sc-field__icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
              </svg>
              <span class="sc-field__error"></span>
            </div>
          </div>

          <div class="sc-field sc-field--full">
            <label class="sc-field__label" for="sc_message">{{ __('message.contact_field_msg') }}</label>
            <textarea class="sc-field__textarea" name="message" id="sc_message"
                      rows="5" placeholder="{{ __('message.contact_field_msg_ph') }}"></textarea>
            <svg class="sc-field__icon" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" aria-hidden="true"
                 style="bottom:auto;top:40px;">
              <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
            </svg>
            <span class="sc-field__error"></span>
          </div>

          <button type="submit" class="sc-form__submit">
            <span class="sc-btn-text">{{ __('message.contact_submit') }}</span>
            <div class="sc-spinner"></div>
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
              <path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/>
            </svg>
          </button>

        </form>
      </div>
    </div>

  </div>
</section>

@endsection

@push('scripts')
  <script src="{{ asset('assets/js/contact.js') }}"></script>
@endpush

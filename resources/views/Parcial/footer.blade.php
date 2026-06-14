<footer class="sf-footer" style="background-image: url('{{ asset('assets/img/normal/backrund_image-footer.webp') }}')">

  <div class="sf-footer__geo" aria-hidden="true">
    <span></span><span></span><span></span><span></span>
  </div>

  {{-- Logo mobile only --}}
  <div class="sf-footer__logo-mobile">
    <a href="{{ route('home') }}" aria-label="Smart Expos">
      <img src="{{ asset('assets/img/normal/logo_samrt-expos&events-morocco_3D.webp') }}"
           alt="Smart Expos & Events Morocco" loading="lazy">
    </a>
  </div>

  <div class="sf-footer__inner">

    {{-- COLONNE GAUCHE — À propos --}}
    <div class="sf-footer__col sf-footer__col--left">
      <h4 class="sf-footer__heading">{{ __('message.footer_about_heading') }}</h4>
      <p class="sf-footer__about-text">{{ __('message.footer_about_text') }}</p>
      <div class="sf-footer__hours">
        <span class="sf-footer__hours-title">{!! __('message.footer_hours_label') !!}</span>
        <span class="sf-footer__hours-val">{!! __('message.footer_hours_val') !!}</span>
      </div>
    </div>

    {{-- CENTRE — Logo + Follow Us + Links --}}
    <div class="sf-footer__col sf-footer__col--center">

      <a href="{{ route('home') }}" class="sf-footer__logo-wrap" aria-label="Smart Expos — {{ __('message.home') }}">
        <img src="{{ asset('assets/img/normal/logo_samrt-expos&events-morocco_3D.webp') }}"
             alt="Smart Expos & Events Morocco"
             class="sf-footer__logo-img" loading="lazy">
      </a>

      <div class="sf-footer__logo-sep" aria-hidden="true"></div>

      <div class="sf-footer__center-row">

        <div class="sf-footer__center-block">
          <p class="sf-footer__follow-label">{{ __('message.footer_follow') }} :</p>
          <div class="sf-footer__socials">
            <a href="https://www.linkedin.com/company/smart-events-morocco/" target="_blank" rel="noopener" class="sf-social" aria-label="LinkedIn">
              <img src="{{ asset('assets/img/icon/linkedin-logo.png') }}" alt="LinkedIn" loading="lazy">
            </a>
            <a href="https://www.facebook.com/smartexpos" target="_blank" rel="noopener" class="sf-social" aria-label="Facebook">
              <img src="{{ asset('assets/img/icon/facebook.png') }}" alt="Facebook" loading="lazy">
            </a>
            <a href="https://wa.me/212660005056" target="_blank" rel="noopener" class="sf-social" aria-label="WhatsApp">
              <img src="{{ asset('assets/img/icon/whatsapp.png') }}" alt="WhatsApp" loading="lazy">
            </a>
            <a href="https://www.instagram.com/smartexpos" target="_blank" rel="noopener" class="sf-social" aria-label="Instagram">
              <img src="{{ asset('assets/img/icon/instagram.png') }}" alt="Instagram" loading="lazy">
            </a>
            <a href="https://www.youtube.com/@smartexpos" target="_blank" rel="noopener" class="sf-social" aria-label="YouTube">
              <img src="{{ asset('assets/img/icon/youtube.png') }}" alt="YouTube" loading="lazy">
            </a>
          </div>
        </div>

        <div class="sf-footer__center-divider" aria-hidden="true"></div>

        <div class="sf-footer__center-block">
          <p class="sf-footer__follow-label">{{ __('message.footer_links') }}</p>
          <ul class="sf-footer__links">
            <li><a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right"></i> {{ __('message.home') }}</a></li>
            <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i> {{ __('message.about_us') }}</a></li>
            <li><a href="{{ route('salons') }}"><i class="fa-solid fa-chevron-right"></i> {{ __('message.salons') }}</a></li>
            <li><a href="{{ route('gallery') }}"><i class="fa-solid fa-chevron-right"></i> {{ __('message.gallery') }}</a></li>
            <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i> {{ __('message.Contctez-Nous') }}</a></li>
          </ul>
        </div>

      </div>
    </div>

    {{-- COLONNE DROITE — Contact --}}
    <div class="sf-footer__col sf-footer__col--right">
      <h4 class="sf-footer__heading">{{ __('message.footer_contact_heading') }}</h4>
      <ul class="sf-footer__contact">
        <li>
          <span class="sf-footer__contact-icon">
            <img src="{{ asset('assets/img/icon/marker.png') }}" alt="{{ __('message.contact_addr_label') }}" loading="lazy">
          </span>
          <span>{!! __('message.contact_addr_val') !!}</span>
        </li>
        <li>
          <span class="sf-footer__contact-icon">
            <img src="{{ asset('assets/img/icon/phone-call.png') }}" alt="{{ __('message.contact_phone_label') }}" loading="lazy">
          </span>
          <a href="tel:+212660005056">+(212) 06 60 00 50 56</a>
        </li>
        <li>
          <span class="sf-footer__contact-icon">
            <img src="{{ asset('assets/img/icon/envelope.png') }}" alt="Email" loading="lazy">
          </span>
          <a href="mailto:contact@smart-events.ma">contact@smart-events.ma</a>
        </li>
        <li>
          <span class="sf-footer__contact-icon">
            <img src="{{ asset('assets/img/icon/envelope.png') }}" alt="Email" loading="lazy">
          </span>
          <a href="mailto:t.chokry@smart-events.ma">t.chokry@smart-events.ma</a>
        </li>
      </ul>
    </div>

  </div>

  {{-- Bottom bar --}}
  <div class="sf-footer__bottom" style="background-image: url('{{ asset('assets/img/normal/fotter_background.webp') }}')">
    <div class="sf-footer__container sf-footer__bottom-inner">
      <p class="sf-footer__copy">{!! __('message.footer_copyright') !!}</p>
      <ul class="sf-footer__legal">
        <li><a href="{{ route('terms') }}">{{ __('message.terms') }}</a></li>
        <li><a href="{{ route('privacy') }}">{{ __('message.privacy') }}</a></li>
      </ul>
    </div>
  </div>

</footer>

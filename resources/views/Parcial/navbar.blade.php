<!-- resources/views/Parcial/navbar.blade.php -->

<nav class="navbar">
    <div class="navbar-container">
        <a href="{{route('home')}}" class="navbar-logo">
            <img src="{{asset('assets/img/Smart-Expo-&-Events-Morocco.png')}}" class="navbar-logo12" alt="Smart Expos">
        </a>

        <ul class="navbar-menu">
            <li><a href="{{route('home')}}"    class="{{ Request::is('/') ? 'active' : '' }}">{{ __('message.home') }}</a></li>
            <li><a href="{{route('about')}}"   class="{{ Request::is('about') ? 'active' : '' }}">{{ __('message.about_us') }}</a></li>
            <li><a href="{{route('salons')}}"  class="{{ Request::is('salons*') ? 'active' : '' }}">{{ __('message.salons') }}</a></li>
            <li><a href="{{route('gallery')}}" class="{{ Request::is('gallery') ? 'active' : '' }}">{{ __('message.gallery') }}</a></li>
            <li><a href="{{route('contact')}}" class="{{ Request::is('contact') ? 'active' : '' }}">{{ __('message.Contctez-Nous') }}</a></li>
        </ul>

        <div class="navbar-actions">
            <div class="dropdown" id="langDropdown">
                <button class="dropdown-btn">
                    <i class="fas fa-globe"></i>
                    <span>{{ strtoupper(app()->getLocale()) }}</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <a href="{{ route('switch.language', ['lang' => 'fr']) }}">
                        <i class="fas fa-flag"></i> Français
                    </a>
                    <a href="{{ route('switch.language', ['lang' => 'en']) }}">
                        <i class="fas fa-flag"></i> English
                    </a>
                    <a href="{{ route('switch.language', ['lang' => 'ar']) }}">
                        <i class="fas fa-flag"></i> العربية
                    </a>
                </div>
            </div>

            <div class="dropdown" id="contactDropdown">
                <button class="dropdown-btn primary">
                    <span>{{ __('message.join_us') }}</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-menu">
                    <a href="https://www.digitalexportforum.ma/" target="_blank">
                        <img src="{{ asset('assets/img/icon/Digital.png') }}" alt="Digital Export Forum" style="width:18px;height:18px;object-fit:contain;vertical-align:middle;"> Digital Export Forum
                    </a>
                    <a href="https://www.industrialtransformationafrica.com/en" target="_blank">
                        <img src="{{ asset('assets/img/icon/itaf.png') }}" alt="Industrial Transformation Africa" style="width:18px;height:18px;object-fit:contain;vertical-align:middle;"> Industrial Transformation Africa
                    </a>
                </div>
            </div>

            <button class="mobile-toggle" id="mobileToggle" aria-label="{{ __('message.join_us') }}">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <img src="{{asset('assets/img/logo_smart.webp')}}" alt="Smart Expos">
        <button class="mobile-close" id="mobileClose" aria-label="{{ __('message.modal_close') }}">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <ul class="mobile-menu-list">
        <li><a href="{{route('home')}}">{{ __('message.home') }}</a></li>
        <li><a href="{{route('about')}}">{{ __('message.about_us') }}</a></li>
        <li><a href="{{route('salons')}}">{{ __('message.salons') }}</a></li>
        <li><a href="{{route('gallery')}}">{{ __('message.gallery') }}</a></li>
        <li><a href="{{route('contact')}}">{{ __('message.Contctez-Nous') }}</a></li>
    </ul>

    <div class="mobile-dropdowns">
        <div class="mobile-dropdown">
            <div class="mobile-dropdown-title">{{ __('message.language') }}</div>
            <a href="{{ route('switch.language', ['lang' => 'fr']) }}">
                <span class="flag-icon">🇫🇷</span> Français
            </a>
            <a href="{{ route('switch.language', ['lang' => 'en']) }}">
                <span class="flag-icon">🇬🇧</span> English
            </a>
            <a href="{{ route('switch.language', ['lang' => 'ar']) }}">
                <span class="flag-icon">🇲🇦</span> العربية
            </a>
        </div>

        <div class="mobile-dropdown">
            <div class="mobile-dropdown-title">{{ __('message.our_events') }}</div>
            <a href="https://www.digitalexportforum.ma/" target="_blank">
                <img src="{{ asset('assets/img/icon/Digital.png') }}" alt="Digital Export Forum" style="width:18px;height:18px;object-fit:contain;vertical-align:middle;"> Digital Export Forum
            </a>
            <a href="https://www.industrialtransformationafrica.com/en" target="_blank">
                <img src="{{ asset('assets/img/icon/itaf.png') }}" alt="Industrial Transformation Africa" style="width:18px;height:18px;object-fit:contain;vertical-align:middle;"> Industrial Transformation Africa
            </a>
        </div>
    </div>
</div>

<div class="overlay" id="overlay"></div>

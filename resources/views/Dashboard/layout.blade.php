<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow">
  <title>@yield('title', 'Dashboard') — Smart Expos</title>
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"></noscript>
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  @stack('styles')
</head>
<body class="db-body">

{{-- ── Sidebar ── --}}
<aside class="db-sidebar" id="dbSidebar">
  <div class="db-sidebar__logo">
    <img src="{{ asset('assets/img/logo_smart.webp') }}" alt="Smart Expos">
  </div>

  <div class="db-sidebar__user">
    <div class="db-sidebar__avatar">{{ strtoupper(substr(session('dashboard_user.name','?'), 0, 1)) }}</div>
    <div>
      <div class="db-sidebar__user-name">{{ session('dashboard_user.name') }}</div>
      <div class="db-sidebar__user-role">
        @php
          $roleLabels = ['admin' => 'Administrateur', 'commercial' => 'Commercial', 'marketing' => 'Marketing'];
        @endphp
        {{ $roleLabels[session('dashboard_user.role')] ?? session('dashboard_user.role') }}
      </div>
    </div>
  </div>

  <nav class="db-nav">
    @php $role = session('dashboard_user.role'); @endphp

    @if($role === 'admin')
    <a href="{{ route('dashboard.admin') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.admin') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
      Vue globale
    </a>
    <a href="{{ route('dashboard.commercial') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.commercial') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
      Contacts
    </a>
    <a href="{{ route('dashboard.commercial.external-leads') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.commercial.external-leads') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
      Leads Externes
    </a>
    <a href="{{ route('dashboard.marketing') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.marketing*') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
      Événements
    </a>
    <a href="{{ route('dashboard.categories') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.categories*') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg>
      Catégories photos
    </a>
    <a href="{{ route('dashboard.video-categories') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.video-categories*') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
      Catégories vidéos
    </a>
    @elseif($role === 'commercial')
    <a href="{{ route('dashboard.commercial') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.commercial') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
      Mes Contacts
    </a>
    <a href="{{ route('dashboard.commercial.external-leads') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.commercial.external-leads') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg>
      Leads Externes
    </a>
    @elseif($role === 'marketing')
    <a href="{{ route('dashboard.marketing') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.marketing*') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
      Événements
    </a>
    <a href="{{ route('dashboard.categories') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.categories*') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg>
      Catégories photos
    </a>
    <a href="{{ route('dashboard.video-categories') }}"
       class="db-nav__item {{ request()->routeIs('dashboard.video-categories*') ? 'is-active' : '' }}">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
      Catégories vidéos
    </a>
    @endif
  </nav>

  <div class="db-sidebar__footer">
    <a href="{{ route('home') }}" class="db-nav__item" target="_blank">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
      Voir le site
    </a>
    <form action="{{ route('dashboard.logout') }}" method="POST">
      @csrf
      <button type="submit" class="db-nav__item db-nav__logout">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Déconnexion
      </button>
    </form>
  </div>
</aside>

{{-- ── Main ── --}}
<div class="db-main" id="dbMain">

  {{-- Topbar --}}
  <header class="db-topbar">
    <button class="db-topbar__toggle" id="dbToggle" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
    <h1 class="db-topbar__title">@yield('page-title', 'Dashboard')</h1>
    <div class="db-topbar__right">
      <span class="db-topbar__date">{{ now()->translatedFormat('d F Y') }}</span>
    </div>
  </header>

  {{-- Flash messages --}}
  @if(session('success'))
  <div class="db-alert db-alert--success">
    <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
    {{ session('success') }}
  </div>
  @endif
  @if(session('error'))
  <div class="db-alert db-alert--error">
    <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    {{ session('error') }}
  </div>
  @endif

  {{-- Page content --}}
  <div class="db-content">
    @yield('content')
  </div>

</div>

{{-- Overlay for mobile sidebar --}}
<div class="db-overlay" id="dbOverlay"></div>

<script>
(function(){
  var toggle  = document.getElementById('dbToggle');
  var sidebar = document.getElementById('dbSidebar');
  var overlay = document.getElementById('dbOverlay');
  function open()  { sidebar.classList.add('is-open'); overlay.classList.add('is-visible'); }
  function close() { sidebar.classList.remove('is-open'); overlay.classList.remove('is-visible'); }
  if(toggle)  toggle.addEventListener('click', function(){ sidebar.classList.contains('is-open') ? close() : open(); });
  if(overlay) overlay.addEventListener('click', close);
})();
</script>
@stack('scripts')
</body>
</html>

<!-- resources/views/Layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <!-- ================= META & SEO ================= -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Smart Expos & Events Morocco">
    <meta name="description" content="@yield('description', 'Agence 4.0 en Événementiel & Communication Digitale B2B — Casablanca, Maroc')">
    <meta name="robots" content="index,follow">
    <meta name="theme-color" content="#7b3f00">
    <meta name="geo.region" content="MA">
    <meta name="geo.placename" content="Casablanca">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- ================= OPEN GRAPH ================= -->
    <meta property="og:site_name" content="Smart Expos & Events Morocco">
    <meta property="og:title" content="@yield('title', 'Smart Expos & Events Morocco')">
    <meta property="og:description" content="@yield('description', 'Agence 4.0 en Événementiel & Communication Digitale B2B — Casablanca, Maroc')">
    <meta property="og:image" content="@yield('og_image', config('app.url').'/assets/img/Smart-Expo-&-Events-Morocco.png')">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}">

    <!-- ================= TWITTER / X CARD ================= -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Smart Expos & Events Morocco')">
    <meta name="twitter:description" content="@yield('description', 'Agence 4.0 en Événementiel & Communication Digitale B2B — Casablanca, Maroc')">
    <meta name="twitter:image" content="@yield('og_image', config('app.url').'/assets/img/Smart-Expo-&-Events-Morocco.png')">

    <title>@yield('title', 'Smart Expos & Events Morocco')</title>

    <!-- ================= FAVICON ================= -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon_io/site.webmanifest') }}">

    <!-- ================= SCHEMA.ORG ================= -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EventOrganizer",
      "name": "Smart Expos & Events Morocco",
      "alternateName": "Smart Events Morocco",
      "url": "https://smart-events.ma",
      "logo": "{{ asset('assets/img/logo_smart.webp') }}",
      "description": "Agence 4.0 spécialisée en organisation d'expositions, salons professionnels et communication digitale B2B au Maroc.",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Bd Anoual 09, Rue Abou Maachar, Appt 5, 1er étage",
        "addressLocality": "Casablanca",
        "addressCountry": "MA"
      },
      "telephone": "+212660005056",
      "email": "contact@smart-events.ma",
      "openingHours": "Mo-Fr 09:00-18:00",
      "sameAs": [
        "https://www.linkedin.com/company/smart-events-morocco/",
        "https://refrigairexpo.com/",
        "https://seafood4africa.com/"
      ]
    }
    </script>

    <!-- ================= RESOURCE HINTS ================= -->
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    @yield('preload_lcp')

    <!-- ================= GLOBAL FONTS ================= -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"></noscript>

    <!-- ================= FONT AWESOME ================= -->
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"></noscript>

    <!-- ================= GLOBAL BASE STYLE ================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="preload" as="style" href="{{ asset('assets/css/footer.css') }}" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}"></noscript>

    <!-- ================= PAGE-SPECIFIC STYLES ================= -->
    @stack('styles')
    @stack('schema')
</head>

<body class="theme-gold">

    <!-- ================= HEADER ================= -->
    @include('Parcial.navbar')

    <!-- ================= PAGE CONTENT ================= -->
    <main>
        @yield('content')
    </main>

    <!-- ================= FOOTER ================= -->
    @include('Parcial.footer')

    <!-- ================= BACK TO TOP ================= -->
    <button id="backToTop" aria-label="Back to top">↑</button>

    <!-- ================= GLOBAL SCRIPT ================= -->
    <script src="{{ asset('assets/js/master.js') }}" defer></script>
    <script src="{{ asset('assets/js/navbar.js') }}" defer></script>
    <script src="{{ asset('assets/js/footer.js') }}" defer></script>

    <!-- ================= PAGE-SPECIFIC SCRIPTS ================= -->
    @stack('scripts')
</body>
</html>

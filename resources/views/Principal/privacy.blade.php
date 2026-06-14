@extends('Layouts.master')

@section('title', 'Politique de confidentialité — Smart Expos & Events Morocco')
@section('description', 'Découvrez comment Smart Expos & Events Morocco collecte, utilise et protège vos données personnelles.')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/legal.css') }}">
@endpush

@section('content')

<section class="sl-hero">
  <div class="sl-hero__overlay" aria-hidden="true"></div>
  <div class="sl-hero__content">
    <span class="sl-hero__kicker">Informations légales</span>
    <h1 class="sl-hero__title">Politique de confidentialité</h1>
    <p class="sl-hero__sub">Dernière mise à jour : 1er janvier 2025</p>
  </div>
</section>

<section class="sl-body">
  <div class="sl-container">

    <div class="sl-toc">
      <h2 class="sl-toc__title">Table des matières</h2>
      <ol class="sl-toc__list">
        <li><a href="#collecte">Données collectées</a></li>
        <li><a href="#utilisation">Utilisation des données</a></li>
        <li><a href="#conservation">Conservation des données</a></li>
        <li><a href="#partage">Partage des données</a></li>
        <li><a href="#droits">Vos droits</a></li>
        <li><a href="#cookies">Cookies</a></li>
        <li><a href="#securite">Sécurité</a></li>
        <li><a href="#contact">Contact</a></li>
      </ol>
    </div>

    <div class="sl-content">

      <article id="collecte" class="sl-section">
        <h2 class="sl-section__title">1. Données collectées</h2>
        <p>Lorsque vous utilisez notre formulaire de contact ou de demande de devis, nous collectons les informations suivantes :</p>
        <ul>
          <li>Nom complet</li>
          <li>Nom de la société</li>
          <li>Adresse e-mail</li>
          <li>Numéro de téléphone</li>
          <li>Pays et ville</li>
          <li>Service souhaité</li>
          <li>Message</li>
        </ul>
        <p>Ces données sont collectées uniquement lorsque vous les fournissez volontairement.</p>
      </article>

      <article id="utilisation" class="sl-section">
        <h2 class="sl-section__title">2. Utilisation des données</h2>
        <p>Les données collectées sont utilisées exclusivement pour :</p>
        <ul>
          <li>Répondre à vos demandes de contact ou de devis.</li>
          <li>Améliorer nos services et l'expérience utilisateur.</li>
          <li>Vous transmettre des informations relatives à nos événements et services (avec votre consentement).</li>
        </ul>
      </article>

      <article id="conservation" class="sl-section">
        <h2 class="sl-section__title">3. Conservation des données</h2>
        <p>Vos données personnelles sont conservées pendant une durée maximale de <strong>3 ans</strong> à compter de votre dernier contact avec nous. Au-delà de cette période, elles sont supprimées ou anonymisées.</p>
      </article>

      <article id="partage" class="sl-section">
        <h2 class="sl-section__title">4. Partage des données</h2>
        <p>Smart Expos &amp; Events Morocco s'engage à ne jamais vendre, louer ou partager vos données personnelles avec des tiers à des fins commerciales.</p>
        <p>Vos données peuvent être partagées uniquement dans les cas suivants :</p>
        <ul>
          <li>Obligation légale ou réglementaire.</li>
          <li>Protection de nos droits légaux.</li>
        </ul>
      </article>

      <article id="droits" class="sl-section">
        <h2 class="sl-section__title">5. Vos droits</h2>
        <p>Conformément à la loi marocaine n° 09-08 relative à la protection des données personnelles, vous disposez des droits suivants :</p>
        <ul>
          <li><strong>Droit d'accès</strong> — consulter les données vous concernant.</li>
          <li><strong>Droit de rectification</strong> — corriger des données inexactes.</li>
          <li><strong>Droit de suppression</strong> — demander l'effacement de vos données.</li>
          <li><strong>Droit d'opposition</strong> — vous opposer au traitement de vos données.</li>
        </ul>
        <p>Pour exercer ces droits, contactez-nous à <a href="mailto:contact@smart-events.ma">contact@smart-events.ma</a>.</p>
      </article>

      <article id="cookies" class="sl-section">
        <h2 class="sl-section__title">6. Cookies</h2>
        <p>Notre site utilise des cookies techniques nécessaires au bon fonctionnement du site (session, sécurité CSRF). Ces cookies ne collectent aucune donnée personnelle à des fins publicitaires.</p>
        <p>Vous pouvez configurer votre navigateur pour refuser les cookies, mais certaines fonctionnalités du site pourraient ne plus fonctionner correctement.</p>
      </article>

      <article id="securite" class="sl-section">
        <h2 class="sl-section__title">7. Sécurité</h2>
        <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre tout accès non autorisé, perte, destruction ou divulgation. Le site utilise le protocole <strong>HTTPS</strong> pour chiffrer les échanges de données.</p>
      </article>

      <article id="contact" class="sl-section">
        <h2 class="sl-section__title">8. Contact</h2>
        <p>Pour toute question relative à cette politique de confidentialité :</p>
        <ul class="sl-contact-list">
          <li><i class="fa-solid fa-envelope"></i> <a href="mailto:contact@smart-events.ma">contact@smart-events.ma</a></li>
          <li><i class="fa-solid fa-phone"></i> <a href="tel:+212660005056">+(212) 06 60 00 50 56</a></li>
          <li><i class="fa-solid fa-location-dot"></i> Bd Anoual 09, Rue Abou Maachar, Appt 5, 1er étage, Casablanca</li>
        </ul>
      </article>

    </div>

    <div class="sl-back">
      <a href="{{ route('home') }}" class="sl-back__btn">
        <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
      </a>
      <a href="{{ route('terms') }}" class="sl-back__btn sl-back__btn--outline">
        Conditions d'utilisation <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>

  </div>
</section>

@endsection

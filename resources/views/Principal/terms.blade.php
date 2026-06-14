@extends('Layouts.master')

@section('title', "Conditions d'utilisation — Smart Expos & Events Morocco")
@section('description', "Consultez les conditions générales d'utilisation du site Smart Expos & Events Morocco.")

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/legal.css') }}">
@endpush

@section('content')

<section class="sl-hero">
  <div class="sl-hero__overlay" aria-hidden="true"></div>
  <div class="sl-hero__content">
    <span class="sl-hero__kicker">Informations légales</span>
    <h1 class="sl-hero__title">Conditions d'utilisation</h1>
    <p class="sl-hero__sub">Dernière mise à jour : 1er janvier 2025</p>
  </div>
</section>

<section class="sl-body">
  <div class="sl-container">

    <div class="sl-toc">
      <h2 class="sl-toc__title">Table des matières</h2>
      <ol class="sl-toc__list">
        <li><a href="#acceptation">Acceptation des conditions</a></li>
        <li><a href="#utilisation">Utilisation du site</a></li>
        <li><a href="#propriete">Propriété intellectuelle</a></li>
        <li><a href="#responsabilite">Limitation de responsabilité</a></li>
        <li><a href="#liens">Liens externes</a></li>
        <li><a href="#modifications">Modifications</a></li>
        <li><a href="#contact">Contact</a></li>
      </ol>
    </div>

    <div class="sl-content">

      <article id="acceptation" class="sl-section">
        <h2 class="sl-section__title">1. Acceptation des conditions</h2>
        <p>En accédant et en utilisant le site web de <strong>Smart Expos &amp; Events Morocco</strong>, vous acceptez d'être lié par les présentes conditions d'utilisation. Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser ce site.</p>
      </article>

      <article id="utilisation" class="sl-section">
        <h2 class="sl-section__title">2. Utilisation du site</h2>
        <p>Vous vous engagez à utiliser ce site conformément aux lois applicables et aux présentes conditions. Il est notamment interdit de :</p>
        <ul>
          <li>Utiliser le site à des fins illégales ou frauduleuses.</li>
          <li>Reproduire, copier ou distribuer tout contenu sans autorisation écrite préalable.</li>
          <li>Tenter d'accéder à des zones non autorisées du site.</li>
          <li>Transmettre des virus, logiciels malveillants ou tout code nuisible.</li>
          <li>Collecter des informations personnelles d'autres utilisateurs sans leur consentement.</li>
        </ul>
      </article>

      <article id="propriete" class="sl-section">
        <h2 class="sl-section__title">3. Propriété intellectuelle</h2>
        <p>L'ensemble du contenu présent sur ce site — textes, images, logos, vidéos, graphismes et éléments de design — est la propriété exclusive de <strong>Smart Expos &amp; Events Morocco</strong> ou de ses partenaires, et est protégé par les lois marocaines et internationales relatives à la propriété intellectuelle.</p>
        <p>Toute reproduction, représentation, modification ou exploitation non autorisée est strictement interdite.</p>
      </article>

      <article id="responsabilite" class="sl-section">
        <h2 class="sl-section__title">4. Limitation de responsabilité</h2>
        <p>Smart Expos &amp; Events Morocco s'efforce de maintenir les informations du site à jour et exactes. Cependant, nous ne garantissons pas l'exactitude, l'exhaustivité ou l'actualité des informations publiées.</p>
        <p>Nous ne pourrons être tenus responsables de tout dommage direct ou indirect résultant de l'utilisation ou de l'impossibilité d'utiliser ce site.</p>
      </article>

      <article id="liens" class="sl-section">
        <h2 class="sl-section__title">5. Liens externes</h2>
        <p>Notre site peut contenir des liens vers des sites tiers. Ces liens sont fournis à titre informatif uniquement. Smart Expos &amp; Events Morocco n'exerce aucun contrôle sur ces sites et décline toute responsabilité quant à leur contenu.</p>
      </article>

      <article id="modifications" class="sl-section">
        <h2 class="sl-section__title">6. Modifications</h2>
        <p>Nous nous réservons le droit de modifier les présentes conditions d'utilisation à tout moment. Les modifications prennent effet dès leur publication sur cette page. Il vous appartient de consulter régulièrement cette page.</p>
      </article>

      <article id="contact" class="sl-section">
        <h2 class="sl-section__title">7. Contact</h2>
        <p>Pour toute question relative aux présentes conditions, vous pouvez nous contacter :</p>
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
      <a href="{{ route('privacy') }}" class="sl-back__btn sl-back__btn--outline">
        Politique de confidentialité <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>

  </div>
</section>

@endsection

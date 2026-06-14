@extends('Layouts.master')

@section('title', 'Agence Événementielle à Casablanca | Smart Expos & Events Morocco')
@section('description', 'Smart Expos & Events Morocco, votre agence événementielle à Casablanca. Organisation de salons B2B, expositions & forums professionnels au Maroc.')

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Smart Expos & Events Morocco",
  "alternateName": "SEEM",
  "url": "https://smart-events.ma",
  "logo": "{{ asset('assets/img/logo_smart.webp') }}",
  "image": "{{ asset('assets/img/normal/about_22.webp') }}",
  "description": "Agence événementielle B2B à Casablanca spécialisée dans l'organisation de salons professionnels, d'expositions internationales et de forums industriels au Maroc et en Afrique.",
  "priceRange": "$$",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Bd Anoual 09, Rue Abou Maachar, Appt 5, 1er étage",
    "addressLocality": "Casablanca",
    "addressRegion": "Grand Casablanca",
    "postalCode": "20000",
    "addressCountry": "MA"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "33.5731",
    "longitude": "-7.5898"
  },
  "telephone": "+212660005056",
  "email": "contact@smart-events.ma",
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday"],
      "opens": "09:00",
      "closes": "18:00"
    }
  ],
  "sameAs": [
    "https://www.linkedin.com/company/smart-events-morocco/",
    "https://www.facebook.com/smartexpos",
    "https://www.instagram.com/smartexpos",
    "https://refrigairexpo.com/",
    "https://seafood4africa.com/"
  ],
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Services Événementiels B2B",
    "itemListElement": [
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Organisation de salons professionnels" } },
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Expositions internationales" } },
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Forums et conférences B2B" } },
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Communication digitale événementielle" } }
    ]
  }
}
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/seo-page.css') }}">
@endpush

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="sp-hero">
  <div class="sp-hero__overlay" aria-hidden="true"></div>
  <div class="sp-hero__bg" style="background-image:url('{{ asset('assets/img/normal/about_22.webp') }}')"></div>
  <div class="sp-container">
    <nav class="sp-breadcrumb" aria-label="Fil d'Ariane">
      <a href="{{ route('home') }}">Accueil</a>
      <span aria-hidden="true">/</span>
      <span aria-current="page">Agence Événementielle Casablanca</span>
    </nav>
    <span class="sp-kicker">Depuis 2017 — Casablanca, Maroc</span>
    <h1 class="sp-hero__h1">Agence Événementielle à Casablanca</h1>
    <p class="sp-hero__lead">
      Smart Expos &amp; Events Morocco est votre partenaire de référence pour l'organisation d'événements professionnels B2B à Casablanca et dans toute l'Afrique. Salons sectoriels, expositions internationales, forums d'affaires : nous transformons vos ambitions en expériences mémorables.
    </p>
    <div class="sp-hero__ctas">
      <a href="{{ route('contact') }}" class="sp-btn sp-btn--primary">Demander un devis</a>
      <a href="{{ route('salons') }}" class="sp-btn sp-btn--outline">Voir nos événements</a>
    </div>
  </div>
</section>


{{-- ===================== CHIFFRES CLÉS ===================== --}}
<section class="sp-stats">
  <div class="sp-container">
    <div class="sp-stats__grid">
      <div class="sp-stat">
        <span class="sp-stat__num">+5</span>
        <span class="sp-stat__label">Années d'expertise</span>
      </div>
      <div class="sp-stat">
        <span class="sp-stat__num">+10</span>
        <span class="sp-stat__label">Salons organisés</span>
      </div>
      <div class="sp-stat">
        <span class="sp-stat__num">+1 500</span>
        <span class="sp-stat__label">Exposants accueillis</span>
      </div>
      <div class="sp-stat">
        <span class="sp-stat__num">100%</span>
        <span class="sp-stat__label">Spécialisé B2B</span>
      </div>
    </div>
  </div>
</section>


{{-- ===================== POURQUOI NOUS CHOISIR ===================== --}}
<section class="sp-why" id="pourquoi-nous">
  <div class="sp-container">

    <header class="sp-section-header">
      <span class="sp-kicker">Notre valeur ajoutée</span>
      <h2 class="sp-section-title">Pourquoi choisir Smart Expos &amp; Events Morocco ?</h2>
      <p class="sp-section-lead">En tant qu'agence événementielle B2B Maroc, nous combinons expertise sectorielle, réseau professionnel et créativité pour vous offrir des événements à fort impact.</p>
    </header>

    <div class="sp-cards">

      <div class="sp-card">
        <div class="sp-card__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/></svg>
        </div>
        <h3 class="sp-card__title">Expertise reconnue</h3>
        <p class="sp-card__text">Avec plus de 5 ans d'expérience en organisation de salons professionnels Maroc, notre équipe maîtrise chaque étape : prospection des exposants, logistique, communication, accueil et suivi post-événement.</p>
      </div>

      <div class="sp-card">
        <div class="sp-card__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 0 20M12 2a15.3 15.3 0 0 0 0 20"/></svg>
        </div>
        <h3 class="sp-card__title">Réseau international</h3>
        <p class="sp-card__text">Notre carnet d'adresses couvre plus de 30 pays. Nous attirons des délégations d'acheteurs et d'exposants d'Europe, d'Afrique subsaharienne et du Moyen-Orient pour garantir à vos événements une dimension véritablement internationale.</p>
      </div>

      <div class="sp-card">
        <div class="sp-card__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/><line x1="12" y1="12" x2="12" y2="16"/><line x1="10" y1="14" x2="14" y2="14"/></svg>
        </div>
        <h3 class="sp-card__title">Spécialisation B2B industrie</h3>
        <p class="sp-card__text">Nous ne faisons pas de l'événementiel généraliste. Nos salons ciblent des secteurs industriels précis — froid &amp; climatisation, agroalimentaire, plasturgie, énergie — pour maximiser la pertinence des rencontres et le ROI de chaque exposant.</p>
      </div>

      <div class="sp-card">
        <div class="sp-card__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 3h18v4H3zM3 10h18v4H3zM3 17h18v4H3z"/></svg>
        </div>
        <h3 class="sp-card__title">Accompagnement 360°</h3>
        <p class="sp-card__text">De la conception du concept au bilan post-salon, nous gérons l'intégralité du projet : design des espaces, communication digitale, relations presse, production audiovisuelle et coordination sur site le jour J.</p>
      </div>

    </div>
  </div>
</section>


{{-- ===================== NOS SERVICES ===================== --}}
<section class="sp-services" id="nos-services">
  <div class="sp-container">

    <header class="sp-section-header">
      <span class="sp-kicker">Ce que nous faisons</span>
      <h2 class="sp-section-title">Nos services événementiels à Casablanca</h2>
      <p class="sp-section-lead">En tant qu'agence événementielle B2B Maroc, nous proposons une gamme complète de prestations pour que chaque événement soit un succès mesurable.</p>
    </header>

    <div class="sp-services__list">

      <div class="sp-service-item">
        <h3 class="sp-service-item__title">
          <span class="sp-service-item__num">01</span>
          Organisation de salons professionnels
        </h3>
        <p class="sp-service-item__desc">Conception, planification et exécution complète de salons sectoriels à Casablanca et dans les principales villes marocaines. Nous gérons la recherche de lieu, la scénographie, la sécurité, la restauration et l'animation pour créer un environnement propice aux échanges B2B.</p>
      </div>

      <div class="sp-service-item">
        <h3 class="sp-service-item__title">
          <span class="sp-service-item__num">02</span>
          Organisation d'expositions internationales
        </h3>
        <p class="sp-service-item__desc">Nos expositions internationales à Casablanca réunissent des entreprises du Maroc, d'Afrique et d'Europe autour de thématiques industrielles stratégiques. Chaque édition est conçue pour favoriser les partenariats commerciaux durables et l'accès à de nouveaux marchés.</p>
      </div>

      <div class="sp-service-item">
        <h3 class="sp-service-item__title">
          <span class="sp-service-item__num">03</span>
          Forums et conférences B2B
        </h3>
        <p class="sp-service-item__desc">Nous concevons des forums d'affaires qui mettent en lumière les enjeux de votre secteur : keynotes inspirants, tables rondes d'experts, sessions de networking structurées et ateliers pratiques. Chaque forum est une opportunité de positionner votre marque comme leader d'opinion.</p>
      </div>

      <div class="sp-service-item">
        <h3 class="sp-service-item__title">
          <span class="sp-service-item__num">04</span>
          Communication digitale événementielle
        </h3>
        <p class="sp-service-item__desc">Avant, pendant et après l'événement, notre équipe digitale crée et diffuse du contenu engageant : campagnes réseaux sociaux, emailing ciblé, couverture vidéo en direct, photos professionnelles et rapport de performance post-salon pour valoriser votre investissement.</p>
      </div>

      <div class="sp-service-item">
        <h3 class="sp-service-item__title">
          <span class="sp-service-item__num">05</span>
          Gala & cérémonies corporate
        </h3>
        <p class="sp-service-item__desc">Dîners de gala, cérémonies de remise de prix, soirées d'entreprise : nous créons des expériences haut de gamme qui renforcent l'image de marque de vos clients et fidélisent vos partenaires. Décoration, traiteur, animation artistique — chaque détail est soigné.</p>
      </div>

      <div class="sp-service-item">
        <h3 class="sp-service-item__title">
          <span class="sp-service-item__num">06</span>
          Conception de stands & scénographie
        </h3>
        <p class="sp-service-item__desc">Nos designers créent des stands d'exposition qui captivent et convertissent : modèles de stands personnalisés, signalétique événementielle, écrans LED, bornes interactives et aménagements modulables adaptés à toutes les superficies et budgets.</p>
      </div>

    </div>

  </div>
</section>


{{-- ===================== ÉVÉNEMENTS PHARES ===================== --}}
<section class="sp-events" id="nos-evenements">
  <div class="sp-container">

    <header class="sp-section-header">
      <span class="sp-kicker">Notre portfolio</span>
      <h2 class="sp-section-title">Nos événements phares</h2>
      <p class="sp-section-lead">Chaque salon que nous organisons devient un rendez-vous incontournable pour les professionnels du secteur. Voici quelques-uns de nos événements emblématiques.</p>
    </header>

    <div class="sp-events__grid">

      <article class="sp-event-card">
        <div class="sp-event-card__header sp-event-card__header--cold"></div>
        <div class="sp-event-card__body">
          <span class="sp-event-card__tag">Froid &amp; Climatisation</span>
          <h3 class="sp-event-card__title">RefrigAir Expo</h3>
          <p class="sp-event-card__desc">Le Forum International du Froid et de la Climatisation au Maroc. Des centaines d'exposants, des milliers de visiteurs professionnels et des conférences techniques animées par des experts internationaux.</p>
          <div class="sp-event-card__links">
            <a href="https://refrigairexpo.com/" target="_blank" rel="noopener" class="sp-event-card__link">Site officiel →</a>
            <a href="{{ route('salons') }}" class="sp-event-card__link sp-event-card__link--internal">Voir les éditions →</a>
          </div>
        </div>
      </article>

      <article class="sp-event-card">
        <div class="sp-event-card__header sp-event-card__header--sea"></div>
        <div class="sp-event-card__body">
          <span class="sp-event-card__tag">Halieutique &amp; Aquaculture</span>
          <h3 class="sp-event-card__title">Seafood4Africa</h3>
          <p class="sp-event-card__desc">Le premier forum international dédié à l'industrie halieutique en Afrique. Une plateforme unique pour connecter les acteurs du secteur de la pêche, de l'aquaculture et de la transformation de produits de la mer.</p>
          <div class="sp-event-card__links">
            <a href="https://seafood4africa.com/" target="_blank" rel="noopener" class="sp-event-card__link">Site officiel →</a>
            <a href="{{ route('salons') }}" class="sp-event-card__link sp-event-card__link--internal">Voir les éditions →</a>
          </div>
        </div>
      </article>

      <article class="sp-event-card">
        <div class="sp-event-card__header sp-event-card__header--digital"></div>
        <div class="sp-event-card__body">
          <span class="sp-event-card__tag">Commerce &amp; Export</span>
          <h3 class="sp-event-card__title">Digital Export Forum</h3>
          <p class="sp-event-card__desc">Une initiative dédiée à l'accompagnement des entreprises marocaines dans leur transition digitale et leur développement à l'export. Conférences, ateliers et speed-meetings avec des acheteurs internationaux.</p>
          <div class="sp-event-card__links">
            <a href="{{ route('salons') }}" class="sp-event-card__link sp-event-card__link--internal">Voir les éditions →</a>
          </div>
        </div>
      </article>

      <article class="sp-event-card">
        <div class="sp-event-card__header sp-event-card__header--tech"></div>
        <div class="sp-event-card__body">
          <span class="sp-event-card__tag">Textile &amp; Financement</span>
          <h3 class="sp-event-card__title">ITAF — Rencontres Africaines</h3>
          <p class="sp-event-card__desc">Les Rencontres Africaines pour l'Investissement Textile et le Financement — un forum stratégique réunissant décideurs, investisseurs et industriels du textile autour des opportunités de développement sur le continent africain.</p>
          <div class="sp-event-card__links">
            <a href="{{ route('salons') }}" class="sp-event-card__link sp-event-card__link--internal">Voir les éditions →</a>
          </div>
        </div>
      </article>

    </div>

    <div class="sp-events__cta">
      <a href="{{ route('salons') }}" class="sp-btn sp-btn--outline-dark">Voir tous nos salons &amp; événements</a>
    </div>

  </div>
</section>


{{-- ===================== ZONE D'INTERVENTION ===================== --}}
<section class="sp-zone" id="zone-intervention">
  <div class="sp-container">

    <header class="sp-section-header">
      <span class="sp-kicker">Où nous intervenons</span>
      <h2 class="sp-section-title">Zone d'intervention</h2>
      <p class="sp-section-lead">Basés à Casablanca, notre rayonnement s'étend au Maroc entier et à l'ensemble du continent africain.</p>
    </header>

    <div class="sp-zone__grid">

      <div class="sp-zone__item">
        <h3 class="sp-zone__city">Casablanca</h3>
        <p>Notre base opérationnelle. Nous organisons la majorité de nos salons dans les grands centres de conférences et d'exposition de la capitale économique du Maroc — OFEC, Complexe Mohammed V, hôtels 5 étoiles et espaces privés.</p>
      </div>

      <div class="sp-zone__item">
        <h3 class="sp-zone__city">Maroc</h3>
        <p>De Tanger à Agadir, de Rabat à Marrakech, nous déployons notre savoir-faire dans toutes les grandes villes du Royaume. Notre réseau de partenaires locaux (traiteurs, techniciens, hôtesses) nous permet d'intervenir partout avec la même qualité.</p>
      </div>

      <div class="sp-zone__item">
        <h3 class="sp-zone__city">Afrique &amp; International</h3>
        <p>Nos événements attirent des délégations de plus de 30 pays. Nous accompagnons également des organisateurs étrangers qui souhaitent s'implanter au Maroc ou en Afrique subsaharienne, en leur apportant notre connaissance du terrain et de l'écosystème B2B local.</p>
      </div>

    </div>

  </div>
</section>


{{-- ===================== TÉMOIGNAGES TEXTE ===================== --}}
<section class="sp-quotes">
  <div class="sp-container">
    <header class="sp-section-header">
      <span class="sp-kicker sp-kicker--light">Ils nous font confiance</span>
      <h2 class="sp-section-title sp-section-title--white">Ce que disent nos clients</h2>
    </header>
    <div class="sp-quotes__grid">
      <blockquote class="sp-quote">
        <p class="sp-quote__text">« Smart Expos a su créer un salon du froid de niveau international à Casablanca. La qualité des exposants, l'organisation impeccable et la communication digitale ont dépassé nos attentes. »</p>
        <footer class="sp-quote__author">— Professionnel du secteur frigorifique, Casablanca</footer>
      </blockquote>
      <blockquote class="sp-quote">
        <p class="sp-quote__text">« Une équipe réactive, créative et profondément ancrée dans le tissu économique marocain. Leur réseau d'exposants et d'acheteurs est un atout considérable pour maximiser le ROI de notre participation. »</p>
        <footer class="sp-quote__author">— Directeur commercial, groupe industriel européen</footer>
      </blockquote>
      <blockquote class="sp-quote">
        <p class="sp-quote__text">« Pour Seafood4Africa, nous avions besoin d'un partenaire qui comprend à la fois la culture des affaires africaine et les standards internationaux. Smart Expos les réunit parfaitement. »</p>
        <footer class="sp-quote__author">— Organisateur, secteur halieutique</footer>
      </blockquote>
    </div>
  </div>
</section>


{{-- ===================== FAQ SEO ===================== --}}
<section class="sp-faq" id="faq">
  <div class="sp-container">

    <header class="sp-section-header">
      <span class="sp-kicker">Questions fréquentes</span>
      <h2 class="sp-section-title">FAQ — Agence événementielle à Casablanca</h2>
    </header>

    <div class="sp-faq__list">

      <details class="sp-faq__item">
        <summary class="sp-faq__question">Quels types d'événements organisez-vous à Casablanca ?</summary>
        <p class="sp-faq__answer">Smart Expos &amp; Events Morocco organise principalement des salons professionnels B2B, des expositions internationales, des forums d'affaires et des conférences sectorielles à Casablanca. Nous intervenons dans des secteurs comme le froid et la climatisation, l'agroalimentaire, la plasturgie, l'énergie, le textile et le commerce international.</p>
      </details>

      <details class="sp-faq__item">
        <summary class="sp-faq__question">Comment demander un devis pour l'organisation d'un événement ?</summary>
        <p class="sp-faq__answer">Vous pouvez nous contacter directement via notre <a href="{{ route('contact') }}">formulaire de contact</a>, par email à <a href="mailto:contact@smart-events.ma">contact@smart-events.ma</a> ou par téléphone au <a href="tel:+212660005056">+212 6 60 00 50 56</a>. Nous vous répondons sous 24 h ouvrées avec une proposition adaptée à votre projet.</p>
      </details>

      <details class="sp-faq__item">
        <summary class="sp-faq__question">Intervenez-vous en dehors de Casablanca ?</summary>
        <p class="sp-faq__answer">Oui. Bien que notre siège soit à Casablanca, nous organisons des événements dans tout le Maroc (Rabat, Marrakech, Tanger, Agadir, Fès) et accompagnons des projets à l'international, notamment en Afrique subsaharienne et en Europe.</p>
      </details>

      <details class="sp-faq__item">
        <summary class="sp-faq__question">Quelle est la durée minimale pour organiser un salon professionnel ?</summary>
        <p class="sp-faq__answer">Pour un salon de taille moyenne (50 à 150 exposants), nous recommandons un délai de préparation de 4 à 6 mois. Pour des événements de grande envergure ou internationaux, 8 à 12 mois permettent d'optimiser la prospection des exposants et la communication. Contactez-nous pour évaluer la faisabilité de votre projet selon vos contraintes de temps.</p>
      </details>

      <details class="sp-faq__item">
        <summary class="sp-faq__question">Proposez-vous des services de communication digitale pour les événements ?</summary>
        <p class="sp-faq__answer">Absolument. Notre pôle digital prend en charge la stratégie de communication avant l'événement (réseaux sociaux, emailing, SEO), la couverture en direct (live, stories, photos) et la valorisation post-événement (vidéos recap, rapport de performance). Voir notre <a href="{{ route('about') }}">page À propos</a> pour en savoir plus sur notre équipe.</p>
      </details>

    </div>

  </div>
</section>


{{-- ===================== CTA FINAL ===================== --}}
<section class="sp-cta-final">
  <div class="sp-container">
    <div class="sp-cta-final__inner">
      <h2 class="sp-cta-final__title">Prêt à organiser votre prochain événement à Casablanca ?</h2>
      <p class="sp-cta-final__text">Confiez votre projet à l'agence événementielle B2B de référence au Maroc. Notre équipe est disponible pour étudier votre besoin et vous proposer une solution sur mesure.</p>
      <div class="sp-cta-final__btns">
        <a href="{{ route('contact') }}" class="sp-btn sp-btn--primary sp-btn--lg">Demander un devis gratuit</a>
        <a href="tel:+212660005056" class="sp-btn sp-btn--ghost sp-btn--lg">+(212) 06 60 00 50 56</a>
      </div>
    </div>
  </div>
</section>

@endsection

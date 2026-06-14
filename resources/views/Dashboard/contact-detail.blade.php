@extends('Dashboard.layout')

@section('title', 'Contact — ' . $contact->name)
@section('page-title', 'Détail Contact')

@section('content')

<div class="db-card" style="max-width:740px">
  <div class="db-card__head">
    <h2 class="db-card__title">{{ $contact->name }}</h2>
    <a href="{{ route('dashboard.commercial') }}" class="db-btn db-btn--ghost">← Retour</a>
  </div>

  <div class="db-detail-grid">
    <div class="db-detail-row">
      <span class="db-detail-label">Nom complet</span>
      <span class="db-detail-val">{{ $contact->name }}</span>
    </div>
    @if($contact->company)
    <div class="db-detail-row">
      <span class="db-detail-label">Société</span>
      <span class="db-detail-val">{{ $contact->company }}</span>
    </div>
    @endif
    <div class="db-detail-row">
      <span class="db-detail-label">Email</span>
      <span class="db-detail-val">
        <a href="mailto:{{ $contact->email }}" class="db-link">{{ $contact->email }}</a>
      </span>
    </div>
    @if($contact->number)
    <div class="db-detail-row">
      <span class="db-detail-label">Téléphone</span>
      <span class="db-detail-val">
        <a href="tel:{{ $contact->number }}" class="db-link">{{ $contact->number }}</a>
      </span>
    </div>
    @endif
    @if($contact->city || $contact->country)
    <div class="db-detail-row">
      <span class="db-detail-label">Localisation</span>
      <span class="db-detail-val">{{ collect([$contact->city, $contact->country])->filter()->implode(', ') }}</span>
    </div>
    @endif
    @if($contact->service)
    <div class="db-detail-row">
      <span class="db-detail-label">Service souhaité</span>
      <span class="db-detail-val"><span class="db-badge">{{ $contact->service }}</span></span>
    </div>
    @endif
    <div class="db-detail-row">
      <span class="db-detail-label">Reçu le</span>
      <span class="db-detail-val db-muted">{{ $contact->created_at->format('d/m/Y à H:i') }}</span>
    </div>
  </div>

  @if($contact->message)
  <div class="db-detail-message">
    <span class="db-detail-label">Message</span>
    <div class="db-detail-message__body">{{ $contact->message }}</div>
  </div>
  @endif

  <div style="display:flex;gap:12px;margin-top:24px">
    <a href="mailto:{{ $contact->email }}" class="db-btn db-btn--gold">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
      Répondre par email
    </a>
    @if($contact->number)
    <a href="tel:{{ $contact->number }}" class="db-btn db-btn--ghost">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 01-2.18 2A19.79 19.79 0 0112 18.9a19.5 19.5 0 01-9-9A19.79 19.79 0 011.09 2.18 2 2 0 013.08 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.91 7.91a16 16 0 006 6l.61-.61a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
      Appeler
    </a>
    @endif
  </div>

</div>

@endsection

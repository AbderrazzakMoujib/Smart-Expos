@extends('Dashboard.layout')

@section('title', 'Catégories — Dashboard')
@section('page-title', 'Catégories photos')

@section('content')

@php $isAdmin = in_array(session('dashboard_user.role'), ['admin', 'marketing']); @endphp

{{-- Flash message --}}
@if(session('success'))
<div class="db-alert db-alert--success" style="margin-bottom:20px">
  <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" style="width:15px;height:15px;stroke:currentColor;flex-shrink:0"><polyline points="20 6 9 17 4 12"/></svg>
  {{ session('success') }}
</div>
@endif

{{-- Info banner --}}
<div class="db-gallery-info" style="margin-bottom:24px">
  <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
  @if($isAdmin)
    Créez des catégories (ex : Stands, Conférences, Cocktails…), ajoutez une cover et des photos. Elles apparaissent comme albums sur la galerie publique.
  @else
    Cliquez sur une catégorie pour y ajouter ou supprimer des photos.
  @endif
</div>

{{-- Create form — admin only --}}
@if($isAdmin)
<div class="db-card dbc-create-card" style="margin-bottom:28px">
  <div class="db-card__head">
    <h2 class="db-card__title">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" style="width:14px;height:14px;stroke:var(--gold);vertical-align:middle;margin-right:6px"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Nouvelle catégorie
    </h2>
  </div>
  <form action="{{ route('dashboard.categories.store') }}" method="POST" class="dbc-create-form">
    @csrf
    <input type="text" name="name" placeholder="Nom de la catégorie…" required
           value="{{ old('name') }}" class="dbc-input" autocomplete="off">
    <button type="submit" class="db-btn db-btn--gold">
      Créer
    </button>
  </form>
</div>
@endif

{{-- Categories grid --}}
@if($categories->isEmpty())
<div class="dbc-empty">
  <svg viewBox="0 0 24 24" fill="none" stroke-width="1.2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
  <p>@if($isAdmin) Aucune catégorie. Créez-en une ci-dessus. @else Aucune catégorie disponible. @endif</p>
</div>

@else
<div class="dbc-grid">
  @foreach($categories as $cat)
  <div class="dbc-card">

    {{-- Cover --}}
    <a href="{{ route('dashboard.categories.show', $cat->id) }}" class="dbc-card__cover-link">
      @if($cat->cover)
        <img src="{{ asset("storage/{$cat->cover}") }}" alt="{{ $cat->name }}" class="dbc-card__cover" loading="lazy">
      @elseif($cat->photos->first())
        <img src="{{ asset("storage/{$cat->photos->first()->path}") }}" alt="{{ $cat->name }}" class="dbc-card__cover" loading="lazy">
      @else
        <div class="dbc-card__no-cover">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="1.2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          <span>Aucune cover</span>
        </div>
      @endif
      <div class="dbc-card__count-badge">
        {{ $cat->photos_count }}&nbsp;photo{{ $cat->photos_count !== 1 ? 's' : '' }}
      </div>
    </a>

    {{-- Body --}}
    <div class="dbc-card__body">
      <div class="dbc-card__row">
        <span class="dbc-card__name">
          {{ $cat->name }}
          @if($cat->post_id)
          <span class="dbc-auto-badge">auto</span>
          @endif
        </span>
        @if($isAdmin)
        <form action="{{ route('dashboard.categories.destroy', $cat->id) }}" method="POST"
              onsubmit="return confirm('Supprimer « {{ $cat->name }} » et toutes ses photos ?')">
          @csrf @method('DELETE')
          <button type="submit" class="dbc-del-btn" title="Supprimer la catégorie">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/></svg>
          </button>
        </form>
        @endif
      </div>

      {{-- Mini photo strip --}}
      @if($cat->photos_count > 0)
      <div class="dbc-card__strip">
        @foreach($cat->photos->take(5) as $p)
        <img src="{{ asset('storage/'.$p->path) }}" alt="" loading="lazy">
        @endforeach
        @if($cat->photos_count > 5)
        <div class="dbc-card__strip-more">+{{ $cat->photos_count - 5 }}</div>
        @endif
      </div>
      @else
      <p class="dbc-card__empty-label">Aucune photo pour l'instant</p>
      @endif

      <a href="{{ route('dashboard.categories.show', $cat->id) }}" class="db-btn db-btn--ghost dbc-card__manage-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        Gérer les photos
      </a>
    </div>

  </div>
  @endforeach
</div>
@endif

@endsection

@push('styles')
<style>
/* ── Info banner ── */
.db-gallery-info {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  background: rgba(212,175,55,0.07);
  border: 1px solid rgba(212,175,55,0.18);
  border-radius: 12px;
  padding: 14px 18px;
  font-size: 0.82rem;
  color: rgba(255,255,255,0.6);
  line-height: 1.6;
}
.db-gallery-info svg { width:16px;height:16px;stroke:var(--gold);flex-shrink:0;margin-top:2px; }

/* ── Create form ── */
.dbc-create-form {
  display: flex;
  gap: 12px;
  padding: 18px 24px 22px;
  align-items: center;
}
.dbc-input {
  flex: 1;
  font-family: inherit;
  font-size: 0.88rem;
  color: var(--white);
  background: rgba(255,255,255,0.04);
  border: 1.5px solid rgba(255,255,255,0.08);
  border-radius: 10px;
  padding: 11px 14px;
  outline: none;
  transition: border-color .2s;
}
.dbc-input:focus { border-color: rgba(212,175,55,0.5); }
.dbc-input::placeholder { color: var(--muted); }

/* ── Empty state ── */
.dbc-empty {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 16px;
  padding: 80px 20px;
  text-align: center;
  color: var(--muted);
}
.dbc-empty svg { width: 52px; height: 52px; stroke: rgba(212,175,55,0.2); }
.dbc-empty p  { font-size: 0.88rem; margin: 0; }

/* ── Grid ── */
.dbc-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
}

/* ── Card ── */
.dbc-card {
  background: var(--navy-card);
  border: 1px solid rgba(255,255,255,0.06);
  border-radius: 16px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  transition: border-color .25s, box-shadow .25s;
}
.dbc-card:hover {
  border-color: rgba(212,175,55,0.25);
  box-shadow: 0 8px 32px rgba(0,0,0,0.35);
}

/* Cover */
.dbc-card__cover-link {
  display: block;
  position: relative;
  aspect-ratio: 16/9;
  overflow: hidden;
  background: #0a1e35;
  text-decoration: none;
}
.dbc-card__cover {
  width: 100%; height: 100%;
  object-fit: cover;
  display: block;
  transition: transform .4s ease;
}
.dbc-card__cover-link:hover .dbc-card__cover { transform: scale(1.05); }

.dbc-card__no-cover {
  width: 100%; height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 10px;
  color: var(--muted);
}
.dbc-card__no-cover svg { width: 36px; height: 36px; stroke: rgba(212,175,55,0.2); }
.dbc-card__no-cover span { font-size: 0.72rem; }

.dbc-card__count-badge {
  position: absolute;
  bottom: 8px; right: 8px;
  background: rgba(5,16,31,0.75);
  backdrop-filter: blur(6px);
  border: 1px solid rgba(212,175,55,0.25);
  border-radius: 100px;
  font-size: 0.7rem;
  font-weight: 700;
  color: var(--gold);
  padding: 3px 10px;
}

/* Body */
.dbc-card__body {
  padding: 14px 16px 16px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  flex: 1;
}
.dbc-card__row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 8px;
}
.dbc-card__name {
  font-size: 0.92rem;
  font-weight: 700;
  color: var(--white);
  line-height: 1.3;
}

.dbc-auto-badge {
  display: inline-block;
  font-size: 0.6rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  color: var(--gold);
  border: 1px solid rgba(212,175,55,0.35);
  border-radius: 4px;
  padding: 1px 5px;
  vertical-align: middle;
  margin-left: 6px;
  opacity: 0.75;
}

.dbc-del-btn {
  background: none;
  border: none;
  color: var(--muted);
  cursor: pointer;
  padding: 4px;
  transition: color .2s;
  flex-shrink: 0;
  line-height: 0;
}
.dbc-del-btn svg { width: 15px; height: 15px; stroke: currentColor; }
.dbc-del-btn:hover { color: var(--red); }

/* Mini strip */
.dbc-card__strip {
  display: flex;
  gap: 4px;
  align-items: center;
  overflow: hidden;
}
.dbc-card__strip img {
  width: 46px;
  height: 36px;
  object-fit: cover;
  border-radius: 6px;
  flex-shrink: 0;
  border: 1px solid rgba(255,255,255,0.06);
}
.dbc-card__strip-more {
  font-size: 0.7rem;
  font-weight: 700;
  color: var(--muted);
  padding-left: 2px;
  white-space: nowrap;
}
.dbc-card__empty-label {
  font-size: 0.74rem;
  color: var(--muted);
  font-style: italic;
  margin: 0;
}

/* Manage button */
.dbc-card__manage-btn {
  font-size: 0.74rem;
  justify-content: center;
  margin-top: auto;
  padding: 8px 14px;
}

@media (max-width: 600px) {
  .dbc-create-form { flex-direction: column; align-items: stretch; }
  .dbc-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
}
@media (max-width: 380px) {
  .dbc-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

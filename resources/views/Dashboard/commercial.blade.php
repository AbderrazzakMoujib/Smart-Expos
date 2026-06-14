@extends('Dashboard.layout')

@section('title', 'Commercial — Dashboard')
@section('page-title', 'Contacts & Leads')

@section('content')

{{-- ── Stats ── --}}
<div class="db-stats">
  <div class="db-stat-card">
    <div class="db-stat-card__icon db-stat-card__icon--gold">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['total'] }}</span>
      <span class="db-stat-card__label">Total contacts</span>
    </div>
  </div>
  <div class="db-stat-card">
    <div class="db-stat-card__icon">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['thisMonth'] }}</span>
      <span class="db-stat-card__label">Ce mois</span>
    </div>
  </div>
  <div class="db-stat-card">
    <div class="db-stat-card__icon">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['thisWeek'] }}</span>
      <span class="db-stat-card__label">Cette semaine</span>
    </div>
  </div>
</div>

{{-- ── Filters ── --}}
<div class="db-card">
  <div class="db-card__head">
    <h2 class="db-card__title">Liste des contacts</h2>
    <a href="{{ route('dashboard.commercial.export') }}" class="db-btn db-btn--gold">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" width="16" height="16"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
      Exporter Excel
    </a>
  </div>

  <form action="{{ route('dashboard.commercial') }}" method="GET" class="db-filters">
    <div class="db-form-field">
      <input type="text" name="search" value="{{ request('search') }}"
             placeholder="Rechercher nom, société, email, ville…">
    </div>
    <div class="db-form-field">
      <select name="service">
        <option value="">Tous les services</option>
        @foreach($services as $svc)
        <option value="{{ $svc }}" {{ request('service') === $svc ? 'selected' : '' }}>{{ $svc }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="db-btn db-btn--gold">Filtrer</button>
    @if(request('search') || request('service'))
    <a href="{{ route('dashboard.commercial') }}" class="db-btn db-btn--ghost">Réinitialiser</a>
    @endif
  </form>

  {{-- Table --}}
  <div class="db-table-wrap">
    <table class="db-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Société</th>
          <th>Email</th>
          <th>Téléphone</th>
          <th>Ville</th>
          <th>Service</th>
          <th>Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($contacts as $c)
        <tr>
          <td class="db-muted">{{ $c->id }}</td>
          <td><strong>{{ $c->name }}</strong></td>
          <td>{{ $c->company ?: '—' }}</td>
          <td><a href="mailto:{{ $c->email }}" class="db-link">{{ $c->email }}</a></td>
          <td>{{ $c->number ?: '—' }}</td>
          <td>{{ $c->city ?: '—' }}</td>
          <td>
            @if($c->service)
            <span class="db-badge">{{ $c->service }}</span>
            @else —
            @endif
          </td>
          <td class="db-muted">{{ $c->created_at->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('dashboard.commercial.contact', $c->id) }}" class="db-btn-icon" title="Voir détail">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </a>
          </td>
        </tr>
        @empty
        <tr><td colspan="9" class="db-empty">Aucun contact trouvé</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Pagination --}}
  @if($contacts->hasPages())
  <div class="db-pagination">
    {{ $contacts->links('Dashboard.pagination') }}
  </div>
  @endif

</div>

@endsection

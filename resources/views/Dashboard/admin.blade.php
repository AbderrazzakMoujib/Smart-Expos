@extends('Dashboard.layout')

@section('title', 'Admin — Dashboard')
@section('page-title', 'Vue Globale')

@section('content')

{{-- ── Stats ── --}}
<div class="db-stats">
  <div class="db-stat-card">
    <div class="db-stat-card__icon">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['contacts'] }}</span>
      <span class="db-stat-card__label">Contacts total</span>
    </div>
  </div>
  <div class="db-stat-card">
    <div class="db-stat-card__icon">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['posts'] }}</span>
      <span class="db-stat-card__label">Événements</span>
    </div>
  </div>
  <div class="db-stat-card">
    <div class="db-stat-card__icon db-stat-card__icon--gold">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['published'] }}</span>
      <span class="db-stat-card__label">Publiés</span>
    </div>
  </div>
  <div class="db-stat-card">
    <div class="db-stat-card__icon">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 010 14.14M4.93 4.93a10 10 0 000 14.14"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['users'] }}</span>
      <span class="db-stat-card__label">Utilisateurs</span>
    </div>
  </div>
</div>

{{-- ── Two columns ── --}}
<div class="db-grid-2">

  {{-- Recent contacts --}}
  <div class="db-card">
    <div class="db-card__head">
      <h2 class="db-card__title">Derniers contacts</h2>
      <a href="{{ route('dashboard.commercial') }}" class="db-card__link">Voir tout</a>
    </div>
    <div class="db-table-wrap">
      <table class="db-table">
        <thead>
          <tr><th>Nom</th><th>Société</th><th>Service</th><th>Date</th></tr>
        </thead>
        <tbody>
          @forelse($recentContacts as $c)
          <tr>
            <td>{{ $c->name }}</td>
            <td>{{ $c->company ?: '—' }}</td>
            <td>
              @if($c->service)
              <span class="db-badge">{{ $c->service }}</span>
              @else —
              @endif
            </td>
            <td class="db-muted">{{ $c->created_at->format('d/m/Y') }}</td>
          </tr>
          @empty
          <tr><td colspan="4" class="db-empty">Aucun contact</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- Recent posts --}}
  <div class="db-card">
    <div class="db-card__head">
      <h2 class="db-card__title">Derniers événements</h2>
      <a href="{{ route('dashboard.marketing') }}" class="db-card__link">Voir tout</a>
    </div>
    <div class="db-table-wrap">
      <table class="db-table">
        <thead>
          <tr><th>Titre</th><th>Statut</th><th>Date</th></tr>
        </thead>
        <tbody>
          @forelse($recentPosts as $p)
          <tr>
            <td>{{ Str::limit($p->title, 40) }}</td>
            <td>
              <span class="db-status {{ $p->status === 'PUBLISHED' ? 'db-status--green' : 'db-status--gray' }}">
                {{ $p->status === 'PUBLISHED' ? 'Publié' : 'Brouillon' }}
              </span>
            </td>
            <td class="db-muted">{{ $p->created_at->format('d/m/Y') }}</td>
          </tr>
          @empty
          <tr><td colspan="3" class="db-empty">Aucun événement</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>

{{-- ── Manage Users ── --}}
<div class="db-card" style="margin-top:28px">
  <div class="db-card__head">
    <h2 class="db-card__title">Gestion des utilisateurs</h2>
  </div>

  {{-- Add user form --}}
  <form action="{{ route('dashboard.admin.users.create') }}" method="POST" class="db-user-form">
    @csrf
    <div class="db-user-form__fields">
      <div class="db-form-field">
        <label>Nom</label>
        <input type="text" name="name" placeholder="Prénom Nom" required>
      </div>
      <div class="db-form-field">
        <label>Email</label>
        <input type="email" name="email" placeholder="email@smart-events.ma" required>
      </div>
      <div class="db-form-field">
        <label>Mot de passe</label>
        <input type="password" name="password" placeholder="Min. 8 caractères" required>
      </div>
      <div class="db-form-field">
        <label>Rôle</label>
        <select name="dashboard_role" required>
          <option value="" disabled selected>Choisir</option>
          <option value="admin">Administrateur</option>
          <option value="commercial">Commercial</option>
          <option value="marketing">Marketing</option>
        </select>
      </div>
    </div>
    <button type="submit" class="db-btn db-btn--gold">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Créer l'utilisateur
    </button>
  </form>

  {{-- Users table --}}
  <div class="db-table-wrap" style="margin-top:20px">
    <table class="db-table">
      <thead>
        <tr><th>Nom</th><th>Email</th><th>Rôle</th><th>Créé le</th><th></th></tr>
      </thead>
      <tbody>
        @foreach($dashboardUsers as $u)
        <tr>
          <td>{{ $u->name }}</td>
          <td>{{ $u->email }}</td>
          <td>
            @php $rl = ['admin'=>'Administrateur','commercial'=>'Commercial','marketing'=>'Marketing']; @endphp
            <span class="db-badge db-badge--{{ $u->dashboard_role }}">{{ $rl[$u->dashboard_role] ?? $u->dashboard_role }}</span>
          </td>
          <td class="db-muted">{{ $u->created_at->format('d/m/Y') }}</td>
          <td>
            @if($u->id !== session('dashboard_user.id'))
            <form action="{{ route('dashboard.admin.users.delete', $u->id) }}" method="POST"
                  onsubmit="return confirm('Supprimer {{ $u->name }} ?')">
              @csrf @method('DELETE')
              <button type="submit" class="db-btn-icon db-btn-icon--red" title="Supprimer">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/><path d="M10 11v6M14 11v6"/></svg>
              </button>
            </form>
            @else
            <span class="db-muted">Vous</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection

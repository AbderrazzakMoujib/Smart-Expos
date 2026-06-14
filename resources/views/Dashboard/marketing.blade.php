@extends('Dashboard.layout')

@section('title', 'Marketing — Dashboard')
@section('page-title', 'Gestion des Événements')

@section('content')

{{-- ── Stats ── --}}
<div class="db-stats">
  <div class="db-stat-card">
    <div class="db-stat-card__icon">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['total'] }}</span>
      <span class="db-stat-card__label">Total événements</span>
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
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
    </div>
    <div class="db-stat-card__body">
      <span class="db-stat-card__num">{{ $stats['draft'] }}</span>
      <span class="db-stat-card__label">Brouillons</span>
    </div>
  </div>
</div>

{{-- ── Events table ── --}}
<div class="db-card">
  <div class="db-card__head">
    <h2 class="db-card__title">Tous les événements</h2>
    <a href="{{ route('dashboard.marketing.create') }}" class="db-btn db-btn--gold">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Nouvel événement
    </a>
  </div>

  <div class="db-table-wrap">
    <table class="db-table">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Statut</th>
          <th>Slug</th>
          <th>Créé le</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
        <tr>
          <td>
            <strong>{{ Str::limit($post->title, 50) }}</strong>
          </td>
          <td>
            <span class="db-status {{ $post->status === 'PUBLISHED' ? 'db-status--green' : 'db-status--gray' }}">
              {{ $post->status === 'PUBLISHED' ? 'Publié' : 'Brouillon' }}
            </span>
          </td>
          <td class="db-muted" style="font-size:0.78rem">{{ $post->slug }}</td>
          <td class="db-muted">{{ $post->created_at->format('d/m/Y') }}</td>
          <td>
            <div style="display:flex;gap:8px;align-items:center">
              {{-- Toggle publish/draft --}}
              <form action="{{ route('dashboard.marketing.toggle', $post->id) }}" method="POST">
                @csrf
                <button type="submit"
                        class="db-btn-icon {{ $post->status === 'PUBLISHED' ? 'db-btn-icon--orange' : 'db-btn-icon--green' }}"
                        title="{{ $post->status === 'PUBLISHED' ? 'Mettre en brouillon' : 'Publier' }}">
                  @if($post->status === 'PUBLISHED')
                  <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                  @else
                  <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><polyline points="9 11 12 14 22 4"/></svg>
                  @endif
                </button>
              </form>
              {{-- Edit --}}
              <a href="{{ route('dashboard.marketing.edit', $post->id) }}"
                 class="db-btn-icon" title="Modifier">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
              </a>
              {{-- View on site --}}
              <a href="{{ route('post.show', $post->slug) }}" target="_blank"
                 class="db-btn-icon" title="Voir sur le site">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
              </a>
              {{-- Delete --}}
              <form action="{{ route('dashboard.marketing.destroy', $post->id) }}" method="POST"
                    onsubmit="return confirm('Supprimer « {{ addslashes($post->title) }} » ?')">
                @csrf @method('DELETE')
                <button type="submit" class="db-btn-icon db-btn-icon--red" title="Supprimer">
                  <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" class="db-empty">Aucun événement</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection

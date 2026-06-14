@extends('Dashboard.layout')

@section('title', 'Catégories Vidéos — Dashboard')
@section('page-title', 'Catégories Vidéos')

@push('styles')
<style>
.dvc-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:20px;padding:0 24px 24px}
.dvc-card{background:var(--db-surface);border:1px solid var(--db-border);border-radius:12px;overflow:hidden}
.dvc-thumb{position:relative;aspect-ratio:16/9;background:#000;cursor:pointer;overflow:hidden}
.dvc-thumb__poster{width:100%;height:100%;object-fit:cover;display:block;transition:transform .3s}
.dvc-thumb:hover .dvc-thumb__poster{transform:scale(1.04)}
.dvc-thumb__play{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,.4);transition:background .2s}
.dvc-thumb:hover .dvc-thumb__play{background:rgba(0,0,0,.2)}
.dvc-thumb__play svg{width:48px;height:48px;color:#c9a84c;filter:drop-shadow(0 2px 8px rgba(0,0,0,.7))}
.dvc-thumb video{width:100%;height:100%;object-fit:contain;display:block}
.dvc-body{padding:14px 16px}
.dvc-title{font-size:.9rem;font-weight:600;color:var(--db-text);margin:0 0 8px;line-height:1.4}
.dvc-meta{display:flex;gap:6px;flex-wrap:wrap;align-items:center}
.dvc-badge{font-size:.68rem;font-weight:700;padding:2px 9px;border-radius:20px;text-transform:uppercase;letter-spacing:.05em}
.dvc-badge--upload{background:rgba(201,168,76,.15);color:#c9a84c;border:1px solid rgba(201,168,76,.3)}
.dvc-badge--local{background:rgba(99,102,241,.15);color:#818cf8;border:1px solid rgba(99,102,241,.3)}
.dvc-badge--pub{background:rgba(34,197,94,.12);color:#4ade80;border:1px solid rgba(34,197,94,.25)}
.dvc-badge--draft{background:rgba(156,163,175,.1);color:#9ca3af;border:1px solid rgba(156,163,175,.2)}
.dvc-link{margin-top:8px;display:inline-flex;align-items:center;gap:5px;font-size:.78rem;color:#c9a84c;text-decoration:none;opacity:.75;transition:opacity .15s}
.dvc-link:hover{opacity:1}
.dvc-empty{text-align:center;padding:60px 24px;color:var(--db-text-muted);font-size:.95rem}
</style>
@endpush

@section('content')
<div class="db-card">
  <div class="db-card__head">
    <h2 class="db-card__title">Toutes les vidéos — {{ count($items) }} événement(s)</h2>
  </div>

  @if(count($items))
  <div class="dvc-grid">
    @foreach($items as $item)
    <div class="dvc-card">

      {{-- Thumbnail — video ne charge pas avant le clic --}}
      <div class="dvc-thumb" data-src="{{ $item['src'] }}">
        @if($item['cover'])
          <img class="dvc-thumb__poster" src="{{ $item['cover'] }}" alt="{{ $item['post']->title }}" loading="lazy">
        @else
          <div class="dvc-thumb__poster" style="background:linear-gradient(135deg,#1a1a2e,#16213e)"></div>
        @endif
        <div class="dvc-thumb__play">
          <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10" fill="rgba(0,0,0,.45)"/><polygon points="10 8 16 12 10 16"/></svg>
        </div>
      </div>

      <div class="dvc-body">
        <div class="dvc-title">{{ $item['post']->title }}</div>
        <div class="dvc-meta">
          <span class="dvc-badge dvc-badge--{{ $item['type'] === 'upload' ? 'upload' : 'local' }}">
            {{ $item['type'] === 'upload' ? 'Uploadé' : 'Local' }}
          </span>
          <span class="dvc-badge dvc-badge--{{ $item['post']->status === 'PUBLISHED' ? 'pub' : 'draft' }}">
            {{ $item['post']->status === 'PUBLISHED' ? 'Publié' : 'Brouillon' }}
          </span>
        </div>
        <a href="{{ route('dashboard.marketing.edit', $item['post']->id) }}" class="dvc-link">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" width="12" height="12"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          Modifier l'événement
        </a>
      </div>

    </div>
    @endforeach
  </div>
  @else
  <div class="dvc-empty">Aucune vidéo trouvée — ajoutez une vidéo à un événement.</div>
  @endif
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.dvc-thumb').forEach(function(thumb) {
  thumb.addEventListener('click', function() {
    var src = this.dataset.src;
    var video = document.createElement('video');
    video.src = src;
    video.controls = true;
    video.autoplay = true;
    video.style.cssText = 'width:100%;height:100%;object-fit:contain;display:block;background:#000';
    this.innerHTML = '';
    this.appendChild(video);
    this.style.cursor = 'default';
  });
});
</script>
@endpush

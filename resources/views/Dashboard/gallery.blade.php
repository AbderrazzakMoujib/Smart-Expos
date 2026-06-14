@extends('Dashboard.layout')

@section('title', 'Galerie — Dashboard')
@section('page-title', 'Gestion de la Galerie')

@section('content')

<div class="db-gallery-info">
  <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
  Chaque événement peut avoir <strong>1 image cover</strong> + <strong>3 photos de galerie</strong>. Cliquez sur une photo pour la remplacer, ou sur <span class="db-gallery-info__x">✕</span> pour la supprimer.
</div>

@foreach($posts as $post)
<div class="db-card db-gallery-card">

  {{-- Header --}}
  <div class="db-card__head">
    <div style="display:flex;align-items:center;gap:12px">
      <span class="db-status {{ $post->status === 'PUBLISHED' ? 'db-status--green' : 'db-status--gray' }}">
        {{ $post->status === 'PUBLISHED' ? 'Publié' : 'Brouillon' }}
      </span>
      <h2 class="db-card__title" style="margin:0">{{ $post->title }}</h2>
    </div>
    <a href="{{ route('dashboard.marketing.edit', $post->id) }}" class="db-btn db-btn--ghost" style="font-size:0.76rem;padding:7px 14px">
      Modifier l'événement
    </a>
  </div>

  {{-- Photos grid --}}
  <div class="db-gallery-grid">

    @foreach(['logo' => 'Logo', 'image' => 'Cover', 'img1' => 'Photo 1', 'img2' => 'Photo 2', 'img3' => 'Photo 3'] as $field => $label)
    <div class="db-gallery-slot" id="slot-{{ $post->id }}-{{ $field }}" data-field="{{ $field }}">
      <div class="db-gallery-slot__label">{{ $label }}</div>

      @if($post->$field)
      {{-- Has photo --}}
      <div class="db-gallery-slot__img-wrap">
        <img src="{{ asset('storage/'.$post->$field) }}" alt="{{ $label }}" loading="lazy">

        {{-- Delete --}}
        <form action="{{ route('dashboard.gallery.photo.delete', $post->id) }}" method="POST"
              class="db-gallery-slot__del"
              onsubmit="return confirm('Supprimer cette photo ?')">
          @csrf @method('DELETE')
          <input type="hidden" name="field" value="{{ $field }}">
          <button type="submit" title="Supprimer">✕</button>
        </form>
      </div>

      {{-- Replace --}}
      <form action="{{ route('dashboard.gallery.photos', $post->id) }}" method="POST"
            enctype="multipart/form-data" class="db-gallery-slot__replace">
        @csrf
        <label class="db-gallery-slot__upload-btn">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
          Remplacer
          <input type="file" name="{{ $field }}" accept="image/*"
                 onchange="this.closest('form').submit()">
        </label>
      </form>

      @else
      {{-- Empty slot --}}
      <form action="{{ route('dashboard.gallery.photos', $post->id) }}" method="POST"
            enctype="multipart/form-data" class="db-gallery-slot__empty">
        @csrf
        <label class="db-gallery-slot__add">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
          <span>Ajouter</span>
          <input type="file" name="{{ $field }}" accept="image/*"
                 onchange="this.closest('form').submit()">
        </label>
      </form>
      @endif

    </div>
    @endforeach

    {{-- Extra photos from category --}}
    @if($post->extra_photos->isNotEmpty())
      @foreach($post->extra_photos as $i => $catPhoto)
      <div class="db-gallery-slot" data-field="cat">
        <div class="db-gallery-slot__label" style="color:var(--gold)">
          Cat. {{ $i + 1 }}
        </div>
        <div class="db-gallery-slot__img-wrap">
          <img src="{{ asset("storage/{$catPhoto->path}") }}" alt="Photo catégorie" loading="lazy">
          <form action="{{ route('dashboard.categories.photos.delete', $catPhoto->id) }}" method="POST"
                class="db-gallery-slot__del"
                onsubmit="return confirm('Supprimer cette photo ?')">
            @csrf @method('DELETE')
            <button type="submit" title="Supprimer">✕</button>
          </form>
        </div>
      </div>
      @endforeach

      @if($post->category_id)
      <div class="db-gallery-slot db-gallery-slot--add-more" data-field="cat-add">
        <div class="db-gallery-slot__label" style="color:var(--gold)">Ajouter</div>
        <a href="{{ route('dashboard.categories.show', $post->category_id) }}"
           class="db-gallery-slot__add" style="text-decoration:none">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
          <span>+ Photos</span>
        </a>
      </div>
      @endif
    @endif

  </div>

</div>
@endforeach

@if($posts->isEmpty())
<div class="db-card" style="padding:60px;text-align:center;color:var(--muted)">
  Aucun événement trouvé.
</div>
@endif

@endsection

@push('styles')
<style>
.db-gallery-info {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  background: rgba(212,175,55,0.07);
  border: 1px solid rgba(212,175,55,0.18);
  border-radius: 12px;
  padding: 14px 18px;
  font-size: 0.83rem;
  color: rgba(212,175,55,0.80);
  margin-bottom: 24px;
  line-height: 1.6;
}
.db-gallery-info svg { width:16px;height:16px;stroke:var(--gold);flex-shrink:0;margin-top:2px; }
.db-gallery-info strong { color: var(--gold); }
.db-gallery-info__x {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 18px; height: 18px;
  background: rgba(224,82,82,0.20);
  border-radius: 50%;
  font-size: 0.65rem;
  color: #e05252;
  font-weight: 700;
}

.db-gallery-card { margin-bottom: 20px; }

.db-gallery-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 16px;
  padding: 20px 24px;
}

/* Logo slot — object-contain + white bg */
.db-gallery-slot[data-field="logo"] .db-gallery-slot__img-wrap img {
  object-fit: contain;
  background: #fff;
  padding: 8px;
}
.db-gallery-slot[data-field="logo"] .db-gallery-slot__label {
  color: var(--gold);
}

.db-gallery-slot {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.db-gallery-slot__label {
  font-size: 0.68rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  color: var(--muted);
}

/* Slot with image */
.db-gallery-slot__img-wrap {
  position: relative;
  border-radius: 10px;
  overflow: hidden;
  aspect-ratio: 4/3;
  background: var(--navy-lt);
  border: 1.5px solid rgba(255,255,255,0.06);
}
.db-gallery-slot__img-wrap img {
  width: 100%; height: 100%;
  object-fit: cover;
  display: block;
  transition: transform .3s;
}
.db-gallery-slot__img-wrap:hover img { transform: scale(1.04); }

/* Delete button */
.db-gallery-slot__del {
  position: absolute;
  top: 6px; right: 6px;
  z-index: 2;
}
.db-gallery-slot__del button {
  width: 26px; height: 26px;
  background: rgba(224,82,82,0.85);
  border: none;
  border-radius: 50%;
  color: #fff;
  font-size: 0.75rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  opacity: 0;
  transition: opacity .2s, background .2s;
}
.db-gallery-slot__img-wrap:hover .db-gallery-slot__del button { opacity: 1; }
.db-gallery-slot__del button:hover { background: var(--red); }

/* Replace button */
.db-gallery-slot__replace { margin-top: 2px; }
.db-gallery-slot__upload-btn {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 0.73rem;
  font-weight: 700;
  color: var(--muted);
  cursor: pointer;
  transition: color .2s;
  text-transform: uppercase;
  letter-spacing: 1px;
}
.db-gallery-slot__upload-btn svg { width:13px;height:13px;stroke:currentColor; }
.db-gallery-slot__upload-btn:hover { color: var(--gold); }
.db-gallery-slot__upload-btn input[type="file"] { display: none; }

/* Empty slot */
.db-gallery-slot__empty { flex: 1; }
.db-gallery-slot__add {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 8px;
  aspect-ratio: 4/3;
  border-radius: 10px;
  border: 2px dashed rgba(212,175,55,0.20);
  background: rgba(212,175,55,0.03);
  cursor: pointer;
  transition: border-color .2s, background .2s;
  font-size: 0.75rem;
  font-weight: 700;
  color: var(--muted);
  text-transform: uppercase;
  letter-spacing: 1px;
}
.db-gallery-slot__add svg { width:28px;height:28px;stroke:rgba(212,175,55,0.35);transition:stroke .2s; }
.db-gallery-slot__add:hover { border-color: rgba(212,175,55,0.50); background: rgba(212,175,55,0.07); color: var(--gold); }
.db-gallery-slot__add:hover svg { stroke: var(--gold); }
.db-gallery-slot__add input[type="file"] { display: none; }

@media (max-width: 1100px) {
  .db-gallery-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 700px) {
  .db-gallery-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 500px) {
  .db-gallery-grid { grid-template-columns: 1fr 1fr; gap: 10px; padding: 14px 16px; }
}
</style>
@endpush

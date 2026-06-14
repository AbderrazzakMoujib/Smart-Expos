@extends('Dashboard.layout')

@section('title', $category->name.' — Photos')
@section('page-title', $category->name)

@section('content')

{{-- Breadcrumb --}}
<div style="margin-bottom:20px">
  <a href="{{ route('dashboard.categories') }}" class="db-btn db-btn--ghost" style="font-size:0.76rem;padding:7px 14px">
    <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" style="width:13px;height:13px;stroke:currentColor"><polyline points="15 18 9 12 15 6"/></svg>
    Retour aux catégories
  </a>
</div>

{{-- Cover image slot --}}
@php $isAdmin = session('dashboard_user.role') === 'admin'; @endphp
@if($isAdmin)
<div class="db-card" style="margin-bottom:20px">
  <div class="db-card__head">
    <h2 class="db-card__title">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" style="width:15px;height:15px;stroke:var(--gold);vertical-align:middle;margin-right:6px"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
      Image de couverture (logo de la catégorie)
    </h2>
  </div>
  <div class="db-catcover-wrap">
    @if($category->cover)
    <div class="db-catcover-preview">
      <img src="{{ asset('storage/'.$category->cover) }}" alt="Cover">
      <form action="{{ route('dashboard.categories.cover.delete', $category->id) }}" method="POST"
            onsubmit="return confirm('Supprimer la cover ?')">
        @csrf @method('DELETE')
        <button type="submit" class="db-catcover-del">✕ Supprimer</button>
      </form>
    </div>
    @endif
    <form action="{{ route('dashboard.categories.cover.upload', $category->id) }}" method="POST"
          enctype="multipart/form-data" class="db-catcover-form">
      @csrf
      <label class="db-catph-dropzone db-catcover-dropzone">
        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
        <span>{{ $category->cover ? 'Remplacer la cover' : 'Ajouter une cover / logo' }}</span>
        <small>Cette image apparaît comme thumbnail de la catégorie dans la galerie publique</small>
        <input type="file" name="cover" accept="image/*" onchange="this.closest('form').submit()">
      </label>
    </form>
  </div>
</div>
@endif

{{-- Upload zone --}}
<div class="db-card" style="margin-bottom:24px">
  <div class="db-card__head"><h2 class="db-card__title">Ajouter des photos</h2></div>
  <form action="{{ route('dashboard.categories.photos.upload', $category->id) }}" method="POST"
        enctype="multipart/form-data" class="db-catph-upload">
    @csrf
    <label class="db-catph-dropzone" id="dropzone">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
      <span id="dropzone-text">Cliquer ou glisser des images ici</span>
      <small>JPG, PNG, WEBP — max 4 Mo par image — sélection multiple possible</small>
      <input type="file" name="photos[]" accept="image/*" multiple id="photoInput">
    </label>
    <div id="preview-strip" class="db-catph-preview-strip" style="display:none"></div>
    <div style="padding:0 24px 20px;display:flex;gap:12px;align-items:center">
      <button type="submit" class="db-btn db-btn--gold" id="uploadBtn" disabled>
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
        Uploader
      </button>
      <span id="file-count" style="font-size:0.78rem;color:var(--muted)"></span>
    </div>
  </form>
</div>

{{-- Photos grid --}}
<div class="db-card">
  <div class="db-card__head">
    <h2 class="db-card__title">Photos ({{ $category->photos->count() }})</h2>
    @if($category->photos->count() > 0)
    <span style="font-size:0.74rem;color:var(--muted)">Survolez pour supprimer</span>
    @endif
  </div>

  @if($category->photos->isEmpty())
  <div style="padding:60px;text-align:center;color:var(--muted);font-size:0.85rem">
    Aucune photo dans cette catégorie.
  </div>
  @else
  <div class="db-catph-grid">
    @foreach($category->photos as $photo)
    <div class="db-catph-slot">
      <img src="{{ asset('storage/'.$photo->path) }}" alt="" loading="lazy">
      <form action="{{ route('dashboard.categories.photos.delete', $photo->id) }}" method="POST"
            class="db-catph-del" onsubmit="return confirm('Supprimer cette photo ?')">
        @csrf @method('DELETE')
        <button type="submit" title="Supprimer">✕</button>
      </form>
    </div>
    @endforeach
  </div>
  @endif
</div>

@endsection

@push('styles')
<style>
.db-catph-upload { display: flex; flex-direction: column; }

.db-catph-dropzone {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 10px;
  margin: 20px 24px 12px;
  padding: 32px 24px;
  border: 2px dashed rgba(212,175,55,0.25);
  border-radius: 14px;
  background: rgba(212,175,55,0.03);
  cursor: pointer;
  transition: border-color .2s, background .2s;
  text-align: center;
}
.db-catph-dropzone svg { width: 40px; height: 40px; stroke: rgba(212,175,55,0.4); transition: stroke .2s; }
.db-catph-dropzone span { font-size: 0.88rem; font-weight: 600; color: var(--muted); }
.db-catph-dropzone small { font-size: 0.73rem; color: rgba(255,255,255,0.25); }
.db-catph-dropzone:hover,
.db-catph-dropzone.drag-over {
  border-color: rgba(212,175,55,0.55);
  background: rgba(212,175,55,0.07);
}
.db-catph-dropzone:hover svg,
.db-catph-dropzone.drag-over svg { stroke: var(--gold); }
.db-catph-dropzone:hover span,
.db-catph-dropzone.drag-over span { color: var(--gold); }
.db-catph-dropzone input[type="file"] { display: none; }

.db-catph-preview-strip {
  display: flex;
  gap: 8px;
  padding: 0 24px 14px;
  overflow-x: auto;
  flex-wrap: wrap;
}
.db-catph-preview-strip img {
  width: 70px;
  height: 56px;
  object-fit: cover;
  border-radius: 8px;
  border: 1.5px solid rgba(212,175,55,0.25);
}

.db-catph-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
  gap: 12px;
  padding: 20px 24px;
}
.db-catph-slot {
  position: relative;
  border-radius: 10px;
  overflow: hidden;
  aspect-ratio: 4/3;
  background: var(--navy-lt);
}
.db-catph-slot img {
  width: 100%; height: 100%;
  object-fit: cover;
  display: block;
  transition: transform .3s;
}
.db-catph-slot:hover img { transform: scale(1.04); }
.db-catph-del {
  position: absolute;
  top: 6px; right: 6px;
  z-index: 2;
}
.db-catph-del button {
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
  transition: opacity .2s;
}
.db-catph-slot:hover .db-catph-del button { opacity: 1; }
.db-catph-del button:hover { background: var(--red); }

@media (max-width: 600px) {
  .db-catph-grid { grid-template-columns: repeat(2, 1fr); }
}

/* Cover section */
.db-catcover-wrap {
  display: flex;
  gap: 20px;
  padding: 16px 24px 20px;
  align-items: flex-start;
  flex-wrap: wrap;
}
.db-catcover-preview {
  display: flex;
  flex-direction: column;
  gap: 8px;
  align-items: center;
}
.db-catcover-preview img {
  width: 120px;
  height: 90px;
  object-fit: cover;
  border-radius: 10px;
  border: 2px solid rgba(212,175,55,0.30);
}
.db-catcover-del {
  background: none;
  border: none;
  color: var(--red);
  font-size: 0.72rem;
  font-weight: 700;
  cursor: pointer;
  padding: 0;
  transition: opacity .2s;
}
.db-catcover-del:hover { opacity: 0.7; }
.db-catcover-form { flex: 1; min-width: 200px; }
.db-catcover-dropzone {
  padding: 18px 20px !important;
  margin: 0 !important;
}
.db-catcover-dropzone svg { width: 28px !important; height: 28px !important; }
.db-catcover-dropzone input[type="file"] { display: none; }
</style>
@endpush

@push('scripts')
<script>
(function(){
  var input   = document.getElementById('photoInput');
  var btn     = document.getElementById('uploadBtn');
  var count   = document.getElementById('file-count');
  var strip   = document.getElementById('preview-strip');
  var zone    = document.getElementById('dropzone');
  var ztext   = document.getElementById('dropzone-text');

  function handleFiles(files) {
    strip.innerHTML = '';
    if (!files.length) { btn.disabled = true; count.textContent = ''; strip.style.display='none'; return; }
    btn.disabled = false;
    count.textContent = files.length + ' fichier' + (files.length > 1 ? 's' : '') + ' sélectionné' + (files.length > 1 ? 's' : '');
    strip.style.display = 'flex';
    ztext.textContent = files.length + ' image' + (files.length > 1 ? 's' : '') + ' sélectionnée' + (files.length > 1 ? 's' : '');
    Array.from(files).forEach(function(f) {
      var r = new FileReader();
      r.onload = function(e) {
        var img = document.createElement('img');
        img.src = e.target.result;
        strip.appendChild(img);
      };
      r.readAsDataURL(f);
    });
  }

  input.addEventListener('change', function(){ handleFiles(this.files); });

  zone.addEventListener('dragover',  function(e){ e.preventDefault(); zone.classList.add('drag-over'); });
  zone.addEventListener('dragleave', function(){  zone.classList.remove('drag-over'); });
  zone.addEventListener('drop', function(e){
    e.preventDefault();
    zone.classList.remove('drag-over');
    var dt = new DataTransfer();
    Array.from(e.dataTransfer.files).forEach(function(f){ if(f.type.startsWith('image/')) dt.items.add(f); });
    input.files = dt.files;
    handleFiles(input.files);
  });
})();
</script>
@endpush

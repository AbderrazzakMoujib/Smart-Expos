@extends('Dashboard.layout')

@section('title', isset($post) ? 'Modifier — '.$post->title : 'Nouvel événement')
@section('page-title', isset($post) ? 'Modifier l\'événement' : 'Nouvel événement')

@section('content')

@php
  $isEdit = isset($post);
  $types  = ['Salon', 'Forum', 'Exposition', 'Gala', 'Conférence', 'Journée', 'Autre'];
@endphp

<form
  action="{{ $isEdit ? route('dashboard.marketing.update', $post->id) : route('dashboard.marketing.store') }}"
  method="POST"
  enctype="multipart/form-data"
  class="db-event-form"
>
  @csrf

  @if($errors->any())
  <div class="db-alert db-alert--error" style="margin-bottom:20px;border-radius:12px">
    <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
    <div>@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
  </div>
  @endif

  <div class="db-ef-grid">

    {{-- ── LEFT ── --}}
    <div class="db-ef-main">

      {{-- 1. Identité de l'événement --}}
      <div class="db-card db-ef-section-card">
        <div class="db-card__head">
          <h2 class="db-card__title">
            <span class="db-ef-step">1</span> Identité de l'événement
          </h2>
        </div>
        <div class="db-ef-section">

          <div class="db-ef-field">
            <label>Nom de l'événement *</label>
            <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}"
                   placeholder="Ex: Forum International de Plasturgie 2025" required>
          </div>

          <div class="db-ef-row">
            <div class="db-ef-field">
              <label>Type d'événement</label>
              <select name="event_type">
                <option value="">— Choisir un type —</option>
                @foreach($types as $t)
                <option value="{{ $t }}" {{ old('event_type', $post->event_type ?? '') === $t ? 'selected' : '' }}>
                  {{ $t }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="db-ef-field">
              <label>Date de l'événement</label>
              <input type="date" name="date" value="{{ old('date', isset($post->date) ? \Carbon\Carbon::parse($post->date)->format('Y-m-d') : '') }}">
            </div>
          </div>

          <div class="db-ef-field">
            <label>Lieu / Ville</label>
            <input type="text" name="location" value="{{ old('location', $post->location ?? '') }}"
                   placeholder="Ex: Casablanca, OFEC">
          </div>

          <div class="db-ef-field">
            <label>Résumé court</label>
            <textarea name="excerpt" rows="2"
                      placeholder="Une ligne qui décrit l'événement pour les aperçus…">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
          </div>

        </div>
      </div>

      {{-- 2. Logo --}}
      <div class="db-card db-ef-section-card">
        <div class="db-card__head">
          <h2 class="db-card__title"><span class="db-ef-step">2</span> Logo de l'événement</h2>
        </div>
        <div class="db-ef-section">
          <p class="db-ef-hint">Le logo apparaît sur la carte de l'événement dans la galerie publique.</p>
          @if($isEdit && ($post->logo ?? null))
          <div class="db-ef-preview db-ef-preview--logo">
            <img src="{{ asset('storage/'.$post->logo) }}" alt="Logo actuel">
            <span class="db-ef-preview__label">Logo actuel — choisir un fichier pour le remplacer</span>
          </div>
          @endif
          <input type="file" name="logo" accept="image/*" class="db-ef-file">
        </div>
      </div>

      {{-- 3. Description --}}
      <div class="db-card db-ef-section-card">
        <div class="db-card__head">
          <h2 class="db-card__title"><span class="db-ef-step">3</span> Description</h2>
        </div>
        <div class="db-ef-section">

          <div class="db-ef-field">
            <label>Description complète de l'événement</label>
            <textarea name="body" rows="6"
                      placeholder="Présentez l'événement, ses objectifs, son contexte…">{{ old('body', $post->body ?? '') }}</textarea>
          </div>

          <div class="db-ef-field db-ef-field--highlight db-ef-field--green">
            <label>
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" style="width:14px;height:14px;stroke:#4ade80;vertical-align:middle;margin-right:5px"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
              Ce qui s'est passé (bilan de l'événement)
            </label>
            <textarea name="what_happened" rows="4"
                      placeholder="Résumez ce qui s'est passé lors de cet événement — intervenants, résultats, moments forts…">{{ old('what_happened', $post->what_happened ?? '') }}</textarea>
          </div>

          <div class="db-ef-field db-ef-field--highlight db-ef-field--blue">
            <label>
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" style="width:14px;height:14px;stroke:#60a5fa;vertical-align:middle;margin-right:5px"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              Ce qui va se passer (prochaine édition / à venir)
            </label>
            <textarea name="what_upcoming" rows="4"
                      placeholder="Informations sur la prochaine édition, dates prévues, nouveautés…">{{ old('what_upcoming', $post->what_upcoming ?? '') }}</textarea>
          </div>

        </div>
      </div>

      {{-- 4. Image cover + Photos galerie --}}
      <div class="db-card db-ef-section-card">
        <div class="db-card__head">
          <h2 class="db-card__title"><span class="db-ef-step">4</span> Photos</h2>
        </div>
        <div class="db-ef-section">

          {{-- Cover --}}
          <div class="db-ef-field">
            <label>Image cover (hero de la page événement)</label>
            @if($isEdit && ($post->image ?? null))
            <div class="db-ef-preview">
              <img src="{{ asset('storage/'.$post->image) }}" alt="Cover">
              <span class="db-ef-preview__label">Image actuelle</span>
            </div>
            @endif
            <input type="file" name="image" accept="image/*" class="db-ef-file">
          </div>

          {{-- Gallery photos --}}
          <div class="db-ef-photos-row">
            @foreach(['img1' => 'Photo galerie 1', 'img2' => 'Photo galerie 2', 'img3' => 'Photo galerie 3'] as $field => $label)
            <div class="db-ef-field">
              <label>{{ $label }}</label>
              @if($isEdit && ($post->$field ?? null))
              <div class="db-ef-preview db-ef-preview--sm">
                <img src="{{ asset('storage/'.$post->$field) }}" alt="{{ $label }}">
                <label class="db-ef-remove">
                  <input type="checkbox" name="remove_{{ $field }}" value="1">
                  Supprimer
                </label>
              </div>
              @endif
              <input type="file" name="{{ $field }}" accept="image/*" class="db-ef-file">
            </div>
            @endforeach
          </div>

          {{-- Recap video --}}
          <div class="db-ef-field db-ef-field--video">
            <label>
              <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" style="width:13px;height:13px;stroke:currentColor;vertical-align:middle;margin-right:4px"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
              Vidéo recap (bilan de l'événement)
            </label>
            @if($isEdit && ($post->recap_video ?? null))
            <div class="db-ef-video-preview">
              <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" style="width:28px;height:28px;stroke:var(--gold);flex-shrink:0"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg>
              <div class="db-ef-video-preview__info">
                <span class="db-ef-video-preview__name">{{ basename($post->recap_video) }}</span>
                <label class="db-ef-remove">
                  <input type="checkbox" name="remove_recap_video" value="1">
                  Supprimer la vidéo
                </label>
              </div>
            </div>
            @endif
            <input type="file" name="recap_video" accept="video/mp4,video/webm,video/ogg" class="db-ef-file db-ef-file--video">
            <span class="db-ef-hint" style="margin-top:2px">MP4, WebM, OGG — max 100 Mo. Cette vidéo apparaîtra dans l'album vidéos de l'événement.</span>
          </div>

        </div>
      </div>

    </div>

    {{-- ── RIGHT SIDEBAR ── --}}
    <div class="db-ef-sidebar">

      {{-- Publication --}}
      <div class="db-card" style="margin-bottom:16px">
        <div class="db-card__head"><h2 class="db-card__title">Publication</h2></div>
        <div class="db-ef-section" style="gap:10px">
          <button type="submit" name="publish" value="1" class="db-btn db-btn--gold" style="width:100%;justify-content:center">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><polyline points="9 11 12 14 22 4"/></svg>
            {{ $isEdit ? 'Enregistrer et publier' : 'Créer et publier' }}
          </button>
          <button type="submit" class="db-btn db-btn--ghost" style="width:100%;justify-content:center">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/></svg>
            Brouillon
          </button>
          <a href="{{ route('dashboard.marketing') }}" class="db-btn db-btn--ghost" style="width:100%;justify-content:center;text-align:center">
            Annuler
          </a>
        </div>
      </div>

      {{-- Vidéo --}}
      <div class="db-card" style="margin-bottom:16px">
        <div class="db-card__head"><h2 class="db-card__title">Vidéo</h2></div>
        <div class="db-ef-section">
          <p class="db-ef-hint">Vidéo background du hero. Déposez le fichier .mp4 dans <code>public/assets/img/video/</code> puis rafraîchissez.</p>
          @php $currentVideo = $isEdit ? ($post->video ?? null) : null; @endphp
          <div class="db-ef-field">
            <label>Vidéo associée</label>
            <select name="video_file">
              <option value="">— Aucune vidéo —</option>
              @foreach($videos as $v)
              <option value="{{ $v }}" {{ $currentVideo === $v ? 'selected' : '' }}>{{ $v }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      {{-- SEO --}}
      <div class="db-card">
        <div class="db-card__head"><h2 class="db-card__title">SEO</h2></div>
        <div class="db-ef-section">
          <div class="db-ef-field">
            <label>SEO Title</label>
            <input type="text" name="seo_title" value="{{ old('seo_title', $post->seo_title ?? '') }}"
                   placeholder="Titre pour Google…">
          </div>
          <div class="db-ef-field">
            <label>Meta description</label>
            <textarea name="meta_description" rows="3"
                      placeholder="Description pour les moteurs de recherche…">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
          </div>
        </div>
      </div>

    </div>
  </div>
</form>

@endsection

@push('styles')
<style>
.db-ef-grid {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 20px;
  align-items: start;
}
.db-ef-section-card { margin-bottom: 16px; }

.db-ef-step {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 22px; height: 22px;
  background: var(--gold);
  color: #05101f;
  border-radius: 50%;
  font-size: 0.72rem;
  font-weight: 800;
  margin-right: 8px;
  flex-shrink: 0;
}

.db-ef-section {
  padding: 18px 22px;
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.db-ef-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 14px;
}
.db-ef-photos-row {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 12px;
}
.db-ef-field {
  display: flex;
  flex-direction: column;
  gap: 6px;
}
.db-ef-field label {
  font-size: 0.70rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  color: var(--muted);
}
.db-ef-field--highlight {
  background: rgba(255,255,255,0.02);
  border-radius: 10px;
  padding: 12px 14px;
  border-left: 3px solid transparent;
}
.db-ef-field--green { border-left-color: #4ade80; }
.db-ef-field--blue  { border-left-color: #60a5fa; }
.db-ef-field--highlight label { margin-bottom: 2px; }

.db-ef-field input[type="text"],
.db-ef-field input[type="date"],
.db-ef-field textarea,
.db-ef-field select {
  font-family: inherit;
  font-size: 0.87rem;
  color: var(--white);
  background: var(--navy-lt);
  border: 1.5px solid rgba(255,255,255,0.08);
  border-radius: 10px;
  padding: 10px 13px;
  outline: none;
  transition: border-color .2s;
  resize: vertical;
}
.db-ef-field input:focus,
.db-ef-field textarea:focus,
.db-ef-field select:focus { border-color: rgba(212,175,55,0.45); }
.db-ef-field input::placeholder,
.db-ef-field textarea::placeholder { color: var(--muted); }
.db-ef-field select option { background: var(--navy-card); }

.db-ef-file {
  font-family: inherit;
  font-size: 0.80rem;
  color: var(--muted);
  background: var(--navy-lt);
  border: 1.5px dashed rgba(212,175,55,0.25);
  border-radius: 10px;
  padding: 10px 12px;
  cursor: pointer;
  transition: border-color .2s;
  width: 100%;
}
.db-ef-file:hover { border-color: rgba(212,175,55,0.5); }

.db-ef-preview {
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(255,255,255,0.03);
  border: 1px solid rgba(255,255,255,0.06);
  border-radius: 10px;
  padding: 8px 12px;
}
.db-ef-preview img { width: 70px; height: 50px; object-fit: cover; border-radius: 6px; flex-shrink: 0; }
.db-ef-preview--logo img { width: 80px; height: 60px; object-fit: contain; background: rgba(255,255,255,0.05); border-radius: 6px; }
.db-ef-preview--sm img  { width: 50px; height: 38px; }
.db-ef-preview__label { font-size: 0.74rem; color: var(--muted); }

.db-ef-remove {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 0.73rem;
  color: var(--red);
  cursor: pointer;
  font-weight: 600;
}
.db-ef-remove input { accent-color: var(--red); cursor: pointer; }

.db-ef-hint { font-size: 0.73rem; color: var(--muted); line-height: 1.5; }

.db-ef-field--video { margin-top: 4px; }
.db-ef-file--video { border-color: rgba(212,175,55,0.20); }

.db-ef-video-preview {
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(212,175,55,0.05);
  border: 1px solid rgba(212,175,55,0.18);
  border-radius: 10px;
  padding: 10px 14px;
}
.db-ef-video-preview__info {
  display: flex;
  flex-direction: column;
  gap: 4px;
  min-width: 0;
}
.db-ef-video-preview__name {
  font-size: 0.78rem;
  color: var(--gold);
  font-weight: 600;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.db-ef-hint code { background: rgba(255,255,255,0.06); padding: 1px 5px; border-radius: 4px; font-family: monospace; font-size: 0.70rem; }

@media (max-width: 900px) {
  .db-ef-grid { grid-template-columns: 1fr; }
  .db-ef-sidebar { order: -1; }
  .db-ef-photos-row { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 600px) {
  .db-ef-row { grid-template-columns: 1fr; }
  .db-ef-photos-row { grid-template-columns: 1fr; }
}
</style>
@endpush

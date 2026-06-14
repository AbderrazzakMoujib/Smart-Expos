@extends('Dashboard.layout')

@section('title', 'Leads Externes — Dashboard')
@section('page-title', 'Leads Externes')

@push('styles')
<style>
.el-tabs          { display:flex; gap:.5rem; flex-wrap:wrap; margin-bottom:1.5rem; }
.el-tab           { padding:.45rem 1rem; border-radius:6px; border:1.5px solid var(--db-border,#e5e7eb);
                    background:#fff; cursor:pointer; font-size:.82rem; font-weight:600;
                    color:#6b7280; transition:all .18s; display:flex; align-items:center; gap:.4rem; }
.el-tab:hover     { border-color:#7b3f00; color:#7b3f00; }
.el-tab.is-active { background:#7b3f00; border-color:#7b3f00; color:#fff; }
.el-tab__count    { background:rgba(255,255,255,.25); border-radius:20px; padding:1px 7px; font-size:.75rem; }
.el-tab.is-active .el-tab__count { background:rgba(0,0,0,.15); }

.el-panel         { display:none; }
.el-panel.is-active { display:block; }

.el-toolbar       { display:flex; align-items:center; justify-content:space-between;
                    flex-wrap:wrap; gap:.75rem; margin-bottom:1rem; }
.el-search        { flex:1; min-width:220px; max-width:340px; position:relative; }
.el-search input  { width:100%; padding:.42rem .9rem .42rem 2.2rem; border:1.5px solid #e5e7eb;
                    border-radius:6px; font-size:.83rem; outline:none; transition:border-color .18s; }
.el-search input:focus { border-color:#7b3f00; }
.el-search svg    { position:absolute; left:.65rem; top:50%; transform:translateY(-50%);
                    width:14px; height:14px; stroke:#9ca3af; fill:none; stroke-width:2; }

.el-error-box     { display:flex; align-items:center; gap:.75rem; padding:1rem 1.25rem;
                    background:#fef2f2; border:1px solid #fecaca; border-radius:8px;
                    color:#dc2626; font-size:.85rem; margin-bottom:1rem; }
.el-error-box svg { width:18px; height:18px; flex-shrink:0; }

.el-not-configured{ text-align:center; padding:2.5rem 1rem; color:#9ca3af; font-size:.9rem; }
.el-not-configured svg { width:40px; height:40px; margin:0 auto 1rem; display:block; stroke:#d1d5db; fill:none; stroke-width:1.5; }

.el-empty         { text-align:center; padding:2rem 1rem; color:#9ca3af; font-size:.88rem; }

/* Table */
.el-tbl-wrap      { overflow-x:auto; }
.el-tbl           { max-width:5px !important; border-collapse:collapse; font-size:13px; }
.el-tbl th        { padding:.6rem .85rem; text-align:left; font-weight:600; font-size:.75rem;
                    text-transform:uppercase; letter-spacing:.04em; color:#6b7280;
                    border-bottom:2px solid #f3f4f6; white-space:nowrap; }
.el-tbl td        { padding:.6rem .85rem; border-bottom:1px solid #f3f4f6; vertical-align:middle; }
.el-tbl tbody tr:hover { background:#fafafa; }
.el-tbl .db-link  { color:#7b3f00; text-decoration:none; }
.el-tbl .db-link:hover { text-decoration:underline; }
.el-tbl .db-muted { color:#9ca3af; }
.el-tbl .db-badge { display:inline-block; padding:2px 8px; border-radius:20px;
                    background:#f3f4f6; color:#374151; font-size:.73rem; font-weight:600; }

/* Refresh button */
.el-refresh       { display:inline-flex; align-items:center; gap:.4rem;
                    padding:.42rem .9rem; border-radius:6px; border:1.5px solid #e5e7eb;
                    background:#fff; cursor:pointer; font-size:.8rem; font-weight:600;
                    color:#6b7280; text-decoration:none; transition:all .18s; }
.el-refresh:hover { border-color:#7b3f00; color:#7b3f00; }
.el-refresh svg   { width:14px; height:14px; }

/* Header actions row */
.el-head-actions  { display:flex; gap:.5rem; align-items:center; flex-wrap:wrap; flex-shrink:0; }

/* Source badge on each tab panel header */
.el-source-badge  { display:inline-flex; align-items:center; gap:.4rem;
                    font-size:.75rem; font-weight:700; padding:3px 10px; border-radius:20px;
                    color:#fff; margin-bottom:1rem; }

/* Detail modal */
.el-modal-backdrop { display:none; position:fixed; inset:0; background:rgba(0,0,0,.55);
                     z-index:9998; align-items:center; justify-content:center; padding:16px; }
.el-modal-backdrop.is-open { display:flex; }
.el-modal          { background:#fff; border-radius:12px; width:100%; max-width:560px;
                     max-height:90vh; overflow-y:auto; box-shadow:0 24px 80px rgba(0,0,0,.25); }
.el-modal__head    { display:flex; align-items:center; justify-content:space-between;
                     padding:20px 24px 16px; border-bottom:1px solid #f3f4f6; }
.el-modal__title   { font-size:1rem; font-weight:700; color:#111; margin:0; }
.el-modal__close   { background:none; border:none; cursor:pointer; color:#9ca3af;
                     font-size:1.4rem; line-height:1; padding:4px 8px; border-radius:6px; }
.el-modal__close:hover { background:#f3f4f6; color:#374151; }
.el-modal__body    { padding:20px 24px 24px; }
.el-detail-row     { display:flex; gap:12px; padding:9px 0; border-bottom:1px solid #f9fafb; }
.el-detail-row:last-child { border-bottom:none; }
.el-detail-label   { font-size:.78rem; font-weight:600; color:#9ca3af; min-width:130px;
                     text-transform:uppercase; letter-spacing:.04em; padding-top:1px; }
.el-detail-val     { font-size:.88rem; color:#111; flex:1; word-break:break-word; }
.el-detail-val a   { color:#7b3f00; text-decoration:none; }
.el-detail-val a:hover { text-decoration:underline; }
.el-modal__actions { display:flex; gap:10px; margin-top:20px; flex-wrap:wrap; }
</style>
@endpush

@section('content')

<div class="db-card">

  {{-- Header --}}
  <div class="db-card__head" style="flex-wrap:wrap;gap:.75rem;">
    <h2 class="db-card__title" style="flex:1;min-width:200px;">Leads depuis les sites partenaires</h2>
    <div class="el-head-actions">
      <a href="{{ route('dashboard.commercial') }}" class="el-refresh">
        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" fill="none" width="14" height="14">
          <path d="M19 12H5M12 5l-7 7 7 7"/>
        </svg>
        Retour
      </a>
      <a href="{{ route('dashboard.commercial.external-leads.export') }}" class="el-refresh">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" width="14" height="14">
          <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>
        </svg>
        Exporter tout
      </a>
      <a href="{{ route('dashboard.commercial.external-leads', ['refresh' => 1]) }}" class="db-btn db-btn--gold" style="white-space:nowrap;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" width="14" height="14">
          <polyline points="23 4 23 10 17 10"/>
          <path d="M20.49 15a9 9 0 11-2.12-9.36L23 10"/>
        </svg>
        Actualiser
      </a>
    </div>
  </div>

  <p style="font-size:.82rem;color:#9ca3af;margin-bottom:1.5rem;">
    Les données sont mises en cache pendant <strong>5 minutes</strong>. Cliquez sur « Actualiser » pour forcer le rechargement depuis les APIs externes.
  </p>

  {{-- Tabs --}}
  <div class="el-tabs" id="elTabs">
    @foreach($sources as $key => $source)
    @php $count = count($results[$key]['data'] ?? []); @endphp
    <button class="el-tab {{ $loop->first ? 'is-active' : '' }}"
            data-tab="{{ $key }}" type="button">
      <span>{{ $source['label'] }}</span>
      <span class="el-tab__count">{{ $count }}</span>
    </button>
    @endforeach
  </div>

  {{-- Panels --}}
  @foreach($sources as $key => $source)
  @php
    $result = $results[$key];
    $rows   = $result['data'] ?? [];
    $error  = $result['error'] ?? null;
    $isNotConfigured = $error && str_contains($error, 'token manquant');
  @endphp

  <div class="el-panel {{ $loop->first ? 'is-active' : '' }}" id="elPanel-{{ $key }}">

    {{-- Source label --}}
    <span class="el-source-badge" style="background:{{ $source['color'] }};">
      {{ $source['label'] }}
      — {{ count($rows) }} entrée{{ count($rows) !== 1 ? 's' : '' }}
    </span>

    {{-- Error --}}
    @if($error && !$isNotConfigured)
    <div class="el-error-box">
      <svg viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round">
        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><circle cx="12" cy="16" r=".5" fill="currentColor"/>
      </svg>
      {{ $error }}
    </div>
    @endif

    {{-- Not configured --}}
    @if($isNotConfigured)
    <div class="el-not-configured">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
      <strong>API non configurée</strong><br>
      Ajoutez le token dans le fichier <code>.env</code> pour activer cette source.<br>
      <code style="font-size:.78rem;color:#6b7280;margin-top:.5rem;display:inline-block;">
        @if(str_contains($key, 'refrigairexpo'))
        REFRIGAIREXPO_API_TOKEN=votre-token
        @elseif(str_contains($key, 'seafood'))
        SEAFOOD4AFRICA_API_TOKEN=votre-token
        @else
        DIGITALEXPORTFORUM_API_TOKEN=votre-token
        @endif
      </code>
    </div>

    {{-- Data table --}}
    @elseif(count($rows) > 0)
    <div class="el-toolbar">
      <div class="el-search">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" placeholder="Rechercher…"
               data-search-panel="{{ $key }}" autocomplete="off">
      </div>
      <a href="{{ route('dashboard.commercial.external-leads.export', ['source' =>$key]) }}" class="el-refresh">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" width="14" height="14">
          <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>
        </svg>
        Exporter cette liste
      </a>
    </div>

    <div class="el-tbl-wrap">
      <table class="el-tbl" id="elTable-{{ $key }}">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Société</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Pays</th>
            <th>Ville</th>
            <th>Service / Secteur</th>
            <th>Message</th>
            <th>Date</th>
            @if(session('dashboard_user.role') === 'admin')
            <th>Assigné à</th>
            @endif
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($rows as $i => $row)
          @php
            $name    = $row['name']    ?? $row['full_name']  ?? '—';
            $company = $row['company'] ?? $row['society']    ?? $row['organisation'] ?? '—';
            $email   = $row['email']   ?? '—';
            $phone   = $row['number']  ?? $row['phone']      ?? $row['telephone']    ?? '—';
            $country = $row['country'] ?? $row['pays']       ?? '—';
            $city    = $row['city']    ?? $row['ville']      ?? '—';
            $service = $row['service'] ?? $row['sector']     ?? $row['secteur']      ?? '—';
            $message = $row['message'] ?? $row['note']       ?? '';
            $date    = $row['created_at'] ?? '—';
          @endphp
          <tr>
            <td class="db-muted">{{ $i + 1 }}</td>
            <td><strong>{{ $name }}</strong></td>
            <td>{{ $company }}</td>
            <td>
              @if($email !== '—')
              <a href="mailto:{{ $email }}" class="db-link">{{ $email }}</a>
              @else —
              @endif
            </td>
            <td>{{ $phone }}</td>
            <td>{{ $country }}</td>
            <td>{{ $city }}</td>
            <td>
              @if($service !== '—')
              <span class="db-badge">{{ $service }}</span>
              @else —
              @endif
            </td>
            <td>
              @if($message)
              <span title="{{ $message }}" style="cursor:help;border-bottom:1px dashed #d1d5db;">
                {{ \Illuminate\Support\Str::limit($message, 40) }}
              </span>
              @else —
              @endif
            </td>
            <td class="db-muted">{{ $date }}</td>
            @if(session('dashboard_user.role') === 'admin')
            <td>
              @php $assignedName = $commerciaux[$row['assigned_to'] ?? null] ?? null; @endphp
              @if($assignedName)
              <span class="db-badge" style="background:rgba(123,63,0,.12);color:#7b3f00;">{{ $assignedName }}</span>
              @else
              <span class="db-muted">—</span>
              @endif
            </td>
            @endif
            <td>
              <button type="button" class="db-btn-icon el-view-btn" title="Voir détail"
                data-row="{{ json_encode($row, JSON_HEX_APOS|JSON_HEX_QUOT) }}">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke="currentColor" width="16" height="16"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @else
    <div class="el-empty">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
           width="36" height="36" style="margin:0 auto 1rem;display:block;stroke:#d1d5db">
        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/>
        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
      </svg>
      Aucune donnée disponible pour cette source.
    </div>
    @endif

  </div>
  @endforeach

</div>

{{-- Detail modal --}}
<div class="el-modal-backdrop" id="elDetailModal" role="dialog" aria-modal="true" aria-labelledby="elModalTitle">
  <div class="el-modal">
    <div class="el-modal__head">
      <h3 class="el-modal__title" id="elModalTitle">Détail du lead</h3>
      <button class="el-modal__close" id="elModalClose" aria-label="Fermer">&times;</button>
    </div>
    <div class="el-modal__body" id="elModalBody"></div>
  </div>
</div>

@endsection

@push('scripts')
<script>
(function () {
  // Tab switching
  document.querySelectorAll('.el-tab').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('.el-tab').forEach(function (b) { b.classList.remove('is-active'); });
      document.querySelectorAll('.el-panel').forEach(function (p) { p.classList.remove('is-active'); });
      btn.classList.add('is-active');
      var panel = document.getElementById('elPanel-' + btn.dataset.tab);
      if (panel) panel.classList.add('is-active');
    });
  });

  // Per-tab search filter
  document.querySelectorAll('[data-search-panel]').forEach(function (input) {
    input.addEventListener('input', function () {
      var key   = input.dataset.searchPanel;
      var table = document.getElementById('elTable-' + key);
      if (!table) return;
      var q = input.value.toLowerCase().trim();
      table.querySelectorAll('tbody tr').forEach(function (row) {
        row.style.display = q === '' || row.textContent.toLowerCase().includes(q) ? '' : 'none';
      });
    });
  });
})();

// Detail modal
(function () {
  var modal   = document.getElementById('elDetailModal');
  var body    = document.getElementById('elModalBody');
  var closeBtn= document.getElementById('elModalClose');

  var labels = {
    type: 'Type', name: 'Nom', full_name: 'Nom', username: 'Nom',
    prenom: 'Prénom', nom: 'Nom',
    company: 'Société', society: 'Société', organisation: 'Société', societe: 'Société',
    fonction: 'Fonction',
    email: 'Email', number: 'Téléphone', phone: 'Téléphone', telephone: 'Téléphone',
    country: 'Pays', pays: 'Pays', city: 'Ville', ville: 'Ville',
    service: 'Service', sector: 'Secteur', secteur: 'Secteur',
    subject: 'Sujet', sujet: 'Sujet', stand: 'Stand', package: 'Package',
    message: 'Message', note: 'Note',
    created_at: 'Date',
  };
  var skip = ['id', 'source', 'assigned_to'];

  function open(row) {
    var html = '';
    Object.keys(row).forEach(function (k) {
      if (skip.indexOf(k) !== -1 || !row[k] || !labels[k]) return;
      var label = labels[k];
      var val   = row[k];
      var display = val;
      if (k === 'email')   display = '<a href="mailto:' + val + '">' + val + '</a>';
      if (k === 'number' || k === 'phone' || k === 'telephone')
                           display = '<a href="tel:' + val + '">' + val + '</a>';
      html += '<div class="el-detail-row">'
            + '<span class="el-detail-label">' + label + '</span>'
            + '<span class="el-detail-val">' + display + '</span>'
            + '</div>';
    });

    // Action buttons
    html += '<div class="el-modal__actions">';
    if (row.email) {
      html += '<a href="mailto:' + row.email + '" class="db-btn db-btn--gold">'
            + '<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke="currentColor" width="15" height="15"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>'
            + ' Répondre par email</a>';
    }
    var tel = row.number || row.phone || row.telephone;
    if (tel) {
      html += '<a href="tel:' + tel + '" class="db-btn db-btn--ghost">'
            + '<svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke="currentColor" width="15" height="15"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-7.82-3.1 19.5 19.5 0 01-9-9A19.79 19.79 0 011.09 2.18 2 2 0 013.08 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.91 7.91a16 16 0 006 6l.61-.61a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>'
            + ' Appeler</a>';
    }
    html += '</div>';

    body.innerHTML = html;
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    closeBtn.focus();
  }

  function close() {
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  document.addEventListener('click', function (e) {
    var btn = e.target.closest('.el-view-btn');
    if (btn) {
      try { open(JSON.parse(btn.dataset.row)); } catch(err) {}
    }
  });

  closeBtn.addEventListener('click', close);
  modal.addEventListener('click', function (e) {
    if (e.target === modal) close();
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') close();
  });
})();
</script>
@endpush

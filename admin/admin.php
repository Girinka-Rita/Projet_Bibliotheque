<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administration — Bibliothèque Cléry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; background: #eef2f8; color: #333; }

    /* ── Mur d'auth ── */
    #auth-wall { position: fixed; inset: 0; background: #0d0f14; z-index: 9999; display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 18px; }
    #auth-wall.hidden { display: none; }
    #auth-wall p { color: #6b7280; font-size: .95rem; }
    #auth-wall a { color: #667eea; font-weight: 700; text-decoration: none; }
    #auth-wall a:hover { text-decoration: underline; }

    /* ── Header ── */
    .header-top { display: flex; justify-content: space-between; align-items: center; gap: 15px; padding: 18px 30px; background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); box-shadow: 0 4px 16px rgba(0,0,0,0.15); position: sticky; top: 0; z-index: 100; flex-wrap: wrap; }
    .header-left { display: flex; align-items: center; gap: 12px; color: white; }
    .header-left img { width: 48px; height: 48px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.85); object-fit: cover; }
    .header-left h5 { margin: 0; font-size: 1.5rem; font-weight: 700; }
    .header-right { display: flex; align-items: center; gap: 10px; }
    .admin-badge { background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.35); color: #fff; border-radius: 999px; padding: 6px 16px; font-size: .82rem; font-weight: 600; display: flex; align-items: center; gap: 6px; }
    .btn-logout { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: #fff; border-radius: 999px; padding: 7px 16px; font-size: .82rem; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px; transition: background .2s; }
    .btn-logout:hover { background: rgba(255,255,255,.22); }

    /* ── Layout ── */
    .container-main { display: flex; min-height: calc(100vh - 84px); }
    .sidebar { width: 240px; background: #fff; padding: 22px 0; border-right: 1px solid #dde2ed; flex-shrink: 0; }
    .sidebar a { display: flex; align-items: center; gap: 10px; padding: 14px 20px; color: #475569; text-decoration: none; border-left: 4px solid transparent; border-radius: 0 10px 10px 0; margin-bottom: 8px; transition: .25s ease; }
    .sidebar a i { font-size: 1.05rem; }
    .sidebar a:hover, .sidebar a.active { background: #f2f5ff; border-left-color: #667eea; color: #2b4db4; }
    .sidebar-sep { border-top: 1px solid #eef2f8; margin: 12px 0; }
    .sidebar-sep a.active { background: #f5f0ff !important; border-left-color: #764ba2 !important; color: #5b3891 !important; }
    .main-content { flex: 1; padding: 36px 44px; }

    /* ── Stats ── */
    .stats-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(175px,1fr)); gap: 18px; margin-bottom: 30px; }
    .stat-card { background: #fff; border-radius: 16px; padding: 20px; box-shadow: 0 6px 20px rgba(0,0,0,0.07); display: flex; align-items: center; gap: 14px; }
    .stat-icon { width: 50px; height: 50px; border-radius: 13px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .stat-icon i { font-size: 1.4rem; color: #fff; }
    .si-p { background: linear-gradient(135deg,#667eea,#764ba2); }
    .si-g { background: linear-gradient(135deg,#43e97b,#38f9d7); }
    .si-o { background: linear-gradient(135deg,#fa709a,#fee140); }
    .si-b { background: linear-gradient(135deg,#4facfe,#00f2fe); }
    .stat-val { font-size: 1.9rem; font-weight: 800; color: #1f2937; line-height: 1; }
    .stat-lbl { font-size: .74rem; color: #9ca3af; margin-top: 3px; }

    /* ── Tabs ── */
    .admin-tabs { display: flex; gap: 4px; margin-bottom: 26px; border-bottom: 2px solid #dde2ed; overflow-x: auto; }
    .tab-btn { display: flex; align-items: center; gap: 7px; padding: 11px 20px; border: none; background: none; color: #6b7280; font-size: .9rem; font-weight: 600; cursor: pointer; border-bottom: 3px solid transparent; margin-bottom: -2px; border-radius: 10px 10px 0 0; transition: .2s; white-space: nowrap; }
    .tab-btn:hover { background: #f2f5ff; color: #667eea; }
    .tab-btn.active { color: #667eea; border-bottom-color: #667eea; background: #f2f5ff; }
    .tab-panel { display: none; }
    .tab-panel.active { display: block; animation: fade .22s ease; }
    @keyframes fade { from{opacity:0;transform:translateY(5px)} to{opacity:1;transform:translateY(0)} }

    /* ── Form card ── */
    .form-card { background: #fff; border-radius: 18px; padding: 24px; box-shadow: 0 8px 24px rgba(0,0,0,0.07); margin-bottom: 22px; }
    .form-card h4 { font-size: 1rem; font-weight: 700; color: #374151; margin-bottom: 18px; padding-bottom: 11px; border-bottom: 1px solid #eef2f8; display: flex; align-items: center; gap: 7px; }
    .form-card h4 i { color: #667eea; }
    .form-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(195px,1fr)); gap: 13px; }
    .fg { display: flex; flex-direction: column; gap: 5px; }
    .fg label { font-size: .77rem; font-weight: 600; color: #374151; }
    .fg input, .fg select, .fg textarea { padding: 10px 12px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: .88rem; color: #374151; background: #fafbff; outline: none; transition: border-color .2s, box-shadow .2s; font-family: inherit; }
    .fg input:focus, .fg select:focus, .fg textarea:focus { border-color: #667eea; background: #fff; box-shadow: 0 0 0 3px rgba(102,126,234,.1); }
    .form-actions { display: flex; gap: 9px; margin-top: 16px; justify-content: flex-end; }
    .btn-save { background: linear-gradient(135deg,#667eea,#764ba2); color: #fff; border: none; border-radius: 10px; padding: 10px 22px; font-size: .88rem; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px; transition: opacity .2s; }
    .btn-save:hover { opacity: .88; }
    .btn-cancel-s { background: #f1f5f9; color: #64748b; border: none; border-radius: 10px; padding: 10px 18px; font-size: .88rem; font-weight: 600; cursor: pointer; }
    .btn-cancel-s:hover { background: #e2e8f0; }

    /* ── Table ── */
    .table-card { background: #fff; border-radius: 18px; box-shadow: 0 8px 24px rgba(0,0,0,0.07); overflow: hidden; }
    .table-top { display: flex; align-items: center; justify-content: space-between; padding: 14px 18px; border-bottom: 1px solid #eef2f8; gap: 10px; flex-wrap: wrap; }
    .table-top h3 { font-size: .98rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; gap: 7px; }
    .table-top h3 i { color: #667eea; }
    .tbl-search { padding: 8px 14px; border: 1.5px solid #e2e8f0; border-radius: 999px; font-size: .84rem; outline: none; min-width: 190px; }
    .tbl-search:focus { border-color: #667eea; }
    table { width: 100%; border-collapse: collapse; }
    thead tr { background: #f8f9ff; }
    thead th { padding: 11px 15px; font-size: .71rem; font-weight: 700; text-transform: uppercase; letter-spacing: .6px; color: #6b7280; text-align: left; white-space: nowrap; }
    tbody tr { border-top: 1px solid #f1f5f9; transition: background .14s; }
    tbody tr:hover { background: #fafbff; }
    tbody td { padding: 12px 15px; font-size: .86rem; color: #374151; vertical-align: middle; }
    .no-data { text-align: center; padding: 30px; color: #9ca3af; font-style: italic; font-size: .88rem; }

    /* ── Badges ── */
    .bs { display: inline-block; border-radius: 999px; padding: 3px 11px; font-size: .72rem; font-weight: 700; white-space: nowrap; }
    .bs-dispo    { background: #d1fae5; color: #065f46; }
    .bs-emprunte { background: #fee2e2; color: #991b1b; }
    .bs-retard   { background: #fef3c7; color: #92400e; }
    .bs-rendu    { background: #e0e7ff; color: #3730a3; }
    .bs-std      { background: #f0f9ff; color: #0369a1; }
    .bs-etu      { background: #f0fdf4; color: #166534; }
    .bs-senior   { background: #fff7ed; color: #9a3412; }

    /* ── Boutons de ligne ── */
    .act { display: flex; gap: 5px; flex-wrap: nowrap; }
    .ab { border: none; border-radius: 8px; padding: 5px 10px; font-size: .75rem; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; white-space: nowrap; transition: background .14s; }
    .ab-edit   { background: #eff6ff; color: #3b82f6; }
    .ab-edit:hover   { background: #dbeafe; }
    .ab-del    { background: #fff1f2; color: #e11d48; }
    .ab-del:hover    { background: #ffe4e6; }
    .ab-return { background: #f0fdf4; color: #16a34a; }
    .ab-return:hover { background: #dcfce7; }
    .ab-warn   { background: #fff7ed; color: #ea580c; }
    .ab-warn:hover   { background: #ffedd5; }

    /* ── Modals ── */
    .overlay { position: fixed; inset: 0; background: rgba(0,0,0,.5); z-index: 400; display: none; align-items: center; justify-content: center; padding: 20px; }
    .overlay.open { display: flex; }
    .modal { background: #fff; border-radius: 20px; padding: 28px; width: 100%; max-width: 520px; box-shadow: 0 24px 60px rgba(0,0,0,.2); animation: fade .25s ease; }
    .modal h4 { font-size: 1.08rem; font-weight: 700; color: #1f2937; margin-bottom: 20px; display: flex; align-items: center; gap: 8px; }
    .modal h4 i { color: #667eea; }
    .modal-actions { display: flex; gap: 9px; justify-content: flex-end; margin-top: 20px; }
    .btn-danger { background: linear-gradient(135deg,#ef4444,#b91c1c); color: #fff; border: none; border-radius: 10px; padding: 10px 20px; font-size: .88rem; font-weight: 600; cursor: pointer; }

    /* ── Toast ── */
    .toast { position: fixed; bottom: 24px; right: 24px; background: #1f2937; color: #fff; border-radius: 14px; padding: 13px 20px; font-size: .88rem; font-weight: 500; box-shadow: 0 8px 24px rgba(0,0,0,.25); z-index: 9998; display: flex; align-items: center; gap: 9px; transform: translateY(80px); opacity: 0; transition: all .35s cubic-bezier(.34,1.56,.64,1); pointer-events: none; }
    .toast.show { transform: translateY(0); opacity: 1; }
    .ti { font-size: .95rem; }
    .toast.ok .ti { color: #43e97b; }
    .toast.err .ti { color: #f87171; }
    .toast.warn .ti { color: #fbbf24; }

    .footer { background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); color: #fff; text-align: center; padding: 22px 20px; margin-top: 36px; font-weight: 500; font-size: .9rem; }

    @media (max-width: 992px) { .container-main { flex-direction: column; } .sidebar { width: 100%; border-right: none; border-bottom: 1px solid #dde2ed; } .main-content { padding: 20px 14px; } }
  </style>
</head>
<body>

<!-- ── Mur auth ── -->
<div id="auth-wall">
  <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
    <rect width="64" height="64" rx="16" fill="url(#ag)"/>
    <path d="M32 16a10 10 0 0 1 10 10v4H22v-4a10 10 0 0 1 10-10z" fill="white" opacity=".9"/>
    <rect x="18" y="30" width="28" height="20" rx="6" fill="white"/>
    <circle cx="32" cy="41" r="3" fill="url(#ag)"/>
    <defs><linearGradient id="ag" x1="0" y1="0" x2="64" y2="64"><stop stop-color="#667eea"/><stop offset="1" stop-color="#764ba2"/></linearGradient></defs>
  </svg>
  <p>Accès non autorisé — <a href="admin_login.php">Se connecter en tant qu'administrateur</a></p>
</div>

<!-- ── Header ── -->
<header class="header-top">
  <div class="header-left">
    <img src="../img/mon-profile-img.jpg" alt="Logo" onerror="this.style.background='rgba(255,255,255,0.3)'">
    <h5>Bibliothèque Cléry</h5>
  </div>
  <div class="header-right">
    <span class="admin-badge"><i class="bi bi-shield-fill-check"></i> Administrateur</span>
    <button class="btn-logout" onclick="logout()"><i class="bi bi-box-arrow-right"></i> Déconnexion</button>
  </div>
</header>

<div class="container-main">
  <!-- Sidebar -->
  <aside class="sidebar">
    <a href="../index.php"><i class="bi bi-house"></i> Accueil</a>
    <a href="../livres/livres.php"><i class="bi bi-book"></i> Livres</a>
    <a href="../auteur/auteur.php"><i class="bi bi-person"></i> Auteurs</a>
    <a href="../accueil/accueil.php"><i class="bi bi-info-circle"></i> À propos</a>
    <a href="../contact/contact.php"><i class="bi bi-envelope"></i> Contact</a>
    <div class="sidebar-sep">
      <a href="#" class="active"><i class="bi bi-shield-lock"></i> Administration</a>
    </div>
  </aside>

  <!-- Main -->
  <main class="main-content">

    <!-- Stats -->
    <div class="stats-row">
      <div class="stat-card"><div class="stat-icon si-p"><i class="bi bi-book-fill"></i></div><div><div class="stat-val" id="st-l">0</div><div class="stat-lbl">Livres total</div></div></div>
      <div class="stat-card"><div class="stat-icon si-g"><i class="bi bi-check-circle-fill"></i></div><div><div class="stat-val" id="st-d">0</div><div class="stat-lbl">Disponibles</div></div></div>
      <div class="stat-card"><div class="stat-icon si-o"><i class="bi bi-arrow-left-right"></i></div><div><div class="stat-val" id="st-e">0</div><div class="stat-lbl">Emprunts actifs</div></div></div>
      <div class="stat-card"><div class="stat-icon si-b"><i class="bi bi-people-fill"></i></div><div><div class="stat-val" id="st-m">0</div><div class="stat-lbl">Membres</div></div></div>
    </div>

    <!-- Tabs -->
    <div class="admin-tabs">
      <button class="tab-btn active" onclick="switchTab('livres',this)"><i class="bi bi-book"></i> Livres</button>
      <button class="tab-btn" onclick="switchTab('auteurs',this)"><i class="bi bi-person"></i> Auteurs</button>
      <button class="tab-btn" onclick="switchTab('emprunts',this)"><i class="bi bi-arrow-left-right"></i> Emprunts</button>
      <button class="tab-btn" onclick="switchTab('membres',this)"><i class="bi bi-people"></i> Membres</button>
    </div>

    <!-- ═══ LIVRES ═══ -->
    <div class="tab-panel active" id="panel-livres">
      <div class="form-card">
        <h4><i class="bi bi-plus-circle-fill"></i> Ajouter un livre</h4>
        <div class="form-row">
          <div class="fg"><label>Titre *</label><input id="l-titre" placeholder="Ex : Les Misérables"></div>
          <div class="fg"><label>Auteur *</label><input id="l-auteur" placeholder="Ex : Victor Hugo"></div>
          <div class="fg"><label>Genre</label>
            <select id="l-genre"><option value="">--</option><option>Roman</option><option>Classique</option><option>Théâtre</option><option>Policier</option><option>Philosophie</option><option>Poésie</option><option>Autre</option></select>
          </div>
          <div class="fg"><label>Année</label><input type="number" id="l-annee" placeholder="1862"></div>
          <div class="fg"><label>ISBN</label><input id="l-isbn" placeholder="978-..."></div>
          <div class="fg"><label>Exemplaires</label><input type="number" id="l-ex" value="1" min="1"></div>
        </div>
        <div class="form-actions">
          <button class="btn-cancel-s" onclick="raz(['l-titre','l-auteur','l-genre','l-annee','l-isbn']);g('l-ex').value=1">Annuler</button>
          <button class="btn-save" onclick="livreAdd()"><i class="bi bi-floppy"></i> Enregistrer</button>
        </div>
      </div>
      <div class="table-card">
        <div class="table-top">
          <h3><i class="bi bi-book"></i> Liste des livres</h3>
          <input class="tbl-search" placeholder="Rechercher..." oninput="filterTbl(this,'tb-l')">
        </div>
        <table><thead><tr><th>#</th><th>Titre</th><th>Auteur</th><th>Genre</th><th>Année</th><th>Exemplaires</th><th>Dispo</th><th>Statut</th><th>Actions</th></tr></thead>
        <tbody id="tb-l"></tbody></table>
      </div>
    </div>

    <!-- ═══ AUTEURS ═══ -->
    <div class="tab-panel" id="panel-auteurs">
      <div class="form-card">
        <h4><i class="bi bi-person-plus-fill"></i> Ajouter un auteur</h4>
        <div class="form-row">
          <div class="fg"><label>Nom complet *</label><input id="a-nom" placeholder="Ex : Victor Hugo"></div>
          <div class="fg"><label>Nationalité</label><input id="a-nat" placeholder="Ex : Français"></div>
          <div class="fg"><label>Naissance</label><input type="number" id="a-naiss" placeholder="1802"></div>
          <div class="fg"><label>Décès</label><input type="number" id="a-deces" placeholder="Laisser vide si vivant"></div>
          <div class="fg" style="grid-column:1/-1"><label>Biographie</label><textarea id="a-bio" rows="2" placeholder="Quelques lignes..."></textarea></div>
        </div>
        <div class="form-actions">
          <button class="btn-cancel-s" onclick="raz(['a-nom','a-nat','a-naiss','a-deces','a-bio'])">Annuler</button>
          <button class="btn-save" onclick="auteurAdd()"><i class="bi bi-floppy"></i> Enregistrer</button>
        </div>
      </div>
      <div class="table-card">
        <div class="table-top">
          <h3><i class="bi bi-person"></i> Liste des auteurs</h3>
          <input class="tbl-search" placeholder="Rechercher..." oninput="filterTbl(this,'tb-a')">
        </div>
        <table><thead><tr><th>#</th><th>Nom</th><th>Nationalité</th><th>Naissance</th><th>Décès</th><th>Livres</th><th>Actions</th></tr></thead>
        <tbody id="tb-a"></tbody></table>
      </div>
    </div>

    <!-- ═══ EMPRUNTS ═══ -->
    <div class="tab-panel" id="panel-emprunts">
      <div class="form-card">
        <h4><i class="bi bi-arrow-left-right"></i> Enregistrer un emprunt</h4>
        <div class="form-row">
          <div class="fg"><label>Membre *</label><select id="e-mbr"><option value="">-- Choisir --</option></select></div>
          <div class="fg"><label>Livre disponible *</label><select id="e-liv"><option value="">-- Choisir --</option></select></div>
          <div class="fg"><label>Date d'emprunt *</label><input type="date" id="e-deb"></div>
          <div class="fg"><label>Retour prévu *</label><input type="date" id="e-fin"></div>
        </div>
        <div class="form-actions">
          <button class="btn-cancel-s" onclick="g('e-mbr').value='';g('e-liv').value='';raz(['e-deb','e-fin'])">Annuler</button>
          <button class="btn-save" onclick="empruntAdd()"><i class="bi bi-floppy"></i> Enregistrer l'emprunt</button>
        </div>
      </div>
      <div class="table-card">
        <div class="table-top">
          <h3><i class="bi bi-arrow-left-right"></i> Emprunts en cours &amp; historique</h3>
          <input class="tbl-search" placeholder="Rechercher..." oninput="filterTbl(this,'tb-e')">
        </div>
        <table><thead><tr><th>#</th><th>Membre</th><th>Livre</th><th>Emprunt</th><th>Retour prévu</th><th>Retour réel</th><th>Statut</th><th>Actions</th></tr></thead>
        <tbody id="tb-e"></tbody></table>
      </div>
    </div>

    <!-- ═══ MEMBRES ═══ -->
    <div class="tab-panel" id="panel-membres">
      <div class="form-card">
        <h4><i class="bi bi-person-badge-fill"></i> Inscrire un membre</h4>
        <div class="form-row">
          <div class="fg"><label>Prénom *</label><input id="m-pre" placeholder="Marie"></div>
          <div class="fg"><label>Nom *</label><input id="m-nom" placeholder="Dupont"></div>
          <div class="fg"><label>Email *</label><input type="email" id="m-email" placeholder="marie@mail.fr"></div>
          <div class="fg"><label>Téléphone</label><input type="tel" id="m-tel" placeholder="06 12 34 56 78"></div>
          <div class="fg"><label>Date inscription</label><input type="date" id="m-date"></div>
          <div class="fg"><label>Type de carte</label>
            <select id="m-type"><option>Standard</option><option>Étudiant</option><option>Senior</option></select>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn-cancel-s" onclick="raz(['m-pre','m-nom','m-email','m-tel'])">Annuler</button>
          <button class="btn-save" onclick="membreAdd()"><i class="bi bi-floppy"></i> Inscrire</button>
        </div>
      </div>
      <div class="table-card">
        <div class="table-top">
          <h3><i class="bi bi-people"></i> Liste des membres</h3>
          <input class="tbl-search" placeholder="Rechercher..." oninput="filterTbl(this,'tb-m')">
        </div>
        <table><thead><tr><th>#</th><th>Nom complet</th><th>Email</th><th>Téléphone</th><th>Carte</th><th>Emprunts actifs</th><th>Actions</th></tr></thead>
        <tbody id="tb-m"></tbody></table>
      </div>
    </div>

  </main>
</div>

<!-- ══ MODALS EDIT ══ -->
<!-- Edit Livre -->
<div class="overlay" id="ovl-el">
  <div class="modal">
    <h4><i class="bi bi-pencil-fill"></i> Modifier le livre</h4>
    <div class="form-row">
      <div class="fg"><label>Titre *</label><input id="el-titre"></div>
      <div class="fg"><label>Auteur *</label><input id="el-auteur"></div>
      <div class="fg"><label>Genre</label><select id="el-genre"><option value="">--</option><option>Roman</option><option>Classique</option><option>Théâtre</option><option>Policier</option><option>Philosophie</option><option>Poésie</option><option>Autre</option></select></div>
      <div class="fg"><label>Année</label><input type="number" id="el-annee"></div>
      <div class="fg"><label>ISBN</label><input id="el-isbn"></div>
      <div class="fg"><label>Exemplaires</label><input type="number" id="el-ex" min="1"></div>
    </div>
    <div class="modal-actions">
      <button class="btn-cancel-s" onclick="closeOvl('ovl-el')">Annuler</button>
      <button class="btn-save" onclick="livreSave()"><i class="bi bi-floppy"></i> Sauvegarder</button>
    </div>
  </div>
</div>

<!-- Edit Auteur -->
<div class="overlay" id="ovl-ea">
  <div class="modal">
    <h4><i class="bi bi-pencil-fill"></i> Modifier l'auteur</h4>
    <div class="form-row">
      <div class="fg"><label>Nom *</label><input id="ea-nom"></div>
      <div class="fg"><label>Nationalité</label><input id="ea-nat"></div>
      <div class="fg"><label>Naissance</label><input type="number" id="ea-naiss"></div>
      <div class="fg"><label>Décès</label><input type="number" id="ea-deces"></div>
      <div class="fg" style="grid-column:1/-1"><label>Bio</label><textarea id="ea-bio" rows="2"></textarea></div>
    </div>
    <div class="modal-actions">
      <button class="btn-cancel-s" onclick="closeOvl('ovl-ea')">Annuler</button>
      <button class="btn-save" onclick="auteurSave()"><i class="bi bi-floppy"></i> Sauvegarder</button>
    </div>
  </div>
</div>

<!-- Edit Membre -->
<div class="overlay" id="ovl-em">
  <div class="modal">
    <h4><i class="bi bi-pencil-fill"></i> Modifier le membre</h4>
    <div class="form-row">
      <div class="fg"><label>Prénom *</label><input id="em-pre"></div>
      <div class="fg"><label>Nom *</label><input id="em-nom"></div>
      <div class="fg"><label>Email *</label><input type="email" id="em-email"></div>
      <div class="fg"><label>Téléphone</label><input id="em-tel"></div>
      <div class="fg"><label>Carte</label><select id="em-type"><option>Standard</option><option>Étudiant</option><option>Senior</option></select></div>
    </div>
    <div class="modal-actions">
      <button class="btn-cancel-s" onclick="closeOvl('ovl-em')">Annuler</button>
      <button class="btn-save" onclick="membreSave()"><i class="bi bi-floppy"></i> Sauvegarder</button>
    </div>
  </div>
</div>

<!-- Confirm Delete -->
<div class="overlay" id="ovl-del">
  <div class="modal" style="max-width:400px">
    <h4><i class="bi bi-exclamation-triangle-fill" style="color:#f59e0b"></i> Confirmer la suppression</h4>
    <p style="color:#6b7280;font-size:.88rem;line-height:1.6">Cette action est irréversible. Supprimer cet élément ?</p>
    <div class="modal-actions">
      <button class="btn-cancel-s" onclick="closeOvl('ovl-del')">Annuler</button>
      <button class="btn-danger" onclick="doDelete()">Supprimer</button>
    </div>
  </div>
</div>

<!-- Confirm Retour -->
<div class="overlay" id="ovl-ret">
  <div class="modal" style="max-width:420px">
    <h4><i class="bi bi-check-circle-fill" style="color:#16a34a"></i> Confirmer le retour</h4>
    <p style="color:#6b7280;font-size:.88rem;line-height:1.65" id="ret-msg"></p>
    <div class="modal-actions">
      <button class="btn-cancel-s" onclick="closeOvl('ovl-ret')">Annuler</button>
      <button class="btn-save" onclick="doRetour()"><i class="bi bi-check2-circle"></i> Confirmer</button>
    </div>
  </div>
</div>

<!-- Toast -->
<div class="toast" id="toast">
  <i class="bi ti" id="ti"></i>
  <span id="tmsg"></span>
</div>

<footer class="footer">&copy; 2026 Bibliothèque Cléry — Espace Administration</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ══════════════ AUTH ══════════════
(function() {
  if (sessionStorage.getItem('clery_admin') !== 'true') {
    document.getElementById('auth-wall').classList.remove('hidden');
    ['header-top','container-main','footer'].forEach(c => {
      const el = document.querySelector('.' + c) || document.querySelector(c);
      if (el) el.style.display = 'none';
    });
    document.querySelector('header').style.display = 'none';
    document.querySelector('.container-main').style.display = 'none';
    document.querySelector('footer').style.display = 'none';
  } else {
    document.getElementById('auth-wall').classList.add('hidden');
  }
})();

function logout() {
  sessionStorage.removeItem('clery_admin');
  sessionStorage.removeItem('clery_admin_ts');
  window.location.href = 'admin_login.php';
}

// ══════════════ DATA ══════════════
let livres = [
  {id:1,titre:"Ta deuxième vie commence...",auteur:"Raphaëlle Giordano",genre:"Roman",annee:2015,isbn:"978-2-7440-6816-0",ex:2,dispo:2},
  {id:2,titre:"Les Misérables",auteur:"Victor Hugo",genre:"Classique",annee:1862,isbn:"978-2-07-040850-4",ex:3,dispo:2},
  {id:3,titre:"Roméo et Juliette",auteur:"William Shakespeare",genre:"Théâtre",annee:1597,isbn:"978-2-07-036822-8",ex:1,dispo:1},
  {id:4,titre:"L'Étranger",auteur:"Albert Camus",genre:"Roman",annee:1942,isbn:"978-2-07-036024-6",ex:2,dispo:1},
  {id:5,titre:"Le Petit Prince",auteur:"Antoine de Saint-Exupéry",genre:"Roman",annee:1943,isbn:"978-2-07-040850-4",ex:4,dispo:4},
];
let auteurs = [
  {id:1,nom:"Victor Hugo",nat:"Français",naiss:1802,deces:1885,bio:"Chef de file du romantisme français."},
  {id:2,nom:"Albert Camus",nat:"Français",naiss:1913,deces:1960,bio:"Prix Nobel de littérature 1957."},
  {id:3,nom:"William Shakespeare",nat:"Anglais",naiss:1564,deces:1616,bio:"Plus grand dramaturge de tous les temps."},
  {id:4,nom:"Raphaëlle Giordano",nat:"Française",naiss:1974,deces:null,bio:"Auteure de romans de développement personnel."},
];
let membres = [
  {id:1,pre:"Marie",nom:"Dupont",email:"marie.dupont@mail.fr",tel:"06 12 34 56 78",type:"Standard",date:"2025-09-01"},
  {id:2,pre:"Julien",nom:"Martin",email:"j.martin@mail.fr",tel:"07 98 76 54 32",type:"Étudiant",date:"2025-10-15"},
  {id:3,pre:"Sophie",nom:"Bernard",email:"s.bernard@mail.fr",tel:"06 55 44 33 22",type:"Standard",date:"2026-01-10"},
];
let emprunts = [
  {id:1,mId:1,lId:2,deb:"2026-05-02",fin:"2026-05-16",retour:null,statut:"en_cours"},
  {id:2,mId:2,lId:4,deb:"2026-04-25",fin:"2026-05-09",retour:null,statut:"retard"},
  {id:3,mId:3,lId:5,deb:"2026-04-01",fin:"2026-04-15",retour:"2026-04-14",statut:"rendu"},
];
let cL=6,cA=5,cE=4,cM=4,editId=null,pendDel=null,pendRet=null;

// ══════════════ UTILS ══════════════
const g = id => document.getElementById(id);
const val = id => g(id).value.trim();
function raz(ids) { ids.forEach(id => { if(g(id)) g(id).value=''; }); }
function fmtDate(s) { return s ? s.split('-').reverse().join('/') : '—'; }
function isRetard(fin) { return fin && new Date(fin) < new Date() && new Date(fin).toDateString() !== new Date().toDateString(); }
function filterTbl(inp,tbId) { const q=inp.value.toLowerCase(); document.querySelectorAll(`#${tbId} tr`).forEach(r=>r.style.display=r.textContent.toLowerCase().includes(q)?'':'none'); }
function openOvl(id) { g(id).classList.add('open'); }
function closeOvl(id) { g(id).classList.remove('open'); editId=null; }
document.querySelectorAll('.overlay').forEach(o=>o.addEventListener('click',e=>{if(e.target===o){o.classList.remove('open');editId=null;}}));

function switchTab(name,btn) {
  document.querySelectorAll('.tab-panel').forEach(p=>p.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
  g('panel-'+name).classList.add('active'); btn.classList.add('active');
}

function toast(msg,type='ok') {
  const t=g('toast');
  const icons={ok:'bi-check-circle-fill',err:'bi-x-circle-fill',warn:'bi-exclamation-triangle-fill'};
  t.className='toast '+type;
  g('ti').className='bi ti '+icons[type];
  g('tmsg').textContent=msg;
  t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'),3200);
}

function updateStats() {
  g('st-l').textContent=livres.length;
  g('st-d').textContent=livres.reduce((s,l)=>s+(l.dispo||0),0);
  g('st-e').textContent=emprunts.filter(e=>e.statut==='en_cours'||e.statut==='retard').length;
  g('st-m').textContent=membres.length;
}

// ══════════════ LIVRES ══════════════
function renderLivres() {
  const tb=g('tb-l');
  tb.innerHTML = livres.length ? livres.map(l=>`
    <tr>
      <td>${l.id}</td><td><strong>${l.titre}</strong></td><td>${l.auteur}</td>
      <td>${l.genre||'—'}</td><td>${l.annee||'—'}</td><td>${l.ex}</td><td>${l.dispo}</td>
      <td><span class="bs ${l.dispo>0?'bs-dispo':'bs-emprunte'}">${l.dispo>0?'Disponible':'Emprunté'}</span></td>
      <td class="act">
        <button class="ab ab-edit" onclick="livreEdit(${l.id})"><i class="bi bi-pencil"></i> Éditer</button>
        <button class="ab ab-del" onclick="askDel('livre',${l.id})"><i class="bi bi-trash"></i></button>
      </td>
    </tr>`).join('') : `<tr><td colspan="9" class="no-data">Aucun livre.</td></tr>`;
  refreshLivreSelect();
}

function livreAdd() {
  const t=val('l-titre'),a=val('l-auteur');
  if(!t||!a){toast('Titre et auteur obligatoires.','err');return;}
  const ex=parseInt(g('l-ex').value)||1;
  livres.push({id:cL++,titre:t,auteur:a,genre:val('l-genre'),annee:parseInt(val('l-annee'))||null,isbn:val('l-isbn'),ex,dispo:ex});
  raz(['l-titre','l-auteur','l-genre','l-annee','l-isbn']); g('l-ex').value=1;
  renderLivres(); updateStats(); toast('Livre ajouté !');
}

function livreEdit(id) {
  const l=livres.find(x=>x.id===id); if(!l)return;
  editId=id;
  g('el-titre').value=l.titre; g('el-auteur').value=l.auteur; g('el-genre').value=l.genre||'';
  g('el-annee').value=l.annee||''; g('el-isbn').value=l.isbn||''; g('el-ex').value=l.ex;
  openOvl('ovl-el');
}

function livreSave() {
  const l=livres.find(x=>x.id===editId); if(!l)return;
  const t=val('el-titre'),a=val('el-auteur');
  if(!t||!a){toast('Titre et auteur obligatoires.','err');return;}
  const newEx=parseInt(g('el-ex').value)||1, diff=newEx-l.ex;
  l.titre=t; l.auteur=a; l.genre=val('el-genre'); l.annee=parseInt(val('el-annee'))||null;
  l.isbn=val('el-isbn'); l.ex=newEx; l.dispo=Math.max(0,l.dispo+diff);
  closeOvl('ovl-el'); renderLivres(); updateStats(); toast('Livre modifié !');
}

function refreshLivreSelect() {
  const sel=g('e-liv'); const cur=sel.value;
  sel.innerHTML='<option value="">-- Choisir --</option>';
  livres.filter(l=>l.dispo>0).forEach(l=>{
    const o=document.createElement('option');
    o.value=l.id; o.textContent=`${l.titre} (${l.dispo} dispo)`;
    sel.appendChild(o);
  });
  if(cur) sel.value=cur;
}

// ══════════════ AUTEURS ══════════════
function renderAuteurs() {
  const tb=g('tb-a');
  tb.innerHTML = auteurs.length ? auteurs.map(a=>{
    const nb=livres.filter(l=>l.auteur.toLowerCase().includes(a.nom.split(' ').pop().toLowerCase())).length;
    return `<tr>
      <td>${a.id}</td><td><strong>${a.nom}</strong></td><td>${a.nat||'—'}</td>
      <td>${a.naiss||'—'}</td><td>${a.deces||'—'}</td><td>${nb}</td>
      <td class="act">
        <button class="ab ab-edit" onclick="auteurEdit(${a.id})"><i class="bi bi-pencil"></i> Éditer</button>
        <button class="ab ab-del" onclick="askDel('auteur',${a.id})"><i class="bi bi-trash"></i></button>
      </td>
    </tr>`;}).join('') : `<tr><td colspan="7" class="no-data">Aucun auteur.</td></tr>`;
}

function auteurAdd() {
  const n=val('a-nom'); if(!n){toast('Nom obligatoire.','err');return;}
  auteurs.push({id:cA++,nom:n,nat:val('a-nat'),naiss:parseInt(val('a-naiss'))||null,deces:parseInt(val('a-deces'))||null,bio:val('a-bio')});
  raz(['a-nom','a-nat','a-naiss','a-deces','a-bio']);
  renderAuteurs(); toast('Auteur ajouté !');
}

function auteurEdit(id) {
  const a=auteurs.find(x=>x.id===id); if(!a)return;
  editId=id;
  g('ea-nom').value=a.nom; g('ea-nat').value=a.nat||'';
  g('ea-naiss').value=a.naiss||''; g('ea-deces').value=a.deces||''; g('ea-bio').value=a.bio||'';
  openOvl('ovl-ea');
}

function auteurSave() {
  const a=auteurs.find(x=>x.id===editId); if(!a)return;
  const n=val('ea-nom'); if(!n){toast('Nom obligatoire.','err');return;}
  a.nom=n; a.nat=val('ea-nat'); a.naiss=parseInt(val('ea-naiss'))||null;
  a.deces=parseInt(val('ea-deces'))||null; a.bio=val('ea-bio');
  closeOvl('ovl-ea'); renderAuteurs(); toast('Auteur modifié !');
}

// ══════════════ MEMBRES ══════════════
function renderMembres() {
  const tb=g('tb-m');
  tb.innerHTML = membres.length ? membres.map(m=>{
    const actifs=emprunts.filter(e=>e.mId===m.id&&(e.statut==='en_cours'||e.statut==='retard')).length;
    const cls=m.type==='Étudiant'?'bs-etu':m.type==='Senior'?'bs-senior':'bs-std';
    return `<tr>
      <td>${m.id}</td><td><strong>${m.pre} ${m.nom}</strong></td><td>${m.email}</td>
      <td>${m.tel||'—'}</td><td><span class="bs ${cls}">${m.type}</span></td><td>${actifs}</td>
      <td class="act">
        <button class="ab ab-edit" onclick="membreEdit(${m.id})"><i class="bi bi-pencil"></i> Éditer</button>
        <button class="ab ab-del" onclick="askDel('membre',${m.id})"><i class="bi bi-trash"></i></button>
      </td>
    </tr>`;}).join('') : `<tr><td colspan="7" class="no-data">Aucun membre.</td></tr>`;
  refreshMembreSelect();
}

function membreAdd() {
  const p=val('m-pre'),n=val('m-nom'),e=val('m-email');
  if(!p||!n||!e){toast('Prénom, nom et email obligatoires.','err');return;}
  membres.push({id:cM++,pre:p,nom:n,email:e,tel:val('m-tel'),type:g('m-type').value,date:val('m-date')});
  raz(['m-pre','m-nom','m-email','m-tel']);
  renderMembres(); updateStats(); toast('Membre inscrit !');
}

function membreEdit(id) {
  const m=membres.find(x=>x.id===id); if(!m)return;
  editId=id;
  g('em-pre').value=m.pre; g('em-nom').value=m.nom; g('em-email').value=m.email;
  g('em-tel').value=m.tel||''; g('em-type').value=m.type;
  openOvl('ovl-em');
}

function membreSave() {
  const m=membres.find(x=>x.id===editId); if(!m)return;
  const p=val('em-pre'),n=val('em-nom'),e=val('em-email');
  if(!p||!n||!e){toast('Champs obligatoires manquants.','err');return;}
  m.pre=p; m.nom=n; m.email=e; m.tel=val('em-tel'); m.type=g('em-type').value;
  closeOvl('ovl-em'); renderMembres(); toast('Membre modifié !');
}

function refreshMembreSelect() {
  const sel=g('e-mbr'); const cur=sel.value;
  sel.innerHTML='<option value="">-- Choisir --</option>';
  membres.forEach(m=>{
    const o=document.createElement('option');
    o.value=m.id; o.textContent=`${m.pre} ${m.nom}`;
    sel.appendChild(o);
  });
  if(cur) sel.value=cur;
}

// ══════════════ EMPRUNTS ══════════════
function renderEmprunts() {
  // Mise à jour retards auto
  emprunts.forEach(e=>{ if(e.statut==='en_cours'&&isRetard(e.fin)) e.statut='retard'; });
  const tb=g('tb-e');
  tb.innerHTML = emprunts.length ? emprunts.map(e=>{
    const m=membres.find(x=>x.id===e.mId);
    const l=livres.find(x=>x.id===e.lId);
    const mn=m?`${m.pre} ${m.nom}`:`Membre #${e.mId}`;
    const ln=l?l.titre:`Livre #${e.lId}`;
    const bsCls={en_cours:'bs-emprunte',retard:'bs-retard',rendu:'bs-rendu'}[e.statut];
    const bsTxt={en_cours:'En cours',retard:'En retard',rendu:'Rendu'}[e.statut];
    let acts='';
    if(e.statut==='en_cours'||e.statut==='retard') {
      acts=`<button class="ab ab-return" onclick="askRetour(${e.id})"><i class="bi bi-check2-circle"></i> Retour</button>`;
      if(e.statut==='retard') acts+=`<button class="ab ab-warn" onclick="relancer(${e.id})"><i class="bi bi-bell"></i> Relancer</button>`;
    } else {
      acts=`<button class="ab ab-del" onclick="askDel('emprunt',${e.id})"><i class="bi bi-trash"></i></button>`;
    }
    return `<tr>
      <td>${e.id}</td><td>${mn}</td><td>${ln}</td>
      <td>${fmtDate(e.deb)}</td><td>${fmtDate(e.fin)}</td><td>${fmtDate(e.retour)}</td>
      <td><span class="bs ${bsCls}">${bsTxt}</span></td>
      <td class="act">${acts}</td>
    </tr>`;}).join('') : `<tr><td colspan="8" class="no-data">Aucun emprunt.</td></tr>`;
}

function empruntAdd() {
  const mId=parseInt(g('e-mbr').value), lId=parseInt(g('e-liv').value);
  const deb=val('e-deb'), fin=val('e-fin');
  if(!mId||!lId||!deb||!fin){toast('Tous les champs sont requis.','err');return;}
  if(fin<=deb){toast('La date de retour doit être après l\'emprunt.','err');return;}
  const livre=livres.find(l=>l.id===lId);
  if(!livre||livre.dispo<=0){toast('Livre non disponible.','err');return;}
  livre.dispo--;
  emprunts.push({id:cE++,mId,lId,deb,fin,retour:null,statut:'en_cours'});
  g('e-mbr').value=''; g('e-liv').value=''; raz(['e-deb','e-fin']);
  // Réinitialise date retour J+14
  const f=new Date(); f.setDate(f.getDate()+14); g('e-fin').valueAsDate=f;
  renderEmprunts(); renderLivres(); renderMembres(); updateStats();
  toast('Emprunt enregistré !');
}

function askRetour(id) {
  const e=emprunts.find(x=>x.id===id); if(!e)return;
  const m=membres.find(x=>x.id===e.mId);
  const l=livres.find(x=>x.id===e.lId);
  pendRet=id;
  g('ret-msg').textContent=`Confirmer le retour de "${l?l.titre:'ce livre'}" par ${m?m.pre+' '+m.nom:'ce membre'} ?`;
  openOvl('ovl-ret');
}

function doRetour() {
  const e=emprunts.find(x=>x.id===pendRet); if(!e)return;
  e.statut='rendu'; e.retour=new Date().toISOString().split('T')[0];
  const l=livres.find(x=>x.id===e.lId); if(l) l.dispo++;
  closeOvl('ovl-ret'); pendRet=null;
  renderEmprunts(); renderLivres(); renderMembres(); updateStats();
  toast('Retour enregistré ! Livre de nouveau disponible.');
}

function relancer(id) {
  const e=emprunts.find(x=>x.id===id); if(!e)return;
  const m=membres.find(x=>x.id===e.mId);
  const l=livres.find(x=>x.id===e.lId);
  toast(`Relance envoyée à ${m?m.pre+' '+m.nom:'ce membre'} pour "${l?l.titre:'ce livre'}".`,'warn');
}

// ══════════════ SUPPRESSION ══════════════
function askDel(type,id) { pendDel={type,id}; openOvl('ovl-del'); }

function doDelete() {
  if(!pendDel)return;
  const {type,id}=pendDel;
  if(type==='livre') {
    const actif=emprunts.some(e=>e.lId===id&&(e.statut==='en_cours'||e.statut==='retard'));
    if(actif){closeOvl('ovl-del');toast('Impossible : livre actuellement emprunté.','err');return;}
    livres=livres.filter(l=>l.id!==id);
    renderLivres(); updateStats();
  } else if(type==='auteur') {
    auteurs=auteurs.filter(a=>a.id!==id);
    renderAuteurs();
  } else if(type==='membre') {
    const actif=emprunts.some(e=>e.mId===id&&(e.statut==='en_cours'||e.statut==='retard'));
    if(actif){closeOvl('ovl-del');toast('Impossible : membre avec emprunts actifs.','err');return;}
    membres=membres.filter(m=>m.id!==id);
    renderMembres(); updateStats();
  } else if(type==='emprunt') {
    emprunts=emprunts.filter(e=>e.id!==id);
    renderEmprunts();
  }
  closeOvl('ovl-del'); pendDel=null; toast('Élément supprimé.');
}

// ══════════════ INIT ══════════════
g('e-deb').valueAsDate=new Date();
const fin14=new Date(); fin14.setDate(fin14.getDate()+14); g('e-fin').valueAsDate=fin14;
g('m-date').valueAsDate=new Date();
renderLivres(); renderAuteurs(); renderMembres(); renderEmprunts(); updateStats();
</script>
</body>
</html>
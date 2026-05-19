<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bibliothèque Cléry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; background: #eef2f8; color: #333; }
<<<<<<< HEAD

    /* ── Header ── */
    .header-top { display: flex; justify-content: space-between; align-items: center; gap: 15px; padding: 18px 30px; background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); box-shadow: 0 4px 16px rgba(0,0,0,0.15); position: sticky; top: 0; z-index: 10; flex-wrap: wrap; }
    .header-left { display: flex; align-items: center; gap: 12px; color: white; }
    .header-left img { width: 48px; height: 48px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.85); object-fit: cover; }
    .header-left h5 { margin: 0; font-size: 1.5rem; font-weight: 700; }
    .header-right { display: flex; align-items: center; gap: 10px; }
    .search-bar { flex: 1; max-width: 360px; }
    .search-bar input { width: 100%; padding: 11px 18px; border-radius: 999px; border: none; background: #fff; color: #333; box-shadow: 0 10px 22px rgba(0,0,0,0.08); }
    .search-bar input::placeholder { color: #999; }
    /* User pill in header */
    .user-pill { display: flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); border-radius: 999px; padding: 6px 14px; color: #fff; font-size: .84rem; font-weight: 600; cursor: pointer; transition: background .2s; }
    .user-pill:hover { background: rgba(255,255,255,0.25); }
    .user-pill i { font-size: 1rem; }
    .btn-connexion { background: rgba(255,255,255,0.95); color: #667eea; border: none; border-radius: 999px; padding: 8px 18px; font-size: .84rem; font-weight: 700; cursor: pointer; transition: .2s; box-shadow: 0 3px 12px rgba(0,0,0,0.1); }
    .btn-connexion:hover { background: #fff; box-shadow: 0 5px 16px rgba(0,0,0,0.15); }

    /* ── Layout ── */
=======
    .header-top { display: flex; justify-content: space-between; align-items: center; gap: 15px; padding: 18px 30px; background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); box-shadow: 0 4px 16px rgba(0,0,0,0.15); position: sticky; top: 0; z-index: 100; flex-wrap: wrap; }
    .header-left { display: flex; align-items: center; gap: 12px; color: white; }
    .header-left img { width: 48px; height: 48px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.85); object-fit: cover; }
    .header-left h5 { margin: 0; font-size: 1.5rem; font-weight: 700; }
    .search-bar { flex: 1; max-width: 360px; }
    .search-bar input { width: 100%; padding: 11px 18px; border-radius: 999px; border: none; background: #fff; color: #333; box-shadow: 0 10px 22px rgba(0,0,0,0.08); }
    .search-bar input::placeholder { color: #999; }
>>>>>>> ed21f9efeea47cad5f04f8126b5062291c4379e8
    .container-main { display: flex; min-height: calc(100vh - 84px); }
    .sidebar { width: 240px; background: #fff; padding: 22px 0; border-right: 1px solid #dde2ed; flex-shrink: 0; }
    .sidebar a { display: flex; align-items: center; gap: 10px; padding: 14px 20px; color: #475569; text-decoration: none; border-left: 4px solid transparent; border-radius: 0 10px 10px 0; margin-bottom: 8px; transition: .25s ease; }
    .sidebar a i { font-size: 1.05rem; }
    .sidebar a:hover, .sidebar a.active { background: #f2f5ff; border-left-color: #667eea; color: #2b4db4; }
    .main-content { flex: 1; padding: 40px 48px; }
    .main-content h2 { font-size: 2.4rem; text-align: center; margin-bottom: 24px; color: #1f2937; }
    .hero img { width: 100%; height: 460px; object-fit: cover; border-radius: 18px; box-shadow: 0 14px 34px rgba(0,0,0,0.14); margin-bottom: 40px; }
    .books-section h3 { font-size: 1.75rem; text-align: center; margin-bottom: 32px; color: #1f2937; }
    .books-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 28px; }
    .book-card { background: #fff; border-radius: 18px; overflow: hidden; box-shadow: 0 10px 28px rgba(0,0,0,0.09); transition: transform .3s ease, box-shadow .3s ease; }
    .book-card:hover { transform: translateY(-6px); box-shadow: 0 16px 34px rgba(0,0,0,0.16); }
    .book-card img { width: 100%; height: 260px; object-fit: cover; }
    .book-info { padding: 18px; }
    .book-info h4 { margin: 0 0 8px; font-size: 1.05rem; color: #111827; }
    .book-info p { margin: 4px 0 0; font-size: .95rem; color: #52606d; }
    .footer { background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); color: #fff; text-align: center; padding: 24px 20px; margin-top: 36px; font-weight: 500; }
<<<<<<< HEAD

    /* ══════════════════════════════════════
       MODALE CONNEXION / INSCRIPTION
    ══════════════════════════════════════ */
    .modal-bg {
      position: fixed; inset: 0; z-index: 1000;
      background: rgba(10,12,20,0.65);
      backdrop-filter: blur(6px);
      display: flex; align-items: center; justify-content: center;
      padding: 20px;
      animation: bg-in .3s ease;
    }
    @keyframes bg-in { from{opacity:0} to{opacity:1} }
    .modal-bg.hidden { display: none; }

    .auth-modal {
      background: #fff;
      border-radius: 24px;
      width: 100%; max-width: 440px;
      box-shadow: 0 32px 80px rgba(0,0,0,0.25);
      overflow: hidden;
      animation: modal-in .4s cubic-bezier(.34,1.56,.64,1);
      position: relative;
    }
    @keyframes modal-in { from{opacity:0;transform:translateY(30px) scale(.95)} to{opacity:1;transform:translateY(0) scale(1)} }

    /* Header modale */
    .modal-head {
      background: linear-gradient(135deg,#667eea,#764ba2);
      padding: 28px 28px 22px;
      text-align: center; position: relative;
    }
    .modal-head h3 { color: #fff; font-size: 1.5rem; font-weight: 700; margin-bottom: 4px; }
    .modal-head p { color: rgba(255,255,255,.8); font-size: .88rem; }
    .modal-head .logo-circle {
      width: 60px; height: 60px; border-radius: 50%;
      background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,.5);
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 14px; font-size: 1.7rem; color: #fff;
    }

    /* Bouton fermer */
    .btn-close-modal {
      position: absolute; top: 14px; right: 14px;
      width: 34px; height: 34px; border-radius: 50%;
      background: rgba(255,255,255,0.2); border: none; color: #fff;
      font-size: 1rem; cursor: pointer; display: flex; align-items: center; justify-content: center;
      transition: background .2s;
    }
    .btn-close-modal:hover { background: rgba(255,255,255,0.35); }

    /* Tabs login/register */
    .auth-tabs { display: flex; border-bottom: 1px solid #eef2f8; }
    .auth-tab { flex: 1; padding: 14px; background: none; border: none; font-size: .92rem; font-weight: 600; color: #9ca3af; cursor: pointer; border-bottom: 3px solid transparent; transition: .2s; }
    .auth-tab.active { color: #667eea; border-bottom-color: #667eea; background: #fafbff; }

    /* Corps modale */
    .modal-body { padding: 24px 28px 28px; }
    .auth-panel { display: none; }
    .auth-panel.active { display: block; animation: fadein .2s ease; }
    @keyframes fadein { from{opacity:0;transform:translateY(6px)} to{opacity:1;transform:translateY(0)} }

    .fg { display: flex; flex-direction: column; gap: 5px; margin-bottom: 14px; }
    .fg label { font-size: .78rem; font-weight: 600; color: #374151; letter-spacing: .3px; }
    .fg input { padding: 11px 14px; border: 1.5px solid #e2e8f0; border-radius: 10px; font-size: .9rem; color: #374151; background: #fafbff; outline: none; transition: border-color .2s, box-shadow .2s; font-family: inherit; }
    .fg input:focus { border-color: #667eea; background: #fff; box-shadow: 0 0 0 3px rgba(102,126,234,.1); }

    .btn-auth {
      width: 100%; padding: 12px; background: linear-gradient(135deg,#667eea,#764ba2);
      border: none; border-radius: 12px; color: #fff; font-size: .95rem; font-weight: 700;
      cursor: pointer; transition: opacity .2s, transform .15s;
      margin-top: 6px; display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-auth:hover { opacity: .9; transform: translateY(-1px); }

    /* Séparateur */
    .sep { display: flex; align-items: center; gap: 10px; margin: 16px 0; }
    .sep hr { flex: 1; border: none; border-top: 1px solid #e5e7eb; }
    .sep span { font-size: .75rem; color: #9ca3af; white-space: nowrap; }

    /* Bouton Admin */
    .btn-admin-link {
      width: 100%; padding: 11px; background: #f5f0ff; border: 1.5px solid #d8b4fe;
      border-radius: 12px; color: #7c3aed; font-size: .88rem; font-weight: 700;
      cursor: pointer; transition: .2s; display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-admin-link:hover { background: #ede9fe; border-color: #a855f7; }

    /* Continuer sans compte */
    .btn-guest {
      width: 100%; padding: 10px; background: none; border: 1.5px solid #e2e8f0;
      border-radius: 12px; color: #6b7280; font-size: .85rem; font-weight: 600;
      cursor: pointer; transition: .2s; margin-top: 10px;
      display: flex; align-items: center; justify-content: center; gap: 7px;
    }
    .btn-guest:hover { background: #f9fafb; border-color: #d1d5db; color: #374151; }

    /* Msg bienvenue */
    .welcome-bar {
      display: none; background: #ecfdf5; border: 1px solid #6ee7b7;
      border-radius: 10px; padding: 10px 16px; margin-bottom: 14px;
      color: #065f46; font-size: .86rem; font-weight: 600;
      align-items: center; gap: 8px;
    }
    .welcome-bar.show { display: flex; }

    /* Erreur */
    .err-bar {
      display: none; background: #fef2f2; border: 1px solid #fca5a5;
      border-radius: 10px; padding: 10px 16px; margin-bottom: 12px;
      color: #b91c1c; font-size: .84rem; align-items: center; gap: 8px;
    }
    .err-bar.show { display: flex; }

=======
>>>>>>> ed21f9efeea47cad5f04f8126b5062291c4379e8
    @media (max-width: 992px) { .container-main { flex-direction: column; } .sidebar { width: 100%; border-right: none; border-bottom: 1px solid #dde2ed; } .main-content { padding: 28px 24px; } .hero img { height: 320px; } }
    @media (max-width: 680px) { .header-top { justify-content: center; } .search-bar { width: 100%; } .main-content h2 { font-size: 2rem; } }
  </style>
</head>
<body>
<<<<<<< HEAD

  <!-- ════════════════════════════════
       MODALE CONNEXION / INSCRIPTION
  ════════════════════════════════ -->
  <div class="modal-bg" id="modal-bg">
    <div class="auth-modal">
      <!-- Head -->
      <div class="modal-head">
        <div class="logo-circle"><i class="bi bi-book-fill"></i></div>
        <h3>Bibliothèque Cléry</h3>
        <p>Connectez-vous ou créez un compte pour profiter de tous nos services</p>
        <button class="btn-close-modal" onclick="continuerSansCompte()" title="Continuer sans compte">
          <i class="bi bi-x-lg"></i>
        </button>
      </div>

      <!-- Tabs -->
      <div class="auth-tabs">
        <button class="auth-tab active" id="tab-login" onclick="switchAuthTab('login')">
          <i class="bi bi-box-arrow-in-right"></i> Connexion
        </button>
        <button class="auth-tab" id="tab-register" onclick="switchAuthTab('register')">
          <i class="bi bi-person-plus"></i> Créer un compte
        </button>
      </div>

      <!-- Corps -->
      <div class="modal-body">

        <!-- ── Connexion ── -->
        <div class="auth-panel active" id="panel-login">
          <div class="welcome-bar" id="login-success">
            <i class="bi bi-check-circle-fill"></i> Connexion réussie ! Bienvenue.
          </div>
          <div class="err-bar" id="login-err">
            <i class="bi bi-x-circle-fill"></i> <span id="login-err-txt">Email ou mot de passe incorrect.</span>
          </div>

          <div class="fg">
            <label>Adresse e-mail</label>
            <input type="email" id="login-email" placeholder="votre@email.fr">
          </div>
          <div class="fg">
            <label>Mot de passe</label>
            <input type="password" id="login-pwd" placeholder="••••••••" onkeydown="if(event.key==='Enter') seConnecter()">
          </div>

          <button class="btn-auth" onclick="seConnecter()">
            <i class="bi bi-box-arrow-in-right"></i> Se connecter
          </button>

          <div class="sep"><hr><span>ou</span><hr></div>

          <button class="btn-admin-link" onclick="window.location.href='admin/admin_login.php'">
            <i class="bi bi-shield-lock-fill"></i> Accès Administrateur
          </button>

          <button class="btn-guest" onclick="continuerSansCompte()">
            <i class="bi bi-eye"></i> Continuer sans compte
          </button>
        </div>

        <!-- ── Inscription ── -->
        <div class="auth-panel" id="panel-register">
          <div class="welcome-bar" id="register-success">
            <i class="bi bi-check-circle-fill"></i> Compte créé ! Vous êtes connecté.
          </div>
          <div class="err-bar" id="register-err">
            <i class="bi bi-x-circle-fill"></i> <span id="register-err-txt">Erreur lors de l'inscription.</span>
          </div>

          <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
            <div class="fg"><label>Prénom *</label><input id="reg-prenom" placeholder="Marie"></div>
            <div class="fg"><label>Nom *</label><input id="reg-nom" placeholder="Dupont"></div>
          </div>
          <div class="fg">
            <label>Adresse e-mail *</label>
            <input type="email" id="reg-email" placeholder="votre@email.fr">
          </div>
          <div class="fg">
            <label>Mot de passe *</label>
            <input type="password" id="reg-pwd" placeholder="Minimum 6 caractères">
          </div>
          <div class="fg">
            <label>Confirmer le mot de passe *</label>
            <input type="password" id="reg-pwd2" placeholder="••••••••" onkeydown="if(event.key==='Enter') sInscrire()">
          </div>

          <button class="btn-auth" onclick="sInscrire()">
            <i class="bi bi-person-check"></i> Créer mon compte
          </button>

          <div class="sep"><hr><span>ou</span><hr></div>

          <button class="btn-admin-link" onclick="window.location.href='admin/admin_login.php'">
            <i class="bi bi-shield-lock-fill"></i> Accès Administrateur
          </button>

          <button class="btn-guest" onclick="continuerSansCompte()">
            <i class="bi bi-eye"></i> Continuer sans compte
          </button>
        </div>

      </div>
    </div>
  </div>

  <!-- ════════════════════════════════
       SITE PRINCIPAL
  ════════════════════════════════ -->
  <header class="header-top">
    <div class="header-left">
      <img src="img/mon-profile-img.jpg" alt="Logo" onerror="this.style.background='rgba(255,255,255,0.3)'">
=======
  <header class="header-top">
    <div class="header-left">
      <img src="assets/img/mon-profile-img.jpg" alt="Logo">
>>>>>>> ed21f9efeea47cad5f04f8126b5062291c4379e8
      <h5>Bibliothèque Cléry</h5>
    </div>
    <div class="search-bar">
      <input type="text" placeholder="Rechercher un livre...">
    </div>
<<<<<<< HEAD
    <div class="header-right">
      <div class="user-pill" id="user-pill" onclick="ouvrirModal()" style="display:none">
        <i class="bi bi-person-circle"></i>
        <span id="user-pill-name">Mon compte</span>
      </div>
      <button class="btn-connexion" id="btn-header-connexion" onclick="ouvrirModal()">
        <i class="bi bi-person"></i> Connexion
      </button>
    </div>
  </header>

=======
  </header>
>>>>>>> ed21f9efeea47cad5f04f8126b5062291c4379e8
  <div class="container-main">
    <aside class="sidebar">
      <a href="#" class="active"><i class="bi bi-house"></i> Accueil</a>
      <a href="livres/livres.php"><i class="bi bi-book"></i> Livres</a>
      <a href="auteur/auteur.php"><i class="bi bi-person"></i> Auteurs</a>
      <a href="accueil/accueil.php"><i class="bi bi-info-circle"></i> À propos</a>
      <a href="contact/contact.php"><i class="bi bi-envelope"></i> Contact</a>
    </aside>
    <main class="main-content">
      <h2>Bibliothèque Cléry</h2>
      <div class="hero">
        <img src="img/hero.jpg" alt="Livres" onerror="this.style.backgroundColor='#dfe4ee'">
      </div>
      <section class="books-section">
        <h3>Livres à la Une</h3>
        <div class="books-grid">
          <div class="book-card">
            <img src="img/livre1.jpg" alt="Livre 1" onerror="this.style.backgroundColor='#ddd'">
            <div class="book-info">
<<<<<<< HEAD
              <h4>Ta deuxième vie commence...</h4>
              <p><strong>Auteur :</strong> Raphaëlle Giordano</p>
=======
              <h4>Titre Livre 1</h4>
              <p><strong>Auteur :</strong> Nom Auteur</p>
>>>>>>> ed21f9efeea47cad5f04f8126b5062291c4379e8
            </div>
          </div>
          <div class="book-card">
            <img src="img/livre2.jpg" alt="Livre 2" onerror="this.style.backgroundColor='#ddd'">
            <div class="book-info">
<<<<<<< HEAD
              <h4>Les Misérables</h4>
=======
              <h4>Les misérables</h4>
>>>>>>> ed21f9efeea47cad5f04f8126b5062291c4379e8
              <p><strong>Auteur :</strong> Victor Hugo</p>
            </div>
          </div>
          <div class="book-card">
            <img src="img/livre3.jpg" alt="Livre 3" onerror="this.style.backgroundColor='#ddd'">
            <div class="book-info">
<<<<<<< HEAD
              <h4>Roméo et Juliette</h4>
              <p><strong>Auteur :</strong> William Shakespeare</p>
=======
              <h4>Titre Livre 3</h4>
              <p><strong>Auteur :</strong> Nom Auteur</p>
>>>>>>> ed21f9efeea47cad5f04f8126b5062291c4379e8
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
<<<<<<< HEAD

  <footer class="footer">
    <p>&copy; 2026 Bibliothèque Cléry. Tous droits réservés.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // ── Fausse base d'utilisateurs (sessionStorage) ──
    function getUsers() {
      try { return JSON.parse(sessionStorage.getItem('clery_users') || '[]'); } catch { return []; }
    }
    function saveUsers(u) { sessionStorage.setItem('clery_users', JSON.stringify(u)); }
    function getCurrentUser() {
      try { return JSON.parse(sessionStorage.getItem('clery_current_user') || 'null'); } catch { return null; }
    }

    // ── Affiche la modale ou pas selon session ──
    window.addEventListener('load', () => {
      const user = getCurrentUser();
      if (user) {
        // Déjà connecté
        document.getElementById('modal-bg').classList.add('hidden');
        showUserPill(user.prenom);
      } else {
        document.getElementById('modal-bg').classList.remove('hidden');
      }
    });

    function ouvrirModal() {
      document.getElementById('modal-bg').classList.remove('hidden');
    }

    function switchAuthTab(tab) {
      document.getElementById('panel-login').classList.toggle('active', tab === 'login');
      document.getElementById('panel-register').classList.toggle('active', tab === 'register');
      document.getElementById('tab-login').classList.toggle('active', tab === 'login');
      document.getElementById('tab-register').classList.toggle('active', tab === 'register');
    }

    function continuerSansCompte() {
      document.getElementById('modal-bg').classList.add('hidden');
    }

    function showUserPill(prenom) {
      document.getElementById('user-pill').style.display = 'flex';
      document.getElementById('user-pill-name').textContent = prenom || 'Mon compte';
      document.getElementById('btn-header-connexion').style.display = 'none';
    }

    // ── Connexion ──
    function seConnecter() {
      const email = document.getElementById('login-email').value.trim();
      const pwd   = document.getElementById('login-pwd').value;
      const errBar = document.getElementById('login-err');
      const errTxt = document.getElementById('login-err-txt');
      errBar.classList.remove('show');

      if (!email || !pwd) { errTxt.textContent = 'Merci de remplir tous les champs.'; errBar.classList.add('show'); return; }

      const users = getUsers();
      const user = users.find(u => u.email === email && u.pwd === pwd);
      if (!user) { errTxt.textContent = 'Email ou mot de passe incorrect.'; errBar.classList.add('show'); return; }

      sessionStorage.setItem('clery_current_user', JSON.stringify(user));
      document.getElementById('login-success').classList.add('show');
      setTimeout(() => {
        document.getElementById('modal-bg').classList.add('hidden');
        document.getElementById('login-success').classList.remove('show');
        showUserPill(user.prenom);
      }, 1200);
    }

    // ── Inscription ──
    function sInscrire() {
      const prenom = document.getElementById('reg-prenom').value.trim();
      const nom    = document.getElementById('reg-nom').value.trim();
      const email  = document.getElementById('reg-email').value.trim();
      const pwd    = document.getElementById('reg-pwd').value;
      const pwd2   = document.getElementById('reg-pwd2').value;
      const errBar = document.getElementById('register-err');
      const errTxt = document.getElementById('register-err-txt');
      errBar.classList.remove('show');

      if (!prenom || !nom || !email || !pwd) { errTxt.textContent = 'Merci de remplir tous les champs.'; errBar.classList.add('show'); return; }
      if (pwd.length < 6) { errTxt.textContent = 'Le mot de passe doit faire au moins 6 caractères.'; errBar.classList.add('show'); return; }
      if (pwd !== pwd2) { errTxt.textContent = 'Les mots de passe ne correspondent pas.'; errBar.classList.add('show'); return; }

      const users = getUsers();
      if (users.find(u => u.email === email)) { errTxt.textContent = 'Cet email est déjà utilisé.'; errBar.classList.add('show'); return; }

      const user = { prenom, nom, email, pwd };
      users.push(user);
      saveUsers(users);
      sessionStorage.setItem('clery_current_user', JSON.stringify(user));

      document.getElementById('register-success').classList.add('show');
      setTimeout(() => {
        document.getElementById('modal-bg').classList.add('hidden');
        document.getElementById('register-success').classList.remove('show');
        showUserPill(prenom);
      }, 1200);
    }
  </script>
=======
  <footer class="footer">
    <p>&copy; 2026 Bibliothèque Cléry. Tous droits réservés.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
>>>>>>> ed21f9efeea47cad5f04f8126b5062291c4379e8
</body>
</html>
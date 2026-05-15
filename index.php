<?php
// Connexion à la base désactivée pour afficher la page sans erreur.
$totalInscrits = 0;
?>
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
    
    .header-top { display: flex; justify-content: space-between; align-items: center; gap: 15px; padding: 18px 30px; background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); box-shadow: 0 4px 16px rgba(0,0,0,0.15); position: sticky; top: 0; z-index: 100; flex-wrap: wrap; }
    .header-left { display: flex; align-items: center; gap: 12px; color: white; }
    .header-left img { width: 48px; height: 48px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.85); object-fit: cover; }
    .header-left h5 { margin: 0; font-size: 1.5rem; font-weight: 700; }
    
    .search-bar { flex: 1; max-width: 360px; }
    .search-bar input { width: 100%; padding: 11px 18px; border-radius: 999px; border: none; background: #fff; color: #333; box-shadow: 0 10px 22px rgba(0,0,0,0.08); }
    .search-bar input::placeholder { color: #999; }
    
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
    
    .carousel-section { margin: 40px 0; }
    .carousel-img { width: 100%; height: auto; display: block; }
    
    .presentation-section { padding: 60px 0; }
    .presentation-item { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; margin-bottom: 80px; }
    .presentation-item.reverse { direction: rtl; }
    .presentation-item.reverse > * { direction: ltr; }
    .presentation-image { width: 100%; height: 300px; object-fit: cover; border-radius: 8px; }
    .presentation-text h3 { font-size: 1.8rem; margin-bottom: 20px; color: #0d6efd; font-weight: 600; }
    .presentation-text p { font-size: 1rem; line-height: 1.6; color: #555; margin-bottom: 15px; }
    
    .footer { background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); color: #fff; padding: 30px 40px; margin-top: 36px; font-weight: 500; }
    .footer-content { display: flex; justify-content: space-between; align-items: center; gap: 30px; flex-wrap: nowrap; }
    .footer-left { display: flex; align-items: center; }
    .footer-left img { height: 60px; flex-shrink: 0; }
    .footer-center { text-align: center; flex: 1; }
    .footer-center h5 { margin: 0 0 6px; font-size: 1.1rem; font-weight: 600; }
    .footer-center p { margin: 3px 0; font-size: 0.95rem; }
    .footer-right { text-align: right; }
    .footer-right p { margin: 4px 0; font-size: 0.95rem; }
    
    @media (max-width: 992px) { 
      .container-main { flex-direction: column; } 
      .sidebar { width: 100%; border-right: none; border-bottom: 1px solid #dde2ed; } 
      .main-content { padding: 28px 24px; } 
      .hero img { height: 320px; }
      .presentation-item { grid-template-columns: 1fr; gap: 20px; }
      .presentation-item.reverse { direction: ltr; }
    }
    
    @media (max-width: 680px) { 
      .header-top { justify-content: center; } 
      .search-bar { width: 100%; } 
      .main-content h2 { font-size: 2rem; } 
    }
  </style>
</head>
<body>
  <header class="header-top">
    <div class="header-left">
      <img src="assets/img/mon-profile-img.jpg" alt="Logo">
      <h5>Bibliothèque Cléry</h5>
    </div>
    <div class="search-bar">
      <input type="text" placeholder="Rechercher un livre...">
    </div>
  </header>
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
      <p class="stats-text" style="margin:0 0 24px; font-size:1.1rem; color:#1f2937;">Membres inscrits : <strong><?php echo $totalInscrits; ?></strong></p>
      <div class="hero">
        <img src="img/hero.jpg" alt="Livres" onerror="this.style.backgroundColor='#dfe4ee'">
      </div>
      <section class="books-section">
        <h3>Livres à la Une</h3>
        <div class="books-grid">
          <div class="book-card">
            <img src="img/livre1.jpg" alt="Livre 1" onerror="this.style.backgroundColor='#ddd'">
            <div class="book-info">
              <h4>Titre Livre 1</h4>
              <p><strong>Auteur :</strong> Nom Auteur</p>
            </div>
          </div>
          <div class="book-card">
            <img src="img/livre2.jpg" alt="Livre 2" onerror="this.style.backgroundColor='#ddd'">
            <div class="book-info">
              <h4>Les misérables</h4>
              <p><strong>Auteur :</strong> Victor Hugo</p>
            </div>
          </div>
          <div class="book-card">
            <img src="img/livre3.jpg" alt="Livre 3" onerror="this.style.backgroundColor='#ddd'">
            <div class="book-info">
              <h4>Titre Livre 3</h4>
              <p><strong>Auteur :</strong> Nom Auteur</p>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-left">
        <img src="img/logocfa.png" alt="Logo Bibliothèque">
      </div>
      <div class="footer-center">
        <h5>Bibliothèque Cléry</h5>
        <p>En ligne et sur Place.</p>
        <p>© 2026 Tous droits réservés.</p>
      </div>
      <div class="footer-right">
        <p><strong>Contact :</strong></p>
        <p>01 23 45 67 89</p>
        <p>bibliotheque@clery.fr</p>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
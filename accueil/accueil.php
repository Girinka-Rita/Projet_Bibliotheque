<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>À propos - Bibliothèque Cléry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #f0f2f5; }
    .navbar { background-color: #4a6cf7; }
    .navbar-brand { color: white !important; font-weight: bold; }
    .sidebar { background-color: white; min-height: 100vh; border-right: 1px solid #ddd; padding-top: 20px; }
    .sidebar a { display: block; padding: 10px 20px; color: #333; text-decoration: none; border-radius: 5px; margin: 3px 10px; }
    .sidebar a:hover { background-color: #e8ecff; color: #4a6cf7; }
    .sidebar a.actif { background-color: #e8ecff; color: #4a6cf7; font-weight: bold; }
    .carte-info { border: none; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    footer { background-color: #4a6cf7; color: white; text-align: center; padding: 20px; margin-top: 40px; }
  </style>
</head>
<body>

<nav class="navbar">
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="../index.php"><i class="bi bi-book"></i> Bibliothèque Cléry</a>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 sidebar p-0">
      <a href="../index.php"><i class="bi bi-house"></i> Accueil</a>
      <a href="../livres/livres.php"><i class="bi bi-book"></i> Livres</a>
      <a href="../auteur/auteur.php"><i class="bi bi-person"></i> Auteurs</a>
      <a href="accueil.php" class="actif"><i class="bi bi-info-circle"></i> À propos</a>
      <a href="../contact/contact.php"><i class="bi bi-envelope"></i> Contact</a>
    </div>

    <div class="col-md-10 p-4">

      <h2 class="mb-1">À propos de la Bibliothèque Cléry</h2>
      <p class="text-muted mb-4">Tout ce que vous devez savoir sur notre bibliothèque</p>

      <!-- image + texte de présentation -->
      <div class="row mb-4">
        <div class="col-md-8">
          <div class="card carte-info p-4">
            <h4><i class="bi bi-building text-primary"></i> Notre bibliothèque</h4>
            <p>
              La Bibliothèque Cléry est ouverte à tous depuis 1985. Elle propose un large choix de livres pour
              tous les âges et tous les goûts. Que vous aimiez les romans, les classiques, les policiers ou la
              philosophie, vous trouverez forcément quelque chose qui vous plaira !
            </p>
            <p>
              Nous comptons aujourd'hui plus de <strong>5 000 ouvrages</strong> dans notre catalogue et
              accueillons environ <strong>200 membres</strong> actifs chaque année.
            </p>
            <p class="mb-0">
              Notre équipe est composée de <strong>3 bibliothécaires</strong> passionnés qui sont là pour vous
              aider à trouver le livre qu'il vous faut.
            </p>
          </div>
        </div>

        <!-- petites stats -->
        <div class="col-md-4">
          <div class="row g-3">
            <div class="col-6">
              <div class="card carte-info text-center p-3">
                <div style="font-size: 2rem; color: #4a6cf7;"><i class="bi bi-book-fill"></i></div>
                <h4 class="mb-0">5 000+</h4>
                <small class="text-muted">Livres</small>
              </div>
            </div>
            <div class="col-6">
              <div class="card carte-info text-center p-3">
                <div style="font-size: 2rem; color: #4a6cf7;"><i class="bi bi-people-fill"></i></div>
                <h4 class="mb-0">200+</h4>
                <small class="text-muted">Membres</small>
              </div>
            </div>
            <div class="col-6">
              <div class="card carte-info text-center p-3">
                <div style="font-size: 2rem; color: #4a6cf7;"><i class="bi bi-calendar"></i></div>
                <h4 class="mb-0">1985</h4>
                <small class="text-muted">Fondée en</small>
              </div>
            </div>
            <div class="col-6">
              <div class="card carte-info text-center p-3">
                <div style="font-size: 2rem; color: #4a6cf7;"><i class="bi bi-star-fill"></i></div>
                <h4 class="mb-0">4.8/5</h4>
                <small class="text-muted">Avis clients</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Services -->
      <h4 class="mb-3">Nos services</h4>
      <div class="row g-3 mb-4">
        <div class="col-md-3">
          <div class="card carte-info p-3 text-center">
            <i class="bi bi-arrow-left-right text-primary" style="font-size: 1.8rem;"></i>
            <h6 class="mt-2">Emprunts</h6>
            <p class="small text-muted">Empruntez jusqu'à 3 livres pour une durée de 3 semaines.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card carte-info p-3 text-center">
            <i class="bi bi-wifi text-primary" style="font-size: 1.8rem;"></i>
            <h6 class="mt-2">Wi-Fi Gratuit</h6>
            <p class="small text-muted">Accès internet gratuit dans toute la bibliothèque.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card carte-info p-3 text-center">
            <i class="bi bi-printer text-primary" style="font-size: 1.8rem;"></i>
            <h6 class="mt-2">Impression</h6>
            <p class="small text-muted">Photocopies et impressions disponibles sur place.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card carte-info p-3 text-center">
            <i class="bi bi-calendar-event text-primary" style="font-size: 1.8rem;"></i>
            <h6 class="mt-2">Événements</h6>
            <p class="small text-muted">Ateliers lecture, clubs de livres et rencontres d'auteurs.</p>
          </div>
        </div>
      </div>

      <!-- Horaires -->
      <h4 class="mb-3">Horaires d'ouverture</h4>
      <div class="col-md-5">
        <div class="card carte-info p-3">
          <table class="table table-sm mb-0">
            <tbody>
              <tr><td>Lundi – Vendredi</td><td><strong>9h00 – 18h00</strong></td></tr>
              <tr><td>Samedi</td><td><strong>10h00 – 16h00</strong></td></tr>
              <tr><td>Dimanche</td><td><span class="text-danger">Fermé</span></td></tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

<footer><p>© 2026 Bibliothèque Cléry. Tous droits réservés.</p></footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
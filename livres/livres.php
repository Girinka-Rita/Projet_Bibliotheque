<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Livres - Bibliothèque Cléry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
    }

    .navbar {
      background-color: #4a6cf7;
    }

    .navbar-brand {
      color: white !important;
      font-weight: bold;
    }

    .sidebar {
      background-color: white;
      min-height: 100vh;
      border-right: 1px solid #ddd;
      padding-top: 20px;
    }

    .sidebar a {
      display: block;
      padding: 10px 20px;
      color: #333;
      text-decoration: none;
      border-radius: 5px;
      margin: 3px 10px;
    }

    .sidebar a:hover {
      background-color: #e8ecff;
      color: #4a6cf7;
    }

    .sidebar a.actif {
      background-color: #e8ecff;
      color: #4a6cf7;
      font-weight: bold;
    }

    .carte-livre {
      border: none;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      transition: 0.2s;
      height: 100%;
    }

    .carte-livre:hover {
      transform: translateY(-4px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    }

    .carte-livre img {
      height: 250px;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
    }

    footer {
      background-color: #4a6cf7;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<nav class="navbar">
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="../index.php">
      <i class="bi bi-book"></i> Bibliothèque Cléry
    </a>
    <input type="text" class="form-control w-25 ms-auto" id="recherche"
           placeholder="Rechercher un livre..." oninput="rechercherLivre()">
  </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <div class="col-md-2 sidebar p-0">
      <a href="../index.php"><i class="bi bi-house"></i> Accueil</a>
      <a href="livres.php" class="actif"><i class="bi bi-book"></i> Livres</a>
      <a href="../auteur/auteur.php"><i class="bi bi-person"></i> Auteurs</a>
      <a href="../accueil/accueil.php"><i class="bi bi-info-circle"></i> À propos</a>
      <a href="../contact/contact.php"><i class="bi bi-envelope"></i> Contact</a>
    </div>

    <!-- Contenu -->
    <div class="col-md-10 p-4">

      <h2 class="mb-2">Catalogue des Livres</h2>
      <p class="text-muted mb-4">Tous les livres disponibles dans notre bibliothèque</p>

      <!-- Filtres par genre -->
      <div class="mb-4">
        <button class="btn btn-primary btn-sm me-1" onclick="filtrerGenre('tous', this)">Tous</button>
        <button class="btn btn-outline-primary btn-sm me-1" onclick="filtrerGenre('Roman', this)">Roman</button>
        <button class="btn btn-outline-primary btn-sm me-1" onclick="filtrerGenre('Classique', this)">Classique</button>
        <button class="btn btn-outline-primary btn-sm me-1" onclick="filtrerGenre('Théâtre', this)">Théâtre</button>
        <button class="btn btn-outline-primary btn-sm me-1" onclick="filtrerGenre('Policier', this)">Policier</button>
      </div>

      <!-- Grille de livres -->
      <div class="row g-3" id="grille-livres">

        <div class="col-md-3 livre-card" data-genre="Roman" data-titre="ta deuxieme vie giordano">
          <div class="card carte-livre">
            <img src="../img/livre1.jpg" alt="Livre 1"
                 onerror="this.style.display='none'">
            <div class="card-body">
              <span class="badge bg-primary mb-2">Roman</span>
              <h5 class="card-title" style="font-size: 0.95rem;">Ta deuxième vie commence...</h5>
              <p class="card-text text-muted small">Raphaëlle Giordano — 2015</p>
              <p class="card-text small">Camille décide de tout changer pour être enfin heureuse grâce à un guide de vie.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-warning small">★★★★★</span>
                <span class="badge bg-success">Disponible</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 livre-card" data-genre="Classique" data-titre="les miserables victor hugo">
          <div class="card carte-livre">
            <img src="../img/livre2.jpg" alt="Les Misérables"
                 onerror="this.style.display='none'">
            <div class="card-body">
              <span class="badge bg-warning text-dark mb-2">Classique</span>
              <h5 class="card-title" style="font-size: 0.95rem;">Les Misérables</h5>
              <p class="card-text text-muted small">Victor Hugo — 1862</p>
              <p class="card-text small">L'histoire de Jean Valjean et de sa rédemption dans la France du XIXe siècle.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-warning small">★★★★★</span>
                <span class="badge bg-danger">Emprunté</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 livre-card" data-genre="Théâtre" data-titre="romeo juliette shakespeare">
          <div class="card carte-livre">
            <img src="../img/livre3.jpg" alt="Roméo et Juliette"
                 onerror="this.style.display='none'">
            <div class="card-body">
              <span class="badge bg-info mb-2">Théâtre</span>
              <h5 class="card-title" style="font-size: 0.95rem;">Roméo et Juliette</h5>
              <p class="card-text text-muted small">William Shakespeare — 1597</p>
              <p class="card-text small">La plus célèbre tragédie d'amour de deux jeunes amants de familles ennemies.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-warning small">★★★★★</span>
                <span class="badge bg-success">Disponible</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 livre-card" data-genre="Roman" data-titre="l etranger albert camus">
          <div class="card carte-livre">
            <div class="bg-dark" style="height: 250px; border-radius: 10px 10px 0 0; display:flex; align-items:center; justify-content:center;">
              <span style="color:#aaa; font-size: 3rem;">📖</span>
            </div>
            <div class="card-body">
              <span class="badge bg-primary mb-2">Roman</span>
              <h5 class="card-title" style="font-size: 0.95rem;">L'Étranger</h5>
              <p class="card-text text-muted small">Albert Camus — 1942</p>
              <p class="card-text small">Un homme indifférent commet un meurtre absurde. Roman philosophique majeur.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-warning small">★★★★★</span>
                <span class="badge bg-danger">Emprunté</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 livre-card" data-genre="Roman" data-titre="le petit prince saint exupery">
          <div class="card carte-livre">
            <div class="bg-primary" style="height: 250px; border-radius: 10px 10px 0 0; display:flex; align-items:center; justify-content:center;">
              <span style="color:#fff; font-size: 3rem;">⭐</span>
            </div>
            <div class="card-body">
              <span class="badge bg-primary mb-2">Roman</span>
              <h5 class="card-title" style="font-size: 0.95rem;">Le Petit Prince</h5>
              <p class="card-text text-muted small">Antoine de Saint-Exupéry — 1943</p>
              <p class="card-text small">Un pilote rencontre un petit prince venu d'une autre planète. Conte universel.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-warning small">★★★★★</span>
                <span class="badge bg-success">Disponible</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 livre-card" data-genre="Policier" data-titre="sherlock holmes conan doyle">
          <div class="card carte-livre">
            <div class="bg-secondary" style="height: 250px; border-radius: 10px 10px 0 0; display:flex; align-items:center; justify-content:center;">
              <span style="color:#fff; font-size: 3rem;">🔍</span>
            </div>
            <div class="card-body">
              <span class="badge bg-secondary mb-2">Policier</span>
              <h5 class="card-title" style="font-size: 0.95rem;">Les Aventures de Sherlock Holmes</h5>
              <p class="card-text text-muted small">Arthur Conan Doyle — 1892</p>
              <p class="card-text small">Le célèbre détective résout les affaires les plus complexes de Londres.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-warning small">★★★★★</span>
                <span class="badge bg-success">Disponible</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 livre-card" data-genre="Classique" data-titre="notre dame de paris victor hugo">
          <div class="card carte-livre">
            <div style="height: 250px; border-radius: 10px 10px 0 0; background-color:#8b1a1a; display:flex; align-items:center; justify-content:center;">
              <span style="color:#f0c040; font-size: 3rem;">⛪</span>
            </div>
            <div class="card-body">
              <span class="badge bg-warning text-dark mb-2">Classique</span>
              <h5 class="card-title" style="font-size: 0.95rem;">Notre-Dame de Paris</h5>
              <p class="card-text text-muted small">Victor Hugo — 1831</p>
              <p class="card-text small">L'histoire de Quasimodo et d'Esmeralda dans le Paris médiéval.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-warning small">★★★★☆</span>
                <span class="badge bg-success">Disponible</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 livre-card" data-genre="Théâtre" data-titre="hamlet shakespeare">
          <div class="card carte-livre">
            <div style="height: 250px; border-radius: 10px 10px 0 0; background-color:#1a1a2e; display:flex; align-items:center; justify-content:center;">
              <span style="color:#c8b8e8; font-size: 3rem;">💀</span>
            </div>
            <div class="card-body">
              <span class="badge bg-info mb-2">Théâtre</span>
              <h5 class="card-title" style="font-size: 0.95rem;">Hamlet</h5>
              <p class="card-text text-muted small">William Shakespeare — 1603</p>
              <p class="card-text small">"Être ou ne pas être" — Le prince Hamlet veut venger la mort de son père.</p>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <span class="text-warning small">★★★★★</span>
                <span class="badge bg-success">Disponible</span>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- fin grille -->

    </div>
  </div>
</div>

<footer>
  <p>© 2026 Bibliothèque Cléry. Tous droits réservés.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

  var genreActuel = 'tous';

  function filtrerGenre(genre, bouton) {
    genreActuel = genre;

    // remettre tous les boutons en outline
    var boutons = document.querySelectorAll('.mb-4 .btn');
    for (var i = 0; i < boutons.length; i++) {
      boutons[i].className = boutons[i].className.replace('btn-primary', 'btn-outline-primary');
    }
    // mettre le bouton cliqué en actif
    bouton.className = bouton.className.replace('btn-outline-primary', 'btn-primary');

    appliquerFiltres();
  }

  function rechercherLivre() {
    appliquerFiltres();
  }

  function appliquerFiltres() {
    var recherche = document.getElementById('recherche').value.toLowerCase();
    var cartes = document.querySelectorAll('.livre-card');

    for (var i = 0; i < cartes.length; i++) {
      var carte = cartes[i];
      var genre = carte.getAttribute('data-genre');
      var titre = carte.getAttribute('data-titre');

      var okGenre = (genreActuel === 'tous' || genre === genreActuel);
      var okRecherche = (titre.includes(recherche));

      if (okGenre && okRecherche) {
        carte.style.display = 'block';
      } else {
        carte.style.display = 'none';
      }
    }
  }

</script>
</body>
</html>
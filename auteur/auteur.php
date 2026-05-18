<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auteurs - Bibliothèque Cléry</title>
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

    /* carte auteur */
    .carte-auteur {
      border: none;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: 0.2s;
    }

    .carte-auteur:hover {
      transform: translateY(-4px);
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    .bandeau-auteur {
      height: 80px;
    }

    /* cercle avec icone */
    .cercle-auteur {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background-color: white;
      border: 3px solid white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: -35px auto 0;
      box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }

    .cercle-auteur i {
      font-size: 1.8rem;
      color: #4a6cf7;
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
    <input type="text" class="form-control w-25 ms-auto" placeholder="Rechercher un auteur...">
  </div>
</nav>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar - PAS de bouton admin ici -->
    <div class="col-md-2 sidebar p-0">
      <a href="../index.php"><i class="bi bi-house"></i> Accueil</a>
      <a href="../livres/livres.php"><i class="bi bi-book"></i> Livres</a>
      <a href="auteur.php" class="actif"><i class="bi bi-person"></i> Auteurs</a>
      <a href="../accueil/accueil.php"><i class="bi bi-info-circle"></i> À propos</a>
      <a href="../contact/contact.php"><i class="bi bi-envelope"></i> Contact</a>
    </div>

    <!-- Contenu -->
    <div class="col-md-10 p-4">

      <h2 class="mb-1">Nos Auteurs</h2>
      <p class="text-muted mb-4">Découvrez les auteurs présents dans notre bibliothèque</p>

      <div class="row g-3">

        <!-- Victor Hugo -->
        <div class="col-md-4">
          <div class="card carte-auteur">
            <div class="bandeau-auteur" style="background: linear-gradient(to right, #4a6cf7, #764ba2);"></div>
            <div class="cercle-auteur">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="card-body text-center pt-2">
              <h5 class="card-title mb-0">Victor Hugo</h5>
              <small class="text-muted">1802 – 1885</small><br>
              <span class="badge bg-light text-dark mt-1 mb-2">Français</span>
              <p class="card-text small">Poète, romancier et dramaturge. Chef de file du mouvement romantique français.</p>
              <div>
                <span class="badge bg-primary me-1">Roman</span>
                <span class="badge bg-primary me-1">Poésie</span>
                <span class="badge bg-primary">Théâtre</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Molière -->
        <div class="col-md-4">
          <div class="card carte-auteur">
            <div class="bandeau-auteur" style="background: linear-gradient(to right, #f093fb, #f5576c);"></div>
            <div class="cercle-auteur">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="card-body text-center pt-2">
              <h5 class="card-title mb-0">Molière</h5>
              <small class="text-muted">1622 – 1673</small><br>
              <span class="badge bg-light text-dark mt-1 mb-2">Français</span>
              <p class="card-text small">Jean-Baptiste Poquelin, dit Molière. Le plus grand auteur comique de la littérature française.</p>
              <div>
                <span class="badge bg-danger me-1">Comédie</span>
                <span class="badge bg-danger">Théâtre</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Shakespeare -->
        <div class="col-md-4">
          <div class="card carte-auteur">
            <div class="bandeau-auteur" style="background: linear-gradient(to right, #4facfe, #00f2fe);"></div>
            <div class="cercle-auteur">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="card-body text-center pt-2">
              <h5 class="card-title mb-0">William Shakespeare</h5>
              <small class="text-muted">1564 – 1616</small><br>
              <span class="badge bg-light text-dark mt-1 mb-2">Anglais</span>
              <p class="card-text small">Considéré comme le plus grand dramaturge de tous les temps. 37 pièces de théâtre.</p>
              <div>
                <span class="badge bg-info me-1">Théâtre</span>
                <span class="badge bg-info me-1">Tragédie</span>
                <span class="badge bg-info">Comédie</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Albert Camus -->
        <div class="col-md-4">
          <div class="card carte-auteur">
            <div class="bandeau-auteur" style="background: linear-gradient(to right, #43e97b, #38f9d7);"></div>
            <div class="cercle-auteur">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="card-body text-center pt-2">
              <h5 class="card-title mb-0">Albert Camus</h5>
              <small class="text-muted">1913 – 1960</small><br>
              <span class="badge bg-light text-dark mt-1 mb-2">Français</span>
              <p class="card-text small">Prix Nobel de littérature 1957. Auteur de L'Étranger et La Peste.</p>
              <div>
                <span class="badge bg-success me-1">Roman</span>
                <span class="badge bg-success me-1">Philo</span>
                <span class="badge bg-success">Essai</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Raphaëlle Giordano -->
        <div class="col-md-4">
          <div class="card carte-auteur">
            <div class="bandeau-auteur" style="background: linear-gradient(to right, #fa709a, #fee140);"></div>
            <div class="cercle-auteur">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="card-body text-center pt-2">
              <h5 class="card-title mb-0">Raphaëlle Giordano</h5>
              <small class="text-muted">1974 – présent</small><br>
              <span class="badge bg-light text-dark mt-1 mb-2">Française</span>
              <p class="card-text small">Auteure et coach. Connue pour ses romans de développement personnel.</p>
              <div>
                <span class="badge bg-warning text-dark me-1">Roman</span>
                <span class="badge bg-warning text-dark">Développement perso</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Marcel Proust -->
        <div class="col-md-4">
          <div class="card carte-auteur">
            <div class="bandeau-auteur" style="background: linear-gradient(to right, #a18cd1, #fbc2eb);"></div>
            <div class="cercle-auteur">
              <i class="bi bi-person-fill"></i>
            </div>
            <div class="card-body text-center pt-2">
              <h5 class="card-title mb-0">Marcel Proust</h5>
              <small class="text-muted">1871 – 1922</small><br>
              <span class="badge bg-light text-dark mt-1 mb-2">Français</span>
              <p class="card-text small">Auteur de "À la recherche du temps perdu". L'un des plus influents du XXe siècle.</p>
              <div>
                <span class="badge bg-secondary me-1">Roman</span>
                <span class="badge bg-secondary">Modernisme</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<footer>
  <p>© 2026 Bibliothèque Cléry. Tous droits réservés.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
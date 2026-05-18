<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion Admin - Bibliothèque Cléry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .carte-login {
      width: 100%;
      max-width: 420px;
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.12);
      overflow: hidden;
    }

    .entete-login {
      background-color: #4a6cf7;
      color: white;
      padding: 30px;
      text-align: center;
    }

    .entete-login .icone {
      width: 60px;
      height: 60px;
      background-color: rgba(255,255,255,0.2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
      font-size: 1.6rem;
    }

    /* les petits points qui s'allument quand on tape */
    .points-code {
      display: flex;
      gap: 8px;
      justify-content: center;
      margin-bottom: 15px;
    }

    .point {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      border: 2px solid #ccc;
      background-color: transparent;
      transition: 0.15s;
    }

    .point.allume {
      background-color: #4a6cf7;
      border-color: #4a6cf7;
    }

    .point.erreur {
      background-color: #dc3545;
      border-color: #dc3545;
    }
  </style>
</head>
<body>

<div class="card carte-login">

  <!-- entête -->
  <div class="entete-login">
    <div class="icone">
      <i class="bi bi-shield-lock-fill"></i>
    </div>
    <h4 class="mb-1">Bibliothèque Cléry</h4>
    <small>Espace Administrateur</small>
  </div>

  <!-- formulaire -->
  <div class="card-body p-4">

    <!-- indicateurs de saisie -->
    <div class="points-code" id="points">
      <div class="point" id="p0"></div>
      <div class="point" id="p1"></div>
      <div class="point" id="p2"></div>
      <div class="point" id="p3"></div>
      <div class="point" id="p4"></div>
      <div class="point" id="p5"></div>
      <div class="point" id="p6"></div>
      <div class="point" id="p7"></div>
    </div>

    <!-- message d'erreur -->
    <div class="alert alert-danger d-none" id="erreur"></div>

    <div class="mb-3">
      <label class="form-label fw-bold">Code administrateur</label>
      <div class="input-group">
        <input type="password" class="form-control" id="code-input"
               placeholder="Entrez le code secret" maxlength="20"
               oninput="mettreAJourPoints()"
               onkeydown="if(event.key === 'Enter') verifierCode()">
        <button class="btn btn-outline-secondary" onclick="afficherMasquer()" id="btn-oeil">
          <i class="bi bi-eye-slash" id="icone-oeil"></i>
        </button>
      </div>
    </div>

    <button class="btn btn-primary w-100" id="btn-connexion" onclick="verifierCode()">
      <i class="bi bi-box-arrow-in-right"></i> Accéder au panneau
    </button>

    <!-- indice pour le code -->
    <div class="alert alert-warning mt-3 p-2 small">
      <i class="bi bi-info-circle"></i> Code par défaut : <strong>clery2026</strong>
    </div>

    <div class="text-center mt-2">
      <a href="../index.php" class="text-muted small">
        <i class="bi bi-arrow-left"></i> Retour au site
      </a>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

  var CODE_SECRET = 'clery2026';
  var nbEchecs = 0;
  var bloque = false;

  function mettreAJourPoints() {
    var valeur = document.getElementById('code-input').value;
    var longueur = Math.min(valeur.length, 8);
    for (var i = 0; i < 8; i++) {
      var point = document.getElementById('p' + i);
      point.classList.remove('erreur');
      if (i < longueur) {
        point.classList.add('allume');
      } else {
        point.classList.remove('allume');
      }
    }
    // cacher l'erreur quand on retape
    document.getElementById('erreur').classList.add('d-none');
  }

  function afficherMasquer() {
    var input = document.getElementById('code-input');
    var icone = document.getElementById('icone-oeil');
    if (input.type === 'password') {
      input.type = 'text';
      icone.className = 'bi bi-eye';
    } else {
      input.type = 'password';
      icone.className = 'bi bi-eye-slash';
    }
  }

  function verifierCode() {
    if (bloque) return;

    var code = document.getElementById('code-input').value;
    var btn = document.getElementById('btn-connexion');
    var erreur = document.getElementById('erreur');

    // simuler un petit chargement
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Vérification...';

    setTimeout(function() {

      if (code === CODE_SECRET) {
        // connexion réussie !
        sessionStorage.setItem('clery_admin', 'true');
        btn.className = 'btn btn-success w-100';
        btn.innerHTML = '<i class="bi bi-check-circle"></i> Accès accordé !';
        setTimeout(function() {
          window.location.href = 'admin.php';
        }, 1000);

      } else {
        // mauvais code
        nbEchecs++;
        btn.disabled = false;
        btn.innerHTML = '<i class="bi bi-box-arrow-in-right"></i> Accéder au panneau';

        // allumer les points en rouge
        for (var i = 0; i < 8; i++) {
          var p = document.getElementById('p' + i);
          if (p.classList.contains('allume')) {
            p.classList.remove('allume');
            p.classList.add('erreur');
          }
        }

        var reste = 5 - nbEchecs;

        if (reste <= 0) {
          bloque = true;
          erreur.textContent = 'Trop de tentatives ! Accès bloqué 30 secondes.';
          erreur.classList.remove('d-none');
          btn.disabled = true;
          btn.innerHTML = 'Bloqué...';

          var compteur = 30;
          var intervalle = setInterval(function() {
            compteur--;
            btn.innerHTML = 'Déblocage dans ' + compteur + 's';
            if (compteur <= 0) {
              clearInterval(intervalle);
              bloque = false;
              nbEchecs = 0;
              btn.disabled = false;
              btn.innerHTML = '<i class="bi bi-box-arrow-in-right"></i> Accéder au panneau';
              erreur.classList.add('d-none');
            }
          }, 1000);

        } else {
          erreur.textContent = 'Code incorrect. Il vous reste ' + reste + ' tentative(s).';
          erreur.classList.remove('d-none');
        }

        // vider le champ
        document.getElementById('code-input').value = '';
        mettreAJourPoints();
      }

    }, 600);
  }

  // focus automatique sur le champ
  document.getElementById('code-input').focus();

</script>
</body>
</html>
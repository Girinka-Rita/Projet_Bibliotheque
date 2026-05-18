<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact - Bibliothèque Cléry</title>
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
      <a href="../accueil/accueil.php"><i class="bi bi-info-circle"></i> À propos</a>
      <a href="contact.php" class="actif"><i class="bi bi-envelope"></i> Contact</a>
    </div>

    <div class="col-md-10 p-4">
      <h2 class="mb-1">Contact</h2>
      <p class="text-muted mb-4">Une question ? Envoyez-nous un message !</p>

      <!-- message de confirmation -->
      <div class="alert alert-success d-none" id="msg-ok">
        <i class="bi bi-check-circle"></i> Votre message a bien été envoyé ! On vous répond bientôt.
      </div>

      <div class="row">
        <div class="col-md-7">
          <div class="card border-0 shadow-sm p-4" style="border-radius: 10px;">
            <div class="mb-3">
              <label class="form-label fw-bold">Votre nom</label>
              <input type="text" class="form-control" id="c-nom" placeholder="Marie Dupont">
            </div>
            <div class="mb-3">
              <label class="form-label fw-bold">Votre email</label>
              <input type="email" class="form-control" id="c-email" placeholder="marie@mail.fr">
            </div>
            <div class="mb-3">
              <label class="form-label fw-bold">Sujet</label>
              <input type="text" class="form-control" id="c-sujet" placeholder="Ex : Question sur un emprunt">
            </div>
            <div class="mb-3">
              <label class="form-label fw-bold">Message</label>
              <textarea class="form-control" id="c-message" rows="5" placeholder="Votre message..."></textarea>
            </div>
            <button class="btn btn-primary" onclick="envoyerMessage()">
              <i class="bi bi-send"></i> Envoyer
            </button>
          </div>
        </div>

        <!-- infos de contact à droite -->
        <div class="col-md-4 offset-md-1">
          <div class="card border-0 shadow-sm p-4" style="border-radius: 10px;">
            <h5 class="mb-3">Nos coordonnées</h5>
            <p><i class="bi bi-telephone text-primary"></i> <strong>Téléphone :</strong><br>01 23 45 67 89</p>
            <p><i class="bi bi-envelope text-primary"></i> <strong>Email :</strong><br>bibliotheque@clery.fr</p>
            <p><i class="bi bi-geo-alt text-primary"></i> <strong>Adresse :</strong><br>1 rue de la Bibliothèque<br>75000 Paris</p>
            <hr>
            <p class="mb-1"><strong>Horaires :</strong></p>
            <p class="small text-muted">
              Lundi – Vendredi : 9h – 18h<br>
              Samedi : 10h – 16h<br>
              Dimanche : Fermé
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer><p>© 2026 Bibliothèque Cléry. Tous droits réservés.</p></footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function envoyerMessage() {
    var nom = document.getElementById('c-nom').value;
    var email = document.getElementById('c-email').value;
    var message = document.getElementById('c-message').value;

    if (nom === '' || email === '' || message === '') {
      alert('Merci de remplir tous les champs obligatoires !');
      return;
    }

    // afficher le message de succès
    document.getElementById('msg-ok').classList.remove('d-none');

    // vider le formulaire
    document.getElementById('c-nom').value = '';
    document.getElementById('c-email').value = '';
    document.getElementById('c-sujet').value = '';
    document.getElementById('c-message').value = '';

    // faire défiler vers le haut pour voir le message
    window.scrollTo(0, 0);
  }
</script>
</body>
</html>
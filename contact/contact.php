<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact - Bibliothèque Cléry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f2f5fb; font-family: 'Segoe UI', sans-serif; }
    .contact-card { max-width: 700px; margin: 50px auto; padding: 24px; background: #fff; border-radius: 16px; box-shadow: 0 14px 32px rgba(0,0,0,0.08); }
    .contact-card h1 { font-size: 1.9rem; margin-bottom: 10px; }
    .contact-card p { margin-bottom: 24px; color: #556; }
    .form-label { font-weight: 600; }
    .form-control { border-radius: 12px; }
    .btn-submit { border-radius: 999px; padding: 10px 28px; }
  </style>
</head>
<body>
  <div class="contact-card">
    <h1>Contact</h1>
    <p>Remplis le formulaire ci-dessous pour nous envoyer un message.</p>
    <form action="../forms/contact.php" method="post" class="php-email-form">
      <div class="row g-3">
        <div class="col-md-6">
          <label for="name-field" class="form-label">Ton nom</label>
          <input type="text" name="name" id="name-field" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="email-field" class="form-label">Ton email</label>
          <input type="email" name="email" id="email-field" class="form-control" required>
        </div>
        <div class="col-12">
          <label for="subject-field" class="form-label">Sujet</label>
          <input type="text" name="subject" id="subject-field" class="form-control" required>
        </div>
        <div class="col-12">
          <label for="message-field" class="form-label">Message</label>
          <textarea name="message" id="message-field" rows="8" class="form-control" required></textarea>
        </div>
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-primary btn-submit">Envoyer</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mes Favoris</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" aria-label="Barre de navigation">
  <div class="container">
    <a class="navbar-brand" href="/index.php">Ma Bibliothèque</a>
    <div>
      <a href="/auth/logout.php" class="btn btn-danger btn-sm">Déconnexion (User)</a>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:30px;">
    <h1>Vos Favoris</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Titre favori 1</h5>
              <p class="card-text mb-4">Artiste Favori 1</p>
              <div class="mt-auto">
                <a href="/track/play.php" class="btn btn-primary w-100">Écouter</a>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    die("<p>Erreur : Vous devez être connecté pour voir vos favoris.</p>");
}

include_once __DIR__ . '/../../src/config/config.php';
include_once __DIR__ . '/../../src/include/functions.php';

$userId = $_SESSION['user']->_id;
$favorites = getFavorites($userId);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Favoris</title>
</head>
<body>
    <h1>Mes Favoris</h1>
    <?php if (empty($favorites)): ?>
        <p>Vous n'avez aucun favori pour l'instant.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($favorites as $favorite): ?>
                <li>ID de la piste : <?= htmlspecialchars($favorite->trackId) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ma Bibliothèque Musicale</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" aria-label="Barre de navigation principale">
  <div class="container">
    <a class="navbar-brand" href="index.php" aria-label="Accueil">Ma Bibliothèque</a>
    <div>
      <a href="auth/login.php" class="btn btn-primary btn-sm">Connexion</a>
    </div>
  </div>
</nav>

<section class="hero-section" aria-label="Section d'introduction">
    <div class="container">
        <h1>Bienvenue dans votre espace musical</h1>
        <p>Découvrez, écoutez et ajoutez vos morceaux préférés en favoris</p>
        <form class="row g-3 justify-content-center" aria-label="Formulaire de recherche">
          <div class="col-auto">
            <input type="text" class="form-control" name="search" placeholder="Rechercher un titre" aria-label="Champ de recherche par titre">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-light">Rechercher</button>
          </div>
        </form>
    </div>
</section>

<div class="container track-cards mt-5">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Titre du Morceau 1</h5>
          <p class="card-text mb-4">Artiste 1</p>
          <div class="mt-auto">
            <a href="track/play.php" class="btn btn-primary w-100">Écouter</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

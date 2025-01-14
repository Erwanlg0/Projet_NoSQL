<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter un favori</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container" style="margin-top:100px;text-align:center;">
    <h1>Favori ajouté avec succès</h1>
    <p><a href="/favorites/favorites.php" class="btn btn-primary">Voir mes favoris</a></p>
</div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once __DIR__ . '/../../src/config/config.php';
    include_once __DIR__ . '/../../src/include/functions.php';

    session_start();
    if (!isset($_SESSION['user'])) {
        die("<p>Erreur : Vous devez être connecté pour ajouter un favori.</p>");
    }

    $userId = $_SESSION['user']->_id;
    $trackId = $_POST['trackId'] ?? '';

    if (addFavorite($userId, $trackId)) {
        echo "<p>Favori ajouté avec succès !</p>";
    } else {
        echo "<p>Erreur : Impossible d'ajouter le favori.</p>";
    }
}
?>

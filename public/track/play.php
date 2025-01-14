<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Titre du Morceau</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
</head>
<body style="background:#f8f9fa;padding-top:40px;font-family:sans-serif;">
<div class="container player-container" style="max-width:500px;margin:0 auto;background:#fff;padding:30px;border-radius:12px;box-shadow:0 4px 15px rgba(0,0,0,0.1);text-align:center;">
    <h1 style="font-size:1.75rem;margin-bottom:20px;color:#333;">
        Titre du Morceau <small class="text-muted">- Artiste</small>
    </h1>
    <audio controls aria-label="Lecteur audio" style="width:100%;margin-bottom:20px;">
        <source src="\assets\audio\audio.mp3" type="audio/mpeg">
        Votre navigateur ne supporte pas l'élément audio.
    </audio>
    <div>
        <a href="/index.php" class="btn btn-secondary btn-sm">Retour</a>
    </div>
</div>
</body>
</html>
<?php
if (isset($_GET['trackId'])) {
    include_once __DIR__ . '/../../src/config/config.php';
    include_once __DIR__ . '/../../src/include/functions.php';

    $trackId = $_GET['trackId'];

    $query = new MongoDB\Driver\Query(['_id' => new MongoDB\BSON\ObjectId($trackId)]);
    $cursor = $manager->executeQuery("$dbName.tracks", $query);
    $track = current($cursor->toArray());

    if ($track):
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture de <?= htmlspecialchars($track->title) ?></title>
</head>
<body>
    <h1>Lecture de la piste : <?= htmlspecialchars($track->title) ?></h1>
    <p>Artiste : <?= htmlspecialchars($track->artist) ?></p>
    <audio controls>
        <source src="<?= htmlspecialchars($track->audioUrl) ?>" type="audio/mpeg">
        Votre navigateur ne supporte pas la lecture audio.
    </audio>
</body>
</html>
<?php
    else:
        echo "<p>Piste introuvable.</p>";
    endif;
} else {
    echo "<p>Aucune piste sélectionnée.</p>";
}
?>


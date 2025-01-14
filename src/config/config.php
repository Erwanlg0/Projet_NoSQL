<?php
// config.php - Configuration MongoDB

declare(strict_types=1);

try {
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $dbName = "spotify_db"; // Nom de la base de données par défaut
} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Erreur de connexion à MongoDB : " . $e->getMessage());
}

// Exporter le gestionnaire pour les autres fichiers
return [
    'manager' => $manager,
    'dbName' => $dbName
];

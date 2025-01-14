<?php
// functions.php - Fonctions utilitaires pour MongoDB

function connectToCollection(string $collectionName): string {
    global $manager, $dbName;
    return "$dbName.$collectionName";
}

function getFavorites(string $userId): array {
    global $manager, $dbName;
    $query = new MongoDB\Driver\Query(['userId' => $userId]);
    $cursor = $manager->executeQuery("$dbName.favorites", $query);
    return $cursor->toArray();
}

function addFavorite(string $userId, string $trackId): bool {
    global $manager, $dbName;
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert(['userId' => $userId, 'trackId' => $trackId, 'addedAt' => new MongoDB\BSON\UTCDateTime()]);
    try {
        $manager->executeBulkWrite("$dbName.favorites", $bulk);
        return true;
    } catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("Erreur d'insertion : " . $e->getMessage());
        return false;
    }
}

function authenticateUser(string $email, string $password): ?array {
    global $manager, $dbName;
    $query = new MongoDB\Driver\Query(['email' => $email]);
    $cursor = $manager->executeQuery("$dbName.users", $query);
    $user = current($cursor->toArray());
    if ($user && password_verify($password, $user->password)) {
        return $user;
    }
    return null;
}

function registerUser(string $email, string $password): bool {
    global $manager, $dbName;
    $bulk = new MongoDB\Driver\BulkWrite;
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $bulk->insert(['email' => $email, 'password' => $hashedPassword, 'createdAt' => new MongoDB\BSON\UTCDateTime()]);
    try {
        $manager->executeBulkWrite("$dbName.users", $bulk);
        return true;
    } catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("Erreur d'inscription : " . $e->getMessage());
        return false;
    }
}

function getAllTracks(): array {
    global $manager, $dbName;
    $query = new MongoDB\Driver\Query([]);
    $cursor = $manager->executeQuery("$dbName.tracks", $query);
    return $cursor->toArray();
}

// Ajouter une piste (admin)
function addTrack(string $title, string $artist, string $audioUrl): bool {
    global $manager, $dbName;
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert(['title' => $title, 'artist' => $artist, 'audioUrl' => $audioUrl, 'createdAt' => new MongoDB\BSON\UTCDateTime()]);
    try {
        $manager->executeBulkWrite("$dbName.tracks", $bulk);
        return true;
    } catch (MongoDB\Driver\Exception\Exception $e) {
        error_log("Erreur d'ajout de piste : " . $e->getMessage());
        return false;
    }
}
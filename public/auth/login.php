<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Connexion</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container" style="max-width: 400px; margin-top:100px;">
    <div class="mb-3 text-center">
        <a href="/index.php" class="btn btn-secondary">Accueil</a>
    </div>
    <div class="card p-4">
        <h1 class="h4 mb-3 text-center">Connexion</h1>
        <form aria-label="Formulaire de connexion">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" class="form-control" required aria-label="Entrer votre nom d'utilisateur">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required aria-label="Entrer votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Se connecter</button>
            <div class="text-center">
                <a href="forgot_password.php" class="text-decoration-none">Mot de passe oublié ?</a>
            </div>
        </form>
        <hr>
        <p class="text-center">Pas encore inscrit ?</p>
        <a href="register.php" class="btn btn-secondary w-100">Créer un compte</a>
    </div>
</div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once __DIR__ . '/../../src/config/config.php';
    include_once __DIR__ . '/../../src/include/functions.php';

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = authenticateUser($email, $password);

    if ($user) {
        session_start();
        $_SESSION['user'] = $user;
        header('Location: /index.php');
        exit;
    } else {
        echo "<p>Erreur : Email ou mot de passe incorrect.</p>";
    }
}
?>

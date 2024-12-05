<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container" style="max-width: 400px; margin-top: 100px;">
    <div class="mb-3 text-center">
        <a href="/index.php" class="btn btn-secondary">Accueil</a>
    </div>
        <div class="card p-4">
            <h1 class="h4 mb-3 text-center">Inscription</h1>
            <form method="post" aria-label="Formulaire d'inscription">
                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" class="form-control" required aria-label="Entrer votre nom d'utilisateur">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required aria-label="Entrer votre adresse e-mail">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required aria-label="Entrer votre mot de passe">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required aria-label="Confirmer votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
            </form>
            <p class="text-center mt-3">
                Déjà inscrit ? <a href="login.php">Connectez-vous</a>
            </p>
        </div>
    </div>
</body>
</html>

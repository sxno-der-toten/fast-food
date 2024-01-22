<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="registe.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="login.php">
        <h3>Connexion</h3>

        <label for="email">Nom d'utilisateur</label>
        <input type="text" placeholder="Email or Phone" id="email" name="email"> 

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Password" id="password" name="password"> 

        <button type="submit" class="log">OK</button>
        <a href="homepage.php" class="retour">Retour</a>
        
    </form>

    <style>
        .log {
            color: white;
        }
    </style>
</body>
</html>
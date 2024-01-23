<?php

require 'connection.php';

session_unset();
session_start();

error_reporting(E_ALL);

function validationEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && validationEmail($email) && strlen($password) >= 8) {
        try {
            // Check if the email and password match a registered user
            $stmt = $bdd->prepare("SELECT * FROM login WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['email'] = $user['email'];

                header("Location: index.php");
                exit();
            } else {
                echo 'Identifiants incorrects.';
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo 'Email invalide ou mot de passe trop court (minimum 8 caractères).';
    }
}

if (isset($_SESSION['nickname'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="login.php">
        <h3>Connexion</h3>

        <label for="email">Email</label>
        <input type="text" placeholder="Email or Phone" id="email" name="email"> 

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Password" id="password" name="password"> 

        <button type="submit" class="log">OK</button>
        <a href="index.php" class="retour">Retour</a>
        
    </form>

    <style>
        .log {
            color: white;
        }
    </style>
</body>
</html>

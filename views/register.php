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
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && validationEmail($email) && strlen($password) >= 8) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $bdd->prepare("INSERT INTO login (nickname, email, password) VALUES (:nickname, :email, :password)");
            $stmt->bindParam(':nickname', $nickname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            echo "Données enregistrées avec succès.";
            $_SESSION['nickname'] = $nickname;
            $_SESSION['email'] = $email;

            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo 'Email invalide ou mot de passe trop court (minimum 8 caractères).';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="assets/register.css">

    <style>
        .log {
            color: white;
        }
    </style>

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="register.php" method="post">
        <h3>Inscription</h3>

        <label for="nickname">Nom d'utilisateur :</label>
        <input type="text" placeholder="Nom d'utilisateur" id="nickname" name="nickname"><br>

        <label for="email">E-mail :</label>
        <input type="text" placeholder="E-mail" id="email" name="email"><br>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" id="password" name="password">

        <button class="log">OK</button>
        <a href="index.php" class="retour">Retour</a>

    </form>
</body>
</html>
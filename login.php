<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

session_unset();

require 'connection.php';
function validationEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($email) && !empty($password)) {
        if (validationEmail($email) && strlen($password) >= 8) {
            try {
                $stmt = $bdd->prepare("SELECT email, password FROM login WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    if (isset($user['password']) && password_verify($password, $user['password'])) {
                        // Password is correct
                        $stmt = $bdd->prepare("SELECT email FROM login WHERE email = :email");
                        $stmt->bindParam(':email', $email);
                        $stmt->execute();
                        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($userData) {
                            $_SESSION['email'] = $userData['email'];
                            header('Location: logged.php');
                            exit();
                        // } else {
                        //     $_SESSION['email'] = $email;
                        //     $_SESSION['islog'] = true;
                        }
                    } else {
                        echo "Le mot de passe est incorrect.";
                        var_dump($user['password']);
                        var_dump(password_hash($password, PASSWORD_DEFAULT));
                    }
                } else {
                    echo "L'email n'est pas enregistré.";
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        } else {
            echo "L'email n'est pas valide ou le mot de passe doit contenir au moins 8 caractères.";
        }
    } else {
        echo "Les champs email et password ne peuvent pas être vides.";
    }
}

?>


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
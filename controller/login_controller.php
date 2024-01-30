<?php

function validationEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && validationEmail($email) && strlen($password) >= 8) {

        try {
            $stmt = $bdd->prepare("SELECT * FROM login WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['is_admin'] = $user['is_admin'];

                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['email'] = $user['email'];

                if (isset($_SESSION['nickname'])) {
                    if ($_SESSION['is_admin'] == 0) {
                        header("Location: index.php");
                        exit();
                    } elseif ($_SESSION['is_admin'] == 1) {
                        header("Location: ?page=admin");
                        exit();
                    }
                }
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

require './views/login.php';
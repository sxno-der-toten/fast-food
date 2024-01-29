<?php

session_unset();

error_reporting(E_ALL);

function validationEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$is_admin = isset($_POST['is_admin']) ? $_POST['is_admin'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_admin = isset($_POST['is_admin']) ? $_POST['is_admin'] : 0;

    if (!empty($email) && !empty($password) && validationEmail($email) && strlen($password) >= 8) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $bdd->prepare("INSERT INTO login (nickname, email, password, is_admin) VALUES (:nickname, :email, :password, :is_admin)");
            $stmt->bindParam(':nickname', $nickname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':is_admin', $is_admin);
            $stmt->execute();

            echo "Données enregistrées avec succès.";
            $_SESSION['nickname'] = $nickname;
            $_SESSION['email'] = $email;
            $_SESSION['is_admin'] = $is_admin;

            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo 'Email invalide ou mot de passe trop court (minimum 8 caractères).';
    }
}

require './views/register.php';
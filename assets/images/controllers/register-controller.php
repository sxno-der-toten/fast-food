<?php
require 'connection.php';
include '../../../register.php';
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

    if (!empty($email) && !empty($password) && (validationEmail($email) && strlen($password) >= 8)) {
            } else {
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
            }
        } else {
            echo 'Email invalide ou mot de passe trop court (minimum 8 caractères).';
        }
        echo 'Veuillez remplir tous les champs du formulaire.';
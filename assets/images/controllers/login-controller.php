<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

session_unset();

require 'connection.php';
include '../../../login.php';
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
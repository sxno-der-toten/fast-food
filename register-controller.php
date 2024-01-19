<?php 

require 'connection.php';
include 'register.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT );
        $birthday = $_POST['birthday'];
        $avatar = $_FILES['avatar']['name'];
        $avatar_content = file_get_contents($_FILES['avatar']['tmp_name']);
        $promotion = 8;

        $stmt = $bdd->prepare("INSERT INTO promotions (name, firstname, email, password, birthday, avatar, avartar_content, promotion_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $firstname, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->bindParam(4, $password, PDO::PARAM_STR);
        $stmt->bindParam(5, $birthday, PDO::PARAM_STR);
        $stmt->bindParam(6, $avatar, PDO::PARAM_STR);
        $stmt->bindParam(7, $avatar_content, PDO::PARAM_LOB);
        $stmt->bindParam(8, $promotion, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ?page=homepage");
        } else {
            echo "Erreur lors de l'ajout de l'image.";
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}
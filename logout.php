<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_logout'])) {

    session_start();
    session_destroy();

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="logout.css">
    <title>Déconnexion</title>
</head>
<body>
    <div class="logout-form">
        <h2>Confirmation de déconnexion</h2>
        <p>Êtes-vous sûr de vouloir vous déconnecter?</p>
        <form method="post" action="">
            <input class="logout" type="submit" name="confirm_logout" value="Oui, je suis sûr">
        </form>
        <a class="non" href="index.php">Annuler</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

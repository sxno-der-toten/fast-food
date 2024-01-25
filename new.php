<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $poids = isset($_POST['poids']) ? $_POST['poids'] : "";
    $glucides = isset($_POST['glucides']) ? $_POST['glucides'] : "";
    $lipides = isset($_POST['lipides']) ? $_POST['lipides'] : "";
    $proteines = isset($_POST['proteines']) ? $_POST['proteines'] : "";

    $stmt = $bdd->prepare("INSERT INTO ingredients (name, poids, glucides, lipides, proteines) VALUES (:name, :poids, :glucides, :lipides, :proteines)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':poids', $poids);
    $stmt->bindParam(':glucides', $glucides);
    $stmt->bindParam(':lipides', $lipides);
    $stmt->bindParam(':proteines', $proteines);
    $stmt->execute();

    // echo "Données enregistrées avec succès.";
    $_SESSION['name'] = $name;
    $_SESSION['poids'] = $poids;
    $_SESSION['glucides'] = $glucides;
    $_SESSION['lipides'] = $lipides;
    $_SESSION['proteines'] = $proteines;
} else {
    echo 'Erreur.';
}

include 'header.php';

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Ingrédient</title>
</head>
<body>
    <h2>Ajouter un Ingrédient</h2>
    <form action="" method="post">
    <label for="name">Nom de l'ingrédient :</label>
    <input type="text" id="name" name="name" required><br>

    <label for="poids">Poids :</label>
    <input type="number" id="poids" name="poids" required><br>

    <label for="glucides">Glucides :</label>
    <input type="number" id="glucides" name="glucides" required><br>

    <label for="lipides">Lipides :</label>
    <input type="number" id="lipides" name="lipides" required><br>

    <label for="proteines">Proteines :</label>
    <input type="number" id="proteines" name="proteines" required><br>

    <input type="submit" value="Ajouter">
</form>

<?php include 'footer.php'; ?>
</body>
</html>
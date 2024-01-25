<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $poids = isset($_POST['poids']) ? $_POST['poids'] : "";
    $glucides = isset($_POST['glucides']) ? $_POST['glucides'] : "";
    $lipides = isset($_POST['lipides']) ? $_POST['lipides'] : "";
    $proteines = isset($_POST['proteines']) ? $_POST['proteines'] : "";

    if (!empty($name) && !empty($poids) && !empty($glucides) && !empty($lipides) && !empty($proteines)) {
        $stmt = $bdd->prepare("INSERT INTO ingredients (name, poids, glucides, lipides, proteines) VALUES (:name, :poids, :glucides, :lipides, :proteines)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':poids', $poids);
        $stmt->bindParam(':glucides', $glucides);
        $stmt->bindParam(':lipides', $lipides);
        $stmt->bindParam(':proteines', $proteines);
        $stmt->execute();
    }
}

$lipides = 20;
$glucides = 50;
$proteines = 30;

$calories_lipides = 9;
$calories_glucides = 4;
$calories_proteines = 4;

$total_calories = ($lipides * $calories_lipides) + ($glucides * $calories_glucides) + ($proteines * $calories_proteines);

echo "Les calories totales pour $lipides g de lipides, $glucides g de glucides et $proteines g de protéines sont : $total_calories calories.";

require './views/newingr.php';
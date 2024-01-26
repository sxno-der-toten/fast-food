<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $poids = isset($_POST['poids']) ? $_POST['poids'] : "";
    $glucides = isset($_POST['glucides']) ? $_POST['glucides'] : "";
    $lipides = isset($_POST['lipides']) ? $_POST['lipides'] : "";
    $proteines = isset($_POST['proteines']) ? $_POST['proteines'] : "";
    $calories = isset($_POST['calories']) ? $_POST['calories'] : "";

    if (!empty($name) && !empty($poids) && !empty($glucides) && !empty($lipides) && !empty($proteines)) {
        $calories_lipides = 9;
        $calories_glucides = 4;
        $calories_proteines = 4;

        $total_calories = ($lipides * $calories_lipides) + ($glucides * $calories_glucides) + ($proteines * $calories_proteines);

        $stmt = $bdd->prepare("INSERT INTO ingredients (name, poids, calories) VALUES (:name, :poids, :calories)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':poids', $poids);
        $stmt->bindParam(':calories', $total_calories);
        $stmt->execute();

        echo "L'ingrédient a bien été ajouté ! Le nombre total de calories est de " . $total_calories . '.';
    }
}

require './views/newingr.php';
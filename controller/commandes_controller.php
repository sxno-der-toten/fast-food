<?php

$query = "SELECT id, name, description, image_url FROM products WHERE category_id = :category_id";
$response = $bdd->prepare($query);
$response->bindParam(':category_id', $category_id, PDO::PARAM_INT);
$response->execute();

$products = $response->fetchAll();

$orderDetailsStatement = $bdd->prepare($orderDetailsQuery);

try {
    $orderDetailsStatement->execute();
    $orderDetailsData = $orderDetailsStatement->fetchAll();
} catch (PDOException $e) {
    die('Erreur lors de l\'exécution de la requête : ' . $e->getMessage());
}

require './views/commandes.php';
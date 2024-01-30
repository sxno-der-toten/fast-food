<?php

$category_id = isset($_GET['id']) ? $_GET['id'] : '';

$query = "SELECT id, user_id, total_amount, order_date, status FROM orders WHERE id = :id";
$response = $bdd->prepare($query);
$response->bindParam(':id', $category_id, PDO::PARAM_INT);

try {
    // Exécutez la requête principale
    $response->execute();
    $products = $response->fetchAll();

    // Utilisez une requête différente pour les détails de la commande
    $orderDetailsQuery = "SELECT id, user_id, total_amount, order_date, status FROM orders WHERE id = :id";
    $orderDetailsStatement = $bdd->prepare($orderDetailsQuery);
    $orderDetailsStatement->bindParam(':id', $category_id, PDO::PARAM_INT);

    // Exécutez la requête pour les détails de la commande
    $orderDetailsStatement->execute();
    $orderDetailsData = $orderDetailsStatement->fetchAll();

} catch (PDOException $e) {
    die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
}

require './views/commandes.php';
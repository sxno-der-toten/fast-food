<?php

$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 1;

$query = "SELECT id, name, description, image_url FROM products WHERE category_id = :category_id";
$response = $bdd->prepare($query);
$response->bindParam(':category_id', $category_id, PDO::PARAM_INT);
$response->execute();

$products = $response->fetchAll();
?>


<link rel="stylesheet" type="text/css" href="assets/category.css">

<div class="row">
    <div class="column">
    <?php
        foreach ($products as $product) {
            ?>
            <div class='cardContainer'>
                <h2><?= $product['name'] ?></h2> 
                <img src="<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>">
                <p><?= $product['description'] ?></p>
            </div>
        <?php } ?>
    </div>
</div>

<script src="views/index.js"></script>
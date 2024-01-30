<?php

$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 1;

$query = "SELECT id, name, description, image_url FROM products WHERE category_id = :category_id";
$response = $bdd->prepare($query);
$response->bindParam(':category_id', $category_id, PDO::PARAM_INT);
$response->execute();

$products = $response->fetchAll();

$productId = isset($_POST['productId']) ? $_POST['productId'] : null;

echo json_encode($_SESSION['panier']);

var_dump($_SESSION);
?>

<link rel="stylesheet" type="text/css" href="assets/category.css">

<div class='retour-div'>
    <a class ='retour' href="?page=index">Retour</a>
</div>

<div class="cards-row">
<?php foreach ($products as $product) { ?>
    <div class='cardContainer'>
        <h2><?= $product['name'] ?></h2> 
        <img src="<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>">
        <p><?= $product['description'] ?></p>
        <button class="add-to-cart-button" onclick="addToCart(<?= $product['id'] ?>)">Ajouter au panier</button>
    </div>
<?php } ?>
</div>

<a href="?page=category&category_id=1" class='arrow'>
    <img src="assets/images/arrow.png" alt="Arrow">
</a>

<script src="views/index.js"></script>
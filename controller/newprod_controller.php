<?php
require './views/newprod.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $price = isset($_POST['price']) ? $_POST['price'] : "";
    $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : "";
    $purchase_price = isset($_POST['purchase_price']) ? $_POST['purchase_price'] : "";

$stmt_category = $bdd->prepare("SELECT id FROM categories WHERE id = :category_id");
$stmt_category->bindParam(':category_id', $category_id);
$stmt_category->execute();

if ($stmt_category->rowCount() > 0) {
    $stmt_product = $bdd->prepare("INSERT INTO products (name, category_id, description, price, image_url, purchase_price) VALUES (:name, :category_id, :description, :price, :image_url, :purchase_price)");
    $stmt_product->bindParam(':name', $name);
    $stmt_product->bindParam(':category_id', $category_id);
    $stmt_product->bindParam(':description', $description);
    $stmt_product->bindParam(':price', $price);
    $stmt_product->bindParam(':image_url', $image_url);
    $stmt_product->bindParam(':purchase_price', $purchase_price);
    $stmt_product->execute();

    $_SESSION['name'] = $name;
    $_SESSION['category_id'] = $category_id;
    $_SESSION['description'] = $description;
    $_SESSION['price'] = $price;
    $_SESSION['image_url'] = $image_url;
    $_SESSION['purchase_price'] = $purchase_price;
} else {
    echo 'Error: Category does not exist.';
}
}
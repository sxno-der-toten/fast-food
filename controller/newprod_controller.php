<?php
require './views/newprod.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $price = isset($_POST['price']) ? $_POST['price'] : "";
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

        if (isset($_FILES['image_url']['name']) && $_FILES['image_url']['name'] !== '') {
            $image = $_FILES['image_url']['name'];
            $image_temp = $_FILES['image_url']['tmp_name'];
            $image_destination = 'assets/images/' . $image;
            move_uploaded_file($image_temp, $image_destination);
            $stmt_product->bindParam(':image_url', $image_destination);
        } 

        $stmt_product->bindParam(':purchase_price', $purchase_price);
        $stmt_product->execute();

        $_SESSION['name'] = $name;
        $_SESSION['category_id'] = $category_id;
        $_SESSION['description'] = $description;
        $_SESSION['price'] = $price;
        $_SESSION['image_url'] = $image_destination;
        $_SESSION['purchase_price'] = $purchase_price;
    } else {
        echo 'Erreur : La catégorie n\'existe pas.';
    }
}
<?php 
$query = "SELECT id FROM categories";
$response = $bdd->query($query);
$datas = $response->fetchAll();

echo $_GET['category_id'];
include 'views/category.php';
<?php

$query = "SELECT id FROM categories";
$response = $bdd->query($query);
$datas = $response->fetchAll();

include 'views/category.php';
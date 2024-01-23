<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="categories.css">
    <style>
        .categories {
            text-align: center;
            margin-top: 50px;
        }

        .category-button {
            display: inline-block;
            padding: 20px;
            margin: 10px;
            font-size: 18px;
            text-decoration: none;
            background-color: #4CAF50; 
            color: white; 
            border: 2px solid #4CAF50;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .category-button:hover {
            background-color: white;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="categories">
        <a href='pizzas.php' class="category-button">PIZZAS</a>
        <a href='burgers.php' class="category-button">BURGERS</a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
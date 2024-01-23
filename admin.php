<?php
require 'connection.php';
include 'header.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>ADMIN</title>
</head>
<body>
    <h1 class='title'>ADMINISTRATION</h1>

    <!-- Add buttons for Commands, Charts, and Products -->
    <div>
        <button class='commandes' onclick="window.location.href='admin_commands.php'">Commandes</button>
        <button class='graphiques' onclick="window.location.href='admin_graphs.php'">Graphiques</button>
        <button class='produits' onclick="window.location.href='admin_products.php'">Produits</button>
    </div>

<?php include 'footer.php'; ?>
</body>
</html>
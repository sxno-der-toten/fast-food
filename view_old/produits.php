<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produits.css">
    <title>Tableau d'aliments</title>
</head>
<body>

<table border="1" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>PRIX D'ACHAT</th>
            <th>PRIX DE VENTE</th>
            <th>CALORIES</th>
            <th>NOM ALIMENTS</th>
            <th>VENTES</th>
            <th>VISIBILITÉ</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>2.50</td>
            <td>5.00</td>
            <td>150</td>
            <td>Pomme</td>
            <td>100</td>
            <td>Oui</td>
            <td><a class="new" href="new.php">NOUVEAU</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1.75</td>
            <td>3.50</td>
            <td>200</td>
            <td>Carotte</td>
            <td>75</td>
            <td>Non</td>
        </tr>
    </tbody>
</table>

<a class="retour" href="admin.php">Retour</a>

<?php include 'footer.php'; ?>

</body>
</html>

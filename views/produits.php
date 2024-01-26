    <link rel="stylesheet" href="./assets/produits.css">
    <title>Produits</title>

<a class="retour" href="?page=admin">Retour</a>

<?php
$dsn = 'mysql:host=localhost;dbname=fast-food';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

$query = $pdo->query('SELECT * FROM products');
$datas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

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
        <?php
            $datas = array(
                array('id' => 1, 'prix_achat' => 2.50, 'prix_vente' => 5.00, 'calories' => 150, 'nom_aliments' => 'Pomme', 'ventes' => 100, 'visibilite' => 'Oui'),
                array('id' => 2, 'prix_achat' => 1.75, 'prix_vente' => 3.50, 'calories' => 200, 'nom_aliments' => 'Carotte', 'ventes' => 75, 'visibilite' => 'Non')
            );

            foreach ($datas as $element) {
                echo '<tr>';
                echo '<td>' . $element['id'] . '</td>';
                echo '<td>' . $element['prix_achat'] . '</td>';
                echo '<td>' . $element['prix_vente'] . '</td>';
                echo '<td>' . $element['calories'] . '</td>';
                echo '<td>' . $element['nom_aliments'] . '</td>';
                echo '<td>' . $element['ventes'] . '</td>';
                echo '<td>' . $element['visibilite'] . '</td>';
                echo '<td><a class="new" href="new.php">NOUVEAU</a></td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>
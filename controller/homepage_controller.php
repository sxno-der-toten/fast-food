<?php 

echo '<section id = card-container>';
$query = "SELECT * FROM categories";
$response = $bdd->query($query);
$datas = $response->fetchAll();

foreach ($datas as $data) {
   

    echo '<div class="cardCategorie">';
    echo '<h2>' . $data['name'] . '</h2>';
    echo '<p >' . $data['description'] . '</p>';
    echo '</div>';
}
echo'</section>';

include 'views/homepage.php'; 
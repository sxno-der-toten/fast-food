<link rel="stylesheet" type="text/css" href="./assets/panier.css">

<body>

    <h1>Panier</h1>
    <div class="panier">
    <ul id="cart-list">
        <?php foreach ($_SESSION['panier'] as $key => $product): ?>
            <li>
                <?= $product['name'] ?> - <?= $product['price'] ?> €
                <button onclick="remove(<?= $key ?>)">Supprimer</button>
                <button onclick="changeQuantity(<?= $key ?>, 'increaseQuantity')">+</button>
                <button onclick="changeQuantity(<?= $key ?>, 'decreaseQuantity')">-</button>
            </li>
        <?php endforeach; ?>
    </ul>
    <button class='bouttons' onclick="remove(event)">Vider le panier</button>
    <button class='bouttons' onclick="checkout()">Commander</button>
    </div>

    <div class='retour-div'>
    <a class ='retour' href="?page=index">Accueil</a>
</div>

</body>
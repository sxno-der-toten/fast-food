<body>

    <h1>Panier</h1>

    <ul id="cart-list">
        <?php foreach ($_SESSION['panier'] as $key => $product): ?>
            <li>
                <?= $product['name'] ?> - <?= $product['price'] ?> €
                <button onclick="removeItemFromCart(<?= $key ?>)">Supprimer</button>
                <button onclick="changeQuantity(<?= $key ?>, 'increaseQuantity')">Plus</button>
                <button onclick="changeQuantity(<?= $key ?>, 'decreaseQuantity')">Moins</button>
            </li>
        <?php endforeach; ?>
    </ul>

    <button onclick="clearCart(event)">Vider le panier</button>
    <button onclick="checkout()">Commander</button>
    
</body>
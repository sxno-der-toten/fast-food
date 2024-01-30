<?php


if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'add':
                if (isset($_POST['product_id'])) {
                    $productId = $_POST['product_id'];
                    addToCart($bdd, $productId);
                }
                break;

            case 'remove':
                if (isset($_POST['product_id'])) {
                    $productId = $_POST['product_id'];
                    removeFromCart($productId);
                }
                break;

            case 'removeItem':
                if (isset($_POST['index'])) {
                    $index = $_POST['index'];
                    removeItemFromCart($index);
                }
                break;

            case 'increaseQuantity':
                if (isset($_POST['index'])) {
                    $index = $_POST['index'];
                    increaseQuantity($index);
                }
                break;

            case 'decreaseQuantity':
                if (isset($_POST['index'])) {
                    $index = $_POST['index'];
                    decreaseQuantity($index);
                }
                break;

            case 'clear':
                clearCart();
                break;

            // Ajoutez d'autres cas selon vos besoins
        }
    }
}



function addToCart($bdd, $productId) {
    // Récupérer les informations du produit depuis la base de données
    $stmt = $bdd->prepare("SELECT * FROM products WHERE id = :product_id");
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        
        $product['quantity'] = 1; 
        $_SESSION['panier'][] = $product;
    }
}


function removeFromCart($productId) {
    foreach ($_SESSION['panier'] as $key => $product) {
        if ($product['id'] == $productId) {
            // Retirer le produit du panier
            unset($_SESSION['panier'][$key]);
            break;
        }
    }
}

function removeItemFromCart($index) {
    if (isset($_SESSION['panier'][$index])) {
        // Retirer l'article spécifique du panier
        unset($_SESSION['panier'][$index]);
    }
}

function increaseQuantity($index) {
    if (isset($_SESSION['panier'][$index])) {
        // Augmenter la quantité de l'article
        $_SESSION['panier'][$index]['quantity']++;
    }
}

function decreaseQuantity($index) {
    if (isset($_SESSION['panier'][$index])) {
        // Diminuer la quantité de l'article, avec une quantité minimale de 1
        $_SESSION['panier'][$index]['quantity'] = max(1, $_SESSION['panier'][$index]['quantity'] - 1);
    }
}

function clearCart() {
    // Vider complètement le panier
    $_SESSION['panier'] = [];
}

require './views/panier.php';

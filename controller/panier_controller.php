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
                    $product_id = $_POST['product_id'];
                    addToCart($bdd, $product_id);
                }
                break;

            case 'remove':
                if (isset($_POST['product_id'])) {
                    $product_id = $_POST['product_id'];
                    removeFromCart($product_id);
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

        }
    }
}



function addToCart($bdd, $product_id) {
    $stmt = $bdd->prepare("SELECT * FROM products WHERE id = :product_id");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        
        $product['quantity'] = 1; 
        $_SESSION['panier'][] = $product;
    }
}


function removeFromCart($product_id) {
    foreach ($_SESSION['panier'] as $key => $product) {
        if ($product['id'] == $product_id) {
            unset($_SESSION['panier'][$key]);
            break;
        }
    }
}

function removeItemFromCart($index) {
    if (isset($_SESSION['panier'][$index])) {
        unset($_SESSION['panier'][$index]);
    }
}

function increaseQuantity($index) {
    if (isset($_SESSION['panier'][$index])) {
        $_SESSION['panier'][$index]['quantity']++;
    }
}

function decreaseQuantity($index) {
    if (isset($_SESSION['panier'][$index])) {
        $_SESSION['panier'][$index]['quantity'] = max(1, $_SESSION['panier'][$index]['quantity'] - 1);
    }
}

function clearCart() {
    // Vider complètement le panier
    $_SESSION['panier'] = [];
}

require './views/panier.php';

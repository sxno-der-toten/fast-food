<?php
require 'connection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Save the itemCount in the session
    $_SESSION['cartItemCount'] = $data['itemCount'];

    echo json_encode(['success' => true]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the cart items from the session
    $cartItemCount = isset($_SESSION['cartItemCount']) ? $_SESSION['cartItemCount'] : 0;

    // You can return the cart items in the response
    echo json_encode(['cartItemCount' => $cartItemCount]);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div id="cartItemCount">0</div>
    <script>
        // Fetch the cart items when the page loads
        $(document).ready(function() {
            fetchCartItems();
        });

        function fetchCartItems() {
            // Fetch the cart items from the server
            fetch('updateCart.php', {
                method: 'GET',
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Update the cart item count on the page
                $('#cartItemCount').text(data.cartItemCount);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
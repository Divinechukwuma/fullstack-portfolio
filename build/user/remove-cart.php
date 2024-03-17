<?php
session_start();

// Check if the cart ID is provided
if (isset($_POST['cartId'])) {
    $cartIdToRemove = $_POST['cartId'];

    // Check if the cart session variable exists
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Find the index of the cart ID to remove
        $index = array_search($cartIdToRemove, $_SESSION['cart']);
        
        // If the cart ID is found, remove it from the cart array
        if ($index !== false) {
            unset($_SESSION['cart'][$index]);
            // If the cart is now empty, unset the session variable
            if (empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
        }
    }
}

// Redirect back to the cart page after removing the item
header("Location: order.php");
exit();
?>
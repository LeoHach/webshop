<?php
// 'delete_cart_item.php' entfernt ein Produkt aus der 'cart' Session basierend auf der Product_ID

session_start();

if (isset($_POST['id'])) {
    $itemId = $_POST['id'];
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $itemId) {
                unset($_SESSION['cart'][$key]);
                echo 'success';
                break;
            }
        }
    }
}

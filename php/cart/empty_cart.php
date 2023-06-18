<?php
// 'empty_cart.php' leert die komplette 'cart' Session und generiert ein leeren Cart
// 'generate_cart.php' wird benutzt um aus den Cart zu rendern

session_start();

$_SESSION['cart'] = array();

include 'generate_cart.php';
echo generateCart();

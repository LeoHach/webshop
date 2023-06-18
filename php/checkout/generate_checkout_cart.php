<?php
// 'generate_checkout_cart' generiert den Warenkorb auf der 'checkout.php' Seite
// 'generate_cart.php' wird benutzt um aus den Cart zu rendern
session_start();
include '../cart/generate_cart.php';

//Cart wird gerendered
echo generateCart();

<?php
session_start();

$_SESSION['cart'] = array();

include 'generate_cart.php';
echo generateCart();

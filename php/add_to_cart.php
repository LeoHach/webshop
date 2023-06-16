<?php
session_start();

$itemID = $_POST['id'];
$itemPrice = $_POST['price'];
$itemName = $_POST['name'];
$itemBrand = $_POST['brand'];
$itemPicture = $_POST['picture'];

include 'generate_cart.php';

$_SESSION['cart'][] = array('id' => $itemID, 'name' => $itemName, 'price' => $itemPrice, 'brand' => $itemBrand, 'picture' => $itemPicture);

echo generateCart();

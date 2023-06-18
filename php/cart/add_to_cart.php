<?php
// 'add_to_cart.php' erhält die relevanten Produktinformationen
// Die Informationen werden der 'cart' Session hinzugefügt
// 'generate_cart.php' wird benutzt um aus den Cart zu rendern

session_start();
include 'generate_cart.php';

//Produktinformationen
$itemID = $_POST['id'];
$itemPrice = $_POST['price'];
$itemName = $_POST['name'];
$itemBrand = $_POST['brand'];
$itemPicture = $_POST['picture'];

//Die Informationen werdem dem Session-Array 'cart' hinzugefügt
$_SESSION['cart'][] = array('id' => $itemID, 'name' => $itemName, 'price' => $itemPrice, 'brand' => $itemBrand, 'picture' => $itemPicture);

//Cart_Element wird gerendered
echo generateCart();

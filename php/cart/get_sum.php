<?php
// 'get_sum.php' gibt den aktuellen Warenwert der Produkte im Cart wieder
session_start();

$sum = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $sum += $item['price'];
    }
}

echo $sum;

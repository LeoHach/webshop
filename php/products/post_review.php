<?php
// 'post_review.php' speichert die Review zu einem Produkt in die Datenbank
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

require_once('../database/db_connection.php');
session_start();

$user_ID = $_SESSION['userID'];
$customer_ID = $_SESSION['customerID'];

$productID = $_POST['single_product_id'];
$comment = $_POST['single_product_comment_field'];
$rating = $_POST['single_product_comment_rating'];

// Die SQL Query prüft ob der Nutzer das Produkt gekauft hat oder nicht 
$bought_query = "SELECT o.Customer_ID, oi.Product_ID
                 FROM orders o
                 INNER JOIN ordered_items oi ON o.Order_ID = oi.Order_ID
                 WHERE o.Customer_ID = $customer_ID
                 AND oi.Product_ID = $productID";

$bought_result = mysqli_query($conn, $bought_query);

// Wurde es gekauft erhält $bought den Wert 1 sonst 0
if ($row = mysqli_fetch_assoc($bought_result) > 0) {
    $bought = 1;
} else {
    $bought = 0;
}

// Es wird das aktuelle Datum und Zeit erfasst
$timestamp = time();

$comment_query = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES ($user_ID, $productID, $bought, $rating, '$comment', FROM_UNIXTIME($timestamp))";
mysqli_query($conn, $comment_query);

$product_query = "SELECT RatingScore, NoRating FROM products WHERE Product_ID = $productID";
$product_result = mysqli_query($conn, $product_query);
$product_row = mysqli_fetch_assoc($product_result);

$productRatingScore = $product_row['RatingScore'];
$productNoRating = $product_row['NoRating'];

// Es wird die neue durchschnittliche Bewertung errechnet 
$newAvgRating = ($productRatingScore + $rating) / ($productNoRating + 1);

$update_product_query = "UPDATE products SET AvgRating = $newAvgRating, NoRating = NoRating + 1, RatingScore = RatingScore + $rating WHERE Product_ID = $productID";
mysqli_query($conn, $update_product_query);

mysqli_close($conn);

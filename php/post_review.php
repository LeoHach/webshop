<?php
require_once('db_connection.php');
session_start();
$user_ID = $_SESSION['userID'];
$customer_ID = $_SESSION['customerID'];

$productID = $_POST['single_product_id'];
$comment = $_POST['single_product_comment_field'];
$rating = $_POST['single_product_comment_rating'];

$bought_query = "SELECT o.Customer_ID, oi.Product_ID
                 FROM orders o
                 INNER JOIN ordered_items oi ON o.Order_ID = oi.Order_ID
                 WHERE o.Customer_ID = $customer_ID
                 AND oi.Product_ID = $productID";

$bought_result = mysqli_query($conn, $bought_query);

if ($row = mysqli_fetch_assoc($bought_result) > 0) {
    $bought = 1;
} else {
    $bought = 0;
}

$timestamp = time();

$comment_query = "INSERT INTO reviews (User_ID, Product_ID, Bought, Rating, Review, Date) VALUES ($user_ID, $productID, $bought, $rating, '$comment', FROM_UNIXTIME($timestamp))";
mysqli_query($conn, $comment_query);

$product_query = "SELECT RatingScore, NoRating FROM products WHERE Product_ID = $productID";
$product_result = mysqli_query($conn, $product_query);
$product_row = mysqli_fetch_assoc($product_result);

$productRatingScore = $product_row['RatingScore'];
$productNoRating = $product_row['NoRating'];

$newAvgRating = ($productRatingScore + $rating) / ($productNoRating + 1);

$update_product_query = "UPDATE products SET AvgRating = $newAvgRating, NoRating = NoRating + 1, RatingScore = RatingScore + $rating WHERE Product_ID = $productID";
mysqli_query($conn, $update_product_query);

mysqli_close($conn);

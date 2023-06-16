<?php
require_once('db_connection.php');
session_start();

$customer_ID = $_SESSION['customerID'];

$sql = "SELECT * FROM customers WHERE Customer_ID = $customer_ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
mysqli_close($conn);

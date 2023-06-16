<?php
require_once('db_connection.php');
$data = array();

$sql = "SELECT DATE_FORMAT(o.Date, '%d.%m.%Y') AS OrderDate, FORMAT(SUM(oi.Price),2) AS TotalPrice
        FROM orders o
        JOIN ordered_items oi ON o.Order_ID = oi.Order_ID
        WHERE o.Date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
        GROUP BY OrderDate";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $orderDate = $row['OrderDate'];
    $totalPrice = $row['TotalPrice'];
    $data[$orderDate] = $totalPrice;
}

mysqli_close($conn);

echo json_encode($data);

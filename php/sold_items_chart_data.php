<?php
require_once('db_connection.php');
$data = array();

$sql = "SELECT DATE_FORMAT(orders.Date, '%d.%m.%Y') AS OrderDate, COUNT(*) AS ItemCount
        FROM ordered_items
        INNER JOIN orders ON ordered_items.Order_ID = orders.Order_ID
        WHERE orders.Date >= CURDATE() - INTERVAL 6 DAY
        AND orders.Date <= CURDATE()
        GROUP BY Date";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $orderDate = $row['OrderDate'];
    $totalCount = $row['ItemCount'];
    $data[$orderDate] = $totalCount;
}

mysqli_close($conn);

echo json_encode($data);

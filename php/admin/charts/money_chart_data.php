<?php
// 'money_chart_data.php' liefert die Daten für die Umsatzstatistik auf der 'admin.php' Seite
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

require_once('../../database/db_connection.php');
$data = array();

// Mit dieser SQL Abfrage erhält man die Summe der Umsätze der letzten 7 Tage
$sql = "SELECT DATE_FORMAT(o.Date, '%d.%m.%Y') AS OrderDate, FORMAT(SUM(oi.Price),2) AS TotalPrice
        FROM orders o
        JOIN ordered_items oi ON o.Order_ID = oi.Order_ID
        WHERE o.Date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
        GROUP BY OrderDate";

$result = mysqli_query($conn, $sql);

// $data wird mit Datenpaaren [$orderDate][$totalPrice] gefüllt
while ($row = mysqli_fetch_assoc($result)) {
    $orderDate = $row['OrderDate'];
    $totalPrice = $row['TotalPrice'];
    $data[$orderDate] = $totalPrice;
}

mysqli_close($conn);

// $data wird als json ausgegeben 
echo json_encode($data);

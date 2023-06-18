<?php
// 'sold_items_chart_data.php' liefert die Daten für die Statistik wie viele Prdukte geakuft wurden
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

require_once('../../database/db_connection.php');
$data = array();

// Die SQL Query fragt die Anzahl der Produkte ab die in den letzten 7 Tagen verkauft wurden
$sql = "SELECT DATE_FORMAT(orders.Date, '%d.%m.%Y') AS OrderDate, COUNT(*) AS ItemCount
        FROM ordered_items
        INNER JOIN orders ON ordered_items.Order_ID = orders.Order_ID
        WHERE orders.Date >= CURDATE() - INTERVAL 6 DAY
        AND orders.Date <= CURDATE()
        GROUP BY Date";

$result = mysqli_query($conn, $sql);

// $data wird mit Datenpaaren [$orderDate][$totalCount] gefüllt
while ($row = mysqli_fetch_assoc($result)) {
    $orderDate = $row['OrderDate'];
    $totalCount = $row['ItemCount'];
    $data[$orderDate] = $totalCount;
}

mysqli_close($conn);

// $data wird als json ausgegeben 
echo json_encode($data);

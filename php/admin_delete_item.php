<?php
require_once('db_connection.php');

if (isset($_POST['id'])) {
    $itemID = $_POST['id'];
    $sql = "DELETE FROM products WHERE Product_ID = '$itemID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}

mysqli_close($conn);

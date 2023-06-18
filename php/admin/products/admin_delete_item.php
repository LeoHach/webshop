<?php
// 'admin_delete_item.php' löscht ein Produkt aus der Datenbank wenn '.admin_item_delete' auf einem Produkt geklickt wird 
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

require_once('../../database/db_connection.php');

if (isset($_POST['id'])) {
    //Product_Id vom Produkt das gelöscht werdens soll
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

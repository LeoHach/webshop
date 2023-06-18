<?php
// 'admin_add_product.php' wird durch eine AJAX Request aufgerufen und speichert ein neues Produkt in products
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

require_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Produktinformationen des neuen Produkts
    $productName = $_POST['add_item_name'];
    $productBrand = $_POST['add_item_brand'];
    $productPrice = $_POST['add_item_price'];
    $productStock = $_POST['add_item_stock'];
    $productDescription = $_POST['add_item_description'];

    // Zielordner zum lokalen Speichern des Bildes
    $targetDir = "../src/images/productpictures/";

    // Name des Bildes
    $fileName = basename($_FILES["admin_add_item_upload"]["name"]);

    // Kompletter Pfad für das Bild in der Ordnerstruktur
    $target_file = $targetDir . $fileName;

    // Flag welche bestimmt ob das Bild den Anforderungen entspricht und hochgeladen werden kann
    $uploadOk = 1;

    // Dateiendung wird erhoben und in lower case umgewandelt
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Es wird geprüft ob ein Bild eingetroffen ist
    $check = getimagesize($_FILES["admin_add_item_upload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Es wird geprüft ob ein Bild mit gleichem Namen existiert
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Es wird geprüft ob das Bild eine valide Dateiendung hat 
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    // Wenn alles gut lief ($uploadOk == 1) wird das Produkt der Datenbank hinzugefügt
    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($_FILES["admin_add_item_upload"]["tmp_name"], $target_file)) {
            $picturePath = "../src/images/productpictures/" . $fileName;
            $sql = "INSERT INTO products (Name, Brand, Price, Stock, AvgRating, NoRating, RatingScore, Description, Picture) VALUES ('$productName','$productBrand', $productPrice, $productStock, 0, 0, 0,'$productDescription','$picturePath')";
            mysqli_query($conn, $sql);
        }
    }
}

mysqli_close($conn);

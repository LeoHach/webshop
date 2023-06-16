<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_ID = $_POST['admin_item_id'];
    $productName = $_POST['add_item_name'];
    $productBrand = $_POST['add_item_brand'];
    $productPrice = $_POST['add_item_price'];
    $productStock = $_POST['add_item_stock'];
    $productDescription = $_POST['add_item_description'];

    $targetDir = "../src/images/productpictures/";
    $fileName = basename($_FILES["admin_add_item_upload"]["name"]);
    $target_file = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["admin_add_item_upload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    ) {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($_FILES["admin_add_item_upload"]["tmp_name"], $target_file)) {
            $picturePath = "../src/images/productpictures/" . $fileName;
            $sql = "UPDATE products SET Name = '$productName', Brand = '$productBrand', Price = $productPrice, Stock = $productStock, Description = '$productDescription', Picture = '$picturePath' WHERE Product_ID = $product_ID";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
    }
}

<?php
session_start();
echo generate_user_products();

function generate_user_products()
{
    require_once('db_connection.php');
    $customer_ID = $_SESSION['customerID'];
    $userProducts = '';
    $query = "SELECT o.Order_ID, oi.Product_ID, DATE_FORMAT(o.Date, '%d.%m.%y') AS Date, p.Name, p.Brand, p.Price, p.Stock, p.Picture
              FROM orders o
              JOIN ordered_items oi ON o.Order_ID = oi.Order_ID
              JOIN products p ON oi.Product_ID = p.Product_ID
              WHERE o.Customer_ID = $customer_ID";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $productPicture = $row['Picture'];
        $productName = $row['Name'];
        $productBrand = $row['Brand'];
        $productPrice = $row['Price'];
        $boughtDate = $row['Date'];

        $userProducts .= '
        <div class="user_product_item">
            <div class="admin_item_part">
                <img src="' . $productPicture . '" class="admin_product_item_picture">
                <div class="admin_item_text_container">
                    <span class="admin_item_text admin_item_text_top">' . $productName . '</span>
                    <span class="admin_item_text">' . $productBrand . '</span>
                </div>
                <div class="admin_item_text_container">
                    <span class="admin_item_text admin_item_text_top">Preis: ' . $productPrice . '€</span>
                    <span class="admin_item_text ">Gekauft: ' . $boughtDate . '</span>
                </div>
            </div>
        </div>
        ';
    }
    return $userProducts;
    mysqli_close($conn);
}

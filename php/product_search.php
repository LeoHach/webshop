<?php
require_once('db_connection.php');

$query = $_POST['query'];

$sql = "SELECT * FROM products WHERE Name LIKE '%$query%'";
$result = mysqli_query($conn, $sql);

$html = '';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productID = $row['Product_ID'];
        $productPicture = $row['Picture'];
        $productName = $row['Name'];
        $productBrand = $row['Brand'];
        $productPrice = $row['Price'];
        $productStock = $row['Stock'];

        $html .= '<a class="search_result_item" href="product.php?product_id=' . $productID . '">
                    <img src="' . $productPicture . '" class="search_result_picture">
                    <div class="search_result_name_brand">
                        <span class="search_result_name search_result_text search_result_big">' . $productName . '</span>
                        <span class="search_result_brand search_result_text">' . $productBrand . '</span>
                    </div>
                    <div class="search_result_price_stock">
                        <span class="search_result_price search_result_text search_result_middle">' . $productPrice . '€</span>
                        <span class="search_result_stock search_result_text search_result_middle">Auf Lager: ' . $productStock . '</span>
                    </div>
                </a>
        ';
    }
} else {
    $html .= '<span>Kein Produkt mit dem Namen vorhanden</span>';
}

mysqli_close($conn);

echo $html;

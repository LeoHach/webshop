<?php
// 'get_products.php' lädt alle Produkte aus der Datenbank und stellt sie als HTML dar und gibt sie auf der 'index.php' aus
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut
require_once('../php/database/db_connection.php');

$query = "SELECT * FROM products WHERE Stock > 0";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $productID = $row['Product_ID'];
    $productPicture = $row['Picture'];
    $productName = $row['Name'];
    $productBrand = $row['Brand'];
    $productPrice = $row['Price'];
    $productStock = $row['Stock'];
    $productAvgRating = $row['AvgRating'];
    $productNoRating = $row['NoRating'];

    // Um die Sternebewertung anzuzeigen wird die Bewertung gerundet
    $roundedRating = round($productAvgRating * 2) / 2;
    $stars = '';

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $roundedRating) {
            $stars .= '<i class="material-symbols-outlined md-36 star_filled rating_star">star</i>';
        } elseif ($i - 0.5 === $roundedRating) {
            $stars .= '<i class="material-symbols-outlined md-36 star_half rating_star">star_half</i>';
        } else {
            $stars .= '<i class="material-symbols-outlined md-36 star_empty rating_star">star</i>';
        }
    }

    echo '
    <div class="product_component_wrapper">
        <img src="' . $productPicture . '" class="product_component_picture" id="product_component_picture">
        <div class="product_component_details_wrapper">
            <div class="product_name_brand">
                <span class="product_component_name product_component_text" id="product_component_name">' . $productName . '</span>
                <span class="product_component_brand product_component_text" id="product_component_brand">' . $productBrand . '</span>
            </div>
            <div class="product_component_rating">
                <div class="product_component_stars">
                    ' . $stars . '
                </div>
                <span class="product_component_rating_amount product_component_text" id="product_component_rating_amount">(' . $productNoRating . ')</span>
            </div>
            <div class="product_component_price_stored">
                <span class="product_component_price product_component_text">' . $productPrice . '€</span>
                <span class="product_component_stored product_component_text">Auf Lager: ' . $productStock . '</span>
            </div>
            <div class="product_component_buttons">
                <a class="product_component_button product_component_more_infos_button" href="product.php?product_id=' . $productID . '">Mehr Infos</a>
                <button class="product_component_button product_component_add_to_card" data-id="' . $productID . '" data-price="' . $productPrice . '" data-name ="' . $productName . '" data-brand ="' . $productBrand . '" data-picture ="' . $productPicture . '">
                    <span class="material-symbols-outlined">add_shopping_cart</span>
                </button>
            </div>
        </div>
    </div>
    ';
}
mysqli_close($conn);

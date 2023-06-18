<?php
// 'admin_show_products.php' renderd alle Produkte die in der Datenbank vorhanden sind
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

// Rückgabe an die AJAX Request
echo generate_admin_products();

// 'generate_admin_products()' holt sich alle Produkte aus der Datenbank und rendered sie alle zu einem HTML Element das zurückgegeben wird
function generate_admin_products()
{
    require_once('../../database/db_connection.php');

    // Speichert die finale HTML Ausgabe
    $adminProducts = '';

    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        // Produktinformationen aus der Datenbank
        $productID = $row['Product_ID'];
        $productPicture = $row['Picture'];
        $productName = $row['Name'];
        $productBrand = $row['Brand'];
        $productPrice = $row['Price'];
        $productStock = $row['Stock'];
        $productDescription = $row['Description'];

        // Jedes Produkt wird $adminProducts als HTML Element hinzugefügt bis alle Produkte aus der Datenbank durchlaufen wurden
        $adminProducts .= '
        <div class="admin_product_item">
            <div class="admin_item_part">
                <img src="' . $productPicture . '" class="admin_product_item_picture">
                <div class="admin_item_text_container">
                    <span class="admin_item_text admin_item_text_top">' . $productName . '</span>
                    <span class="admin_item_text">' . $productBrand . '</span>
                </div>
                <div class="admin_item_text_container">
                    <span class="admin_item_text admin_item_text_top">Preis: ' . $productPrice . '€</span>
                    <span class="admin_item_text">Auf Lager: ' . $productStock . '</span>
                </div>
            </div>
            <div class="admin_item_part product_icons">
                <button class="admin_item_icon admin_item_edit" data-id="' . $productID . '" data-name="' . $productName . '" data-brand="' . $productBrand . '" data-price="' . $productPrice . '" data-stock="' . $productStock . '" data-description="' . $productDescription . '" data-picture="' . $productPicture . '">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#253237">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </button>
                <button class="admin_item_icon admin_item_delete" data-id="' . $productID . '">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#253237">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        ';
    }

    // Ausgabe der Liste von HTML Elementen
    return $adminProducts;
    mysqli_close($conn);
}

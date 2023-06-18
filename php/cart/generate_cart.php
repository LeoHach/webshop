<?php
// 'generate_cart.php' enthält die function 'generateCart()' welche von den cart scripts aufgerufen wird 
// um die HTML Elemente von den Cart Elementen zu rendern

function generateCart()
{
    // $cartItems erhält entweder die Daten von der 'cart' Session wenn sie gesetzt ist oder ein leeres array
    $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $cartHTML = '';
    foreach ($cartItems as $item) {
        $cartHTML .= '
        <div class="cart_item">
            <img src="' . $item['picture'] . '" class="cart_picture">
            <div class="cart_name_brand">
                <span class="cart_name">' . $item['name'] . '</span>
                <span class="cart_brand">' . $item['brand'] . '</span>
            </div>
            <span class="cart_price">' . $item['price'] . '€</span>
            <button class="cart_delete_button" data-id="' . $item['id'] . '">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="20" height="20" stroke-width="1.5" stroke="#253237">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>';
    }
    return $cartHTML;
}

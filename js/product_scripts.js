$(document).ready(function () {
    $('.rating_stars').on('mouseover', function () {
        var ratingValue = $(this).data('value');
        fillStars(ratingValue);
    });

    $('.rating_stars').on('mouseout', function () {
        var currentRating = $('#single_product_comment_rating').val();
        fillStars(currentRating);
    });

    $('.rating_stars').on('click', function () {
        var ratingValue = $(this).data('value');
        $('#single_product_comment_rating').val(ratingValue);
        fillStars(ratingValue);
    });

    function fillStars(rating) {
        $('.rating_stars').each(function () {
            var starValue = $(this).data('value');
            if (starValue <= rating) {
                $(this).removeClass('star_empty_rating').addClass('star_filled_rating');
            } else {
                $(this).removeClass('star_filled_rating').addClass('star_empty_rating');
            }
        });
    }

    $("#review_form").submit(function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../php/post_review.php",
            data: $(this).serialize(),
            success: function () {
                location.reload();
            }
        });
    });

    $('#single_product_add_to_cart').click(function () {
        var itemID = $(this).data('id');
        var itemPrice = parseFloat($(this).data('price'));
        var itemName = $(this).data('name');
        var itemBrand = $(this).data('brand');
        var itemPicture = $(this).data('picture');
        $.ajax({
            url: '../php/add_to_cart.php',
            method: 'POST',
            data: { id: itemID, price: itemPrice, name: itemName, brand: itemBrand, picture: itemPicture },
            success: function (response) {
                $('#cart_items').html(response);
                updateSum();
            }
        });
    });

    function updateSum() {
        $.ajax({
            url: '../php/get_sum.php',
            method: 'GET',
            success: function (response) {
                $('#cart_price_text').text(response + '€');
            }
        });
    }
});
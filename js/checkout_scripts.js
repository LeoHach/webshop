$(document).ready(function () {
    $.ajax({
        url: '../php/checkout/generate_checkout_cart.php',
        method: 'GET',
        success: function (response) {
            $('#checkout_cart').html(response);
        }
    });
    $.ajax({
        url: '../php/cart/get_sum.php',
        method: 'GET',
        success: function (response) {
            $('#checkout_sum').text(response + '€');
        }
    });

    $.ajax({
        url: '../php/user/get_credentials.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#checkout_title').val(response.Title);
            $('#checkout_name').val(response.Name);
            $('#checkout_surname').val(response.Surname);
            $('#checkout_street').val(response.Street);
            $('#checkout_number').val(response.Number);
            $('#checkout_city').val(response.City);
            $('#checkout_zipcode').val(response.Zipcode);
        }
    });

    $("#buy_form").submit(function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../php/checkout/checkout_buy.php",
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                window.location.href = '../pages/index.php';
            }
        });
    });
});
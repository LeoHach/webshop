$(document).ready(function () {
    $.ajax({
        url: '../php/database/installDB.php',
        method: 'GET',
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });

    $('.header_icon').hover(
        function () {
            $(this).css('transition', 'stroke 0.5s ease').attr('stroke', '#253237');
        },
        function () {
            $(this).css('transition', 'stroke 0.5s ease').attr('stroke', '#ffffff');
        }
    );

    $('.header_text').hover(
        function () {
            $(this).css('transition', 'color 0.5s ease').css('color', '#253237');
        },
        function () {
            $(this).css('transition', 'color 0.5s ease').css('color', '#ffffff');
        }
    );

    $('.dropdown_buttons').hover(
        function () {
            $(this).css('transition', 'background-color 0.5s ease').css('background-color', '#253237');
            $(this).css('transition', 'color 0.5s ease').css('color', '#ffffff');
        },
        function () {
            $(this).css('transition', 'background-color 0.5s ease').css('background-color', '#c2dfe3');
            $(this).css('transition', 'color 0.5s ease').css('color', '#253237');
        }
    );

    $('.header_mobile_logout_button').hover(
        function () {
            $(this).css('transition', 'background-color 0.5s ease').css('background-color', '#253237');
            $(this).css('transition', 'color 0.5s ease').css('color', '#ffffff');
        },
        function () {
            $(this).css('transition', 'background-color 0.5s ease').css('background-color', '#5c6b73');
            $(this).css('transition', 'color 0.5s ease').css('color', '#ffffff');
        }
    );

    $('.product_component_button').hover(
        function () {
            $(this).css('transition', 'background-color 0.5s ease').css('background-color', '#253237');
        },
        function () {
            $(this).css('transition', 'background-color 0.5s ease').css('background-color', '#9db4c0');
        }
    );

    $('.checkout_button, #single_product_add_to_cart, .user_data_buttons').hover(
        function () {
            $(this).css('transition', 'background-color 0.5s ease').css('background-color', '#c2dfe3');
            $(this).css('transition', 'color 0.5s ease').css('color', '#253237');
        },
        function () {
            $(this).css('transition', 'background-color 0.5s ease').css('background-color', '#9db4c0');
            $(this).css('transition', 'color 0.5s ease').css('color', '#ffffff');
        }
    );

    var loginFormOpen = false;
    var registerFormOpen = false;
    var cartOpen = false;

    $('#header_login_button, #checkout_login').on('click', function () {
        if (cartOpen == true) {
            $("#header_shopping_cart").slideUp();
            cartOpen = false;
        }

        if (loginFormOpen == false && registerFormOpen == false) {
            $("#login_form").slideDown();
            $('#login_form').css('display', 'flex');
            loginFormOpen = true;
        } else if (loginFormOpen == true || registerFormOpen == true) {
            $("#register_form").slideUp();
            registerFormOpen = false;
            $("#login_form").slideUp();
            loginFormOpen = false;
        }
    });

    $("#header_cart").click(function () {
        if (loginFormOpen == true || registerFormOpen == true) {
            $("#register_form").slideUp();
            registerFormOpen = false;
            $("#login_form").slideUp();
            loginFormOpen = false;
        }
        if (cartOpen == false) {
            $("#header_shopping_cart").slideDown();
            $('#header_shopping_cart').css('display', 'fixed');
            $.ajax({
                url: '../php/add_to_checkout.php',
                method: 'GET',
                success: function (response) {
                    $('#cart_items').html(response);
                    updateSum();
                }
            });
            cartOpen = true;
        } else if (cartOpen == true) {
            $("#header_shopping_cart").slideUp();
            cartOpen = false;
        }
    });

    $('#header_logout_button, #header_mobile_logout_button').on('click', function () {
        $.ajax({
            url: '../php/login_register/logout.php',
            type: 'POST',
            success: function (response) {
                window.location.href = '../pages/index.php';
            }
        });
    });

    $('#header_user').on('click', function () {
        window.location = "../pages/user.php";
    });

    $('.login_register').click(function () {
        $('#login_form').hide();
        $('#register_form').show();
        $('#register_form').css('display', 'flex');

        $('#mobile_login_form').hide();
        $('#mobile_register_form').show();
        $('#mobile_register_form').css('display', 'flex')
        registerFormOpen = true;
        loginFormOpen = false;
    });

    $(".register_login").click(function () {
        $('#register_form').hide();
        $('#login_form').show();
        $('#login_form').css('display', 'flex');

        $('#mobile_register_form').hide();
        $('#mobile_login_form').show();
        $('#mobile_login_form').css('display', 'flex');
        loginFormOpen = true;
        registerFormOpen = false;

    });

    checkWindowWidth();
    $(window).resize(function () {
        checkWindowWidth();
    });

    function checkWindowWidth() {
        var windowWidth = $(window).width();
        if (windowWidth > 768) {
            $('#header_searchbar').css('display', 'flex');
            $('#header_mobile_menu').css('display', 'none');
            mobile_menu_open = false;
        } else {
            $('#header_searchbar').css('display', 'none');
            $('#header_mobile_menu').css('display', 'none');
            $('#login_form').css('display', 'none');
            $('#regsiter_form').css('display', 'none');
            $('#header_shopping_cart').css('display', 'none');
            loginFormOpen = false;
            registerFormOpen = false;

        }
    }
    $("#header_search").click(function () {
        $('#header_search').css('display', 'none');
        $('#header_back').css('display', 'block');
        $('#header_searchbar').css('display', 'flex').css('width', '400px');
        $('#header_icon').css('display', 'none');
        $('#header_menu').css('display', 'none');
    });

    $("#header_back").click(function () {
        $('#header_back').css('display', 'none');
        $('#header_icon').css('display', 'flex');
        $('#header_searchbar').css('display', 'none');
        $('#header_search').css('display', 'block');
        $('#header_menu').css('display', 'block');
    });

    $('.product_component_add_to_card').click(function () {
        var itemID = $(this).data('id');
        var itemPrice = parseFloat($(this).data('price'));
        var itemName = $(this).data('name');
        var itemBrand = $(this).data('brand');
        var itemPicture = $(this).data('picture');
        $.ajax({
            url: '../php/cart/add_to_cart.php',
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
            url: '../php/cart/get_sum.php',
            method: 'GET',
            success: function (response) {
                $('#cart_price_text').text(response + '€');
                $('#mobile_cart_price_text').text(response + '€')
            }
        });
    }

    $('#cart_button_empty, #mobile_cart_button_empty').click(function () {
        $.ajax({
            url: '../php/cart/empty_cart.php',
            method: 'POST',
            success: function (response) {
                $('#cart_items').html(response);
                $('#cart_price_text').text('0.00€');
                $('#mobile_cart').html(response);
                $('#mobile_cart_price_text').text('0.00€');
            }
        });
    });

    $(document).on('click', '.cart_delete_button', function () {
        var itemID = $(this).data('id');
        var itemToDelete = $(this).closest('.cart_item');
        $.ajax({
            url: '../php/cart/delete_cart_item.php',
            method: 'POST',
            data: { id: itemID },
            success: function (response) {
                if (response == 'success') {
                    itemToDelete.remove();
                    updateSum();
                } else {
                    alert('Fehler beim löschen des Produkts');
                }
            }
        });
    });


    var mobile_menu_open = false;
    $('#header_menu').click(function () {
        if (mobile_menu_open) {
            $('#header_mobile_menu').css('display', 'none');
            $('#mobile_login_form').css('display', 'none');
            $('#mobile_register_form').css('display', 'none');
            if (mobile_login_register_open) {
                $('#mobile_login_register_arrow').toggleClass('rotate');
            }
            $('.mobile_cart_wrapper').css('display', 'none');
            if (mobile_cart_open) {
                $('#mobile_cart_arrow').toggleClass('rotate');
            }


            mobile_menu_open = false;
            mobile_cart_open = false;
            mobile_login_register_open = false;
        } else {
            $('#header_mobile_menu').css('display', 'flex');
            mobile_menu_open = true;
        }
    });

    $('#header_searchbar').keyup(function () {
        var query = $(this).val();

        if (query.trim() === '') {
            $('#header_search_result').hide();
            return;
        }

        $.ajax({
            url: '../php/products/product_search.php',
            method: 'POST',
            data: { query: query },
            success: function (response) {
                $('#header_search_result').html(response);
                $('#header_search_result').show();
            }
        });
    });
    $(document).click(function (event) {
        if (!$('#header_searchbar').is(event.target) && !$('#header_search_result').is(event.target) && $('#header_searchbar').has(event.target).length === 0 && $('#header_search_result').has(event.target).length === 0) {
            $('#header_search_result').hide();
        }

    });

    $('#header_admin').click(function () {
        window.location = "../pages/admin.php";
    });

    mobile_cart_open = false;
    $('#header_mobile_menu_cart').click(function () {
        if (mobile_cart_open == false) {
            mobile_cart_open = true;
            $('#mobile_cart_arrow').toggleClass('rotate');
            $.ajax({
                url: '../php/add_to_checkout.php',
                method: 'GET',
                success: function (response) {
                    $('#mobile_cart').html(response);
                    $('.mobile_cart_wrapper').css('display', 'flex');
                    updateSum();
                }
            });
        } else {
            mobile_cart_open = false;
            $('#mobile_cart_arrow').toggleClass('rotate');
            $('#mobile_cart').html('');
            $('.mobile_cart_wrapper').css('display', 'none');
        }
    });

    mobile_login_register_open = false;
    $('#header_mobile_menu_login_register').click(function () {
        if (mobile_login_register_open == false) {
            mobile_login_register_open = true;
            $('#mobile_login_register_arrow').toggleClass('rotate');
            $('#mobile_login_form').css('display', 'flex');
        } else {
            mobile_login_register_open = false;
            $('#mobile_login_register_arrow').toggleClass('rotate');
            $('#mobile_login_form').css('display', 'none');
            $('#mobile_register_form').css('display', 'none');
        }
    });

});
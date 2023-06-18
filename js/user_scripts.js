$(document).ready(function () {
    $.ajax({
        url: '../php/user/get_credentials.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#user_data_title').val(response.Title);
            $('#user_data_name').val(response.Name);
            $('#user_data_surname').val(response.Surname);
            $('#user_data_street').val(response.Street);
            $('#user_data_number').val(response.Number);
            $('#user_data_city').val(response.City);
            $('#user_data_zipcode').val(response.Zipcode);
        }
    });

    $.ajax({
        url: '../php/user/get_user_data.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#user_data_username').val(response.Username);
            $('#user_data_email').val(response.Email);
            $('#user_data_picture').attr('src', response.Picture);
        }
    });

    $('#user_data_change').click(function (event) {
        event.preventDefault();
        if ($(this).text() === 'Anpassen') {
            $(this).text('Abbruch');
            $('#user_data_done').show();
            $('input[readonly]').prop('readonly', false);

        } else {
            $(this).text('Anpassen');
            $('#user_data_done').hide();
            $('input[readonly]').prop('readonly', true);
        }
    });

    $('.user_picture_overlay').click(function () {
        $('#user_data_picture_upload').click();
    });

    $('#user_data_change_form').submit(function (event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            method: "POST",
            url: "../php/users/user_change_data.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#user_data_change').text('Anpassen');
                $('#user_data_done').hide();
                $('input[readonly]').prop('readonly', true);
                console.log(response);
            }
        });
    });

    var products_open = false
    $('#user_show_prodcuts_button').click(function () {
        if (products_open == false) {
            products_open = true;
            $(this).toggleClass('rotate');
            $.ajax({
                url: '../php/user/user_show_products.php',
                method: 'GET',
                success: function (response) {
                    $('#user_bought_items').html(response);
                }
            });
        } else {
            products_open = false;
            $(this).toggleClass('rotate');
            $('#user_bought_items').html('');
        }
    });

    var comments_open = false
    $('#user_show_comments_button').click(function () {
        if (comments_open == false) {
            comments_open = true;
            $(this).toggleClass('rotate');
            $.ajax({
                url: '../php/user/user_show_comments.php',
                method: 'GET',
                success: function (response) {
                    $('#user_comments').html(response);
                }
            });
        } else {
            comments_open = false;
            $(this).toggleClass('rotate');
            $('#user_comments').html('');
        }
    });
});
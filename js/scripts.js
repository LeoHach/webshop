$(document).ready(function () {
    $.ajax({
        url: '../php/installDB.php',
        type: 'GET',
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

    $('#header_user').on('click', function () {
        $("#login_form").slideDown();
        $('#login_form').css('display', 'flex')
    });

    $('#login_register').click(function () {
        //$('#login_form').html($('#register_form').html());
        $('#login_form').hide();
        $('#register_form').show();
        $('#register_form').css('display', 'flex')
    });

    $("#register_login").click(function () {
        //$('#register_form').html($('#login_form').html());
        $('#login_form').show();
        $('#register_form').hide();
        $('#login_form').css('display', 'flex')

    });

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
});
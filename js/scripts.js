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

    var loginFormOpen = false;
    var registerFormOpen = false;

    $('#header_user').on('click', function () {
        if (loginFormOpen == false && registerFormOpen == false) {
            $("#login_form").slideDown();
            $('#login_form').css('display', 'flex')
            loginFormOpen = true;
        } else if (loginFormOpen == true || registerFormOpen == true) {
            $("#register_form").slideUp();
            registerFormOpen = false;
            $("#login_form").slideUp();
            loginFormOpen = false;
        }
    });

    $('#login_register').click(function () {
        $('#login_form').hide();
        $('#register_form').show();
        $('#register_form').css('display', 'flex')
        registerFormOpen = true;
        loginFormOpen = false;
    });

    $("#register_login").click(function () {
        $('#register_form').hide();
        $('#login_form').show();
        $('#login_form').css('display', 'flex')
        loginFormOpen = true;
        registerFormOpen = false;

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
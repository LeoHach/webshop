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

    $('.header_text').hover(
        function () {
            $(this).css('transition', 'color 0.5s ease').css('color', '#253237');
        },
        function () {
            $(this).css('transition', 'color 0.5s ease').css('color', '#ffffff');
        }
    );

    var loginFormOpen = false;
    var registerFormOpen = false;


    $('#header_login_button').on('click', function () {
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

    $('#header_logout_button').on('click', function () {
        $.ajax({
            url: '../php/logout.php',
            type: 'POST',
            success: function (response) {
                window.location.href = '../pages/index.php';
            }
        });
    });

    $('#header_user').on('click', function () {
        window.location = "../pages/user.php";
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

    $('.user_picture').click(function () {
        $('#user_picture_upload').click();
    });

    var done_button = $("<button class='user_data_buttons' id='user_data_done'>Fertig</button>");
    $("#user_data_change").click(function () {
        var button_text = $(this).text().trim();

        if (button_text === "Anpassen") {
            $("#user_data_username, #user_data_title, #user_data_name, #user_data_surname, #user_data_street, #user_data_number, #user_data_zipcode, #user_data_city").prop("readonly", false);

            $(this).text("Abbruch");

            $("#user_data_change").before(done_button);

            done_button.click(function () {
                $("#user_data_username, #user_data_title, #user_data_name, #user_data_surname, #user_data_street, #user_data_number, #user_data_zipcode, #user_data_city").prop("readonly", true);
                $("#user_data_change").text("Anpassen");
                done_button.remove();
            });
        } else {
            $("#user_data_username, #user_data_title, #user_data_name, #user_data_surname, #user_data_street, #user_data_number, #user_data_zipcode, #user_data_city").prop("readonly", true);
            $(this).text("Anpassen");
            done_button.remove();
        }
    });
});
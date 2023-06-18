$(document).ready(function () {
    $("#register_form, #mobile_register_form").submit(function (event) {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../php/login_register/register.php",
            data: $(this).serialize(),
            success: function (response) {
                if (response.includes("Email existiert bereits!")) {
                    $(".register_email_error").html("<p>Email existiert bereits!</p>");
                } else {
                    $(".register_email_error").empty();
                }

                if (response.includes("Benutzername existiert bereits!")) {
                    $(".register_username_error").html("<p>Benutzername existiert bereits!</p>");
                } else {
                    $(".register_username_error").empty();
                }

                if (response.includes("Passwort muss mind. 8 Zeichen lang sein!")) {
                    $(".register_password_error").html("<p>Mind. 8 Zeichen sind plicht!</p>");
                } else {
                    $(".register_password_error").empty();
                }

                if (response.includes("Passwörter sind nicht gleich!")) {
                    $(".register_password_repeat_error").html("<p>Passwörter sind nicht gleich!</p>");
                } else {
                    $(".register_password_repeat_error").empty();
                }
                if (response.includes("Registrierung war erfolgreich!")) {
                    $(".register_result").html("<p>Registrierung war erfolgreich!</p>");
                } else {
                    $(".register_result").empty();
                }
            }
        });
    });
});
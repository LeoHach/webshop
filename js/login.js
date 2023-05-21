$(document).ready(function () {
    $("#login_form").submit(function (event) {
        event.preventDefault();
        var login_username = $("#login_username_email").val();
        var login_password = $("#login_password").val();
        if (login_username === "" || login_password === "") {
            $("#login_result").html("<p>Alle Felder müssen gefüllt sein!</p>");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "../php/authenticate.php",
            data: $(this).serialize(),
            success: function (response) {
                if (response.includes("Benutzername existiert nicht!")) {
                    $("#login_username_email_error").html("<p>Benutzername existiert nicht!</p>");
                } else {
                    $("#login_username_email_error").empty();
                }

                if (response.includes("Passwort ist inkorrekt!")) {
                    $("#login_password_error").html("<p>Passwort ist inkorrekt!</p>");
                } else {
                    $("#login_password_error").empty();
                }

                if (response.includes("Anmeldung war erfolgreich!")) {
                    $("#login_result").html("<p>Anmeldung war erfolgreich!</p>");
                    location.reload();
                } else {
                    $("#login_result").empty();
                }
            }
        });
    });
});
$(document).ready(function () {
    $("#register_form").submit(function (event) {
        event.preventDefault();
        var username = $("#register_username").val();
        var email = $("#register_email").val();
        var password = $("#register_password").val();
        var password_repeat = $("#register_password_repeat").val();
        if (username === "" || email === "" || password === "" || password_repeat === "") {
            $("#result").html("<p>All fields are required.</p>");
            return false;
        }

        if (password != password_repeat) {
            $("#result").html("<p>Passwords dont match.</p>");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "../php/register.php",
            data: $(this).serialize()
        });
    });
});
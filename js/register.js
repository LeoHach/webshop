$(document).ready(function () {
    $("#register-form").submit(function (event) {
        event.preventDefault();
        var username = $("#username_register").val();
        var email = $("#email").val();
        var password = $("#password_register").val();
        if (username === "" || email === "" || password === "") {
            $("#result").html("<p>All fields are required.</p>");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "php/register.php",
            data: $(this).serialize(),
            success: function (response) {
                $("#result").html(response);
            }
        });
    });
});
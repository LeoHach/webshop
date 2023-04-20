$(document).ready(function () {
    $("#login-form").submit(function (event) {
        event.preventDefault();
        var username = $("#username_login").val();
        var password = $("#password_login").val();
        if (username === "" || password === "") {
            $("#result").html("<p>All fields are required.</p>");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "php/authenticate.php",
            data: $(this).serialize(),
            success: function (response) {
                if (response === "success") {
                    window.location.href = "pages/test.php";
                } else {
                    $("#result_login").html(response);
                }
            }
        });
    });
});
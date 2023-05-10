$(document).ready(function () {
    $("#login_form").submit(function (event) {
        event.preventDefault();
        var username = $("#login_username_email").val();
        var password = $("#login_password").val();
        if (username === "" || password === "") {
            $("#result").html("<p>All fields are required.</p>");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "../php/authenticate.php",
            data: $(this).serialize()
        });
    });
});
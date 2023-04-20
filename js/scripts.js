$(document).ready(function () {
    $.ajax({
        url: 'php/installDB.php',
        type: 'GET',
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});
<?php
// 'admin_add_user.php' wird durch eine AJAX Request aufgerufen und speichert ein neuen Nutzern in users
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut
require_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Nutzerinformationen vom neuen Nutzer
    $userName = $_POST['add_user_name'];
    $userEmail = $_POST['add_user_email'];
    $userPassword = $_POST['add_user_password'];
    $userRole = $_POST['add_user_role'];

    // Nutzerinformationen werden in der Datenbank eingetragen
    $sql = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (0,'$userName', '$userEmail', '$userPassword', '$userRole', '../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);

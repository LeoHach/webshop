<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userName = $_POST['add_user_name'];
    $userEmail = $_POST['add_user_email'];
    $userPassword = $_POST['add_user_password'];
    $userRole = $_POST['add_user_role'];

    $sql = "INSERT INTO users (Customer_ID, Username, Email, Password, Role, Picture) VALUES (0,'$userName', '$userEmail', '$userPassword', '$userRole', '../src/images/profilepictures/default_picture.png')";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);

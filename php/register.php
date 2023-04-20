<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($username != "" && $email != "" && $password != "") {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (Customer_ID, Username, Email, Password, Picture) VALUES (0,'$username', '$email', '$password', 'hurfuehgre')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Sign up successful!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn);
    } else {
        echo "<p>All fields are required.</p>";
    }
}

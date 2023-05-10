<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];

    if ($username != "" && $email != "" && $password != "" && $password_repeat != "") {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT Email FROM users WHERE Email='$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<p>Error: Email already exists.</p>";
            mysqli_close($conn);
            exit;
        }

        $sql = "SELECT Username FROM users WHERE Username='$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<p>Error: Username already exists.</p>";
            mysqli_close($conn);
            exit;
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

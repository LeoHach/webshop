<?php
require_once('db_connection.php');

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username != "" && $password != "") {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM users WHERE Username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            //if (password_verify($password, $row["Password"])) {
            if ($password == $row["Password"]) {
                $_SESSION["username"] = $username;
                $_SESSION["role"] = $row["Role"];
                echo "success";
            } else {
                echo "<p>Incorrect password.</p>";
            }
        } else {
            echo "<p>Username not found.</p>";
        }
        mysqli_close($conn);
    } else {
        echo "<p>All fields are required.</p>";
    }
}

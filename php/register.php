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
            $email_error = "Fehler: Email existiert bereits!";
        }

        $sql = "SELECT Username FROM users WHERE Username='$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $username_error = "Fehler: Benutzername existiert bereits!";
        }

        if (strlen($password) < 8) {
            $password_error = "Fehler: Passwort muss mind. 8 Zeichen lang sein!";
        }

        if ($password != $password_repeat) {
            $password_repeat_error = "Fehler: Passwörter sind nicht gleich!";
        }

        if (!isset($email_error) && !isset($username_error) && !isset($password_error) && !isset($password_repeat_error)) {
            //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (Customer_ID, Username, Email, Password, Picture) VALUES (0,'$username', '$email', '$password', '../src/images/profilepictures/default_picture.png')";
            if (mysqli_query($conn, $sql)) {
                echo "<p>Registrierung war erfolgreich!</p>";
            } else {
                echo "<p>Fehler: " . mysqli_error($conn) . "</p>";
            }
            mysqli_close($conn);
        } else {
            if (isset($email_error)) {
                echo "<p>$email_error</p>";
            }
            if (isset($username_error)) {
                echo "<p>$username_error</p>";
            }
            if (isset($password_error)) {
                echo "<p>$password_error</p>";
            }
            if (isset($password_repeat_error)) {
                echo "<p>$password_repeat_error</p>";
            }
        }
    } else {
        echo "<p>Alle Felder müssen gefüllt sein!</p>";
    }
}

<?php
require_once('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username_email"];
    $password = $_POST["password"];
    if ($username != "" && $password != "") {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM users WHERE Username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $username_error = "Fehler: Benutzername existiert nicht!";
        }

        $row = mysqli_fetch_assoc($result);
        if ($password != $row["Password"]) {
            $password_error = "Fehler: Passwort ist inkorrekt!";
        }

        if (!isset($username_error) && !isset($password_error)) {
            //setcookie("username", $username, time() + 3600, "/");
            //setcookie("role", $row["Role"], time() + 3600, "/");
            session_start();
            $_SESSION['userID'] = $row["User_ID"];
            $_SESSION['role'] = $row["Role"];
            echo "<p>Anmeldung war erfolgreich!</p>";
            mysqli_close($conn);
        } else {
            if (isset($username_error)) {
                echo "<p>$username_error</p>";
            }
            if (isset($password_error)) {
                echo "<p>$password_error</p>";
            }
        }
    } else {
        echo "<p>Alle Felder müssen gefüllt sein!</p>";
    }
}

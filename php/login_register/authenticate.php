<?php
// 'authenticate.php' prüft ob die Anmeldedaten in der Datenbank vorhanden sind 
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

require_once('../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nutzerdaten von der Anmeldung
    $username = $_POST["username_email"];
    $password = $_POST["password"];
    if ($username != "" && $password != "") {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Es wird geprüft ob der Nutzername existiert
        $sql = "SELECT * FROM users WHERE Username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $username_error = "Fehler: Benutzername existiert nicht!";
        }

        // Es wird geprüft ob das Passwort korrekt ist
        $row = mysqli_fetch_assoc($result);
        if ($password != $row["Password"]) {
            $password_error = "Fehler: Passwort ist inkorrekt!";
        }

        // Wenn es keine Fehler gibt wird der Nutzer angemeldet wenn nicht wird ein Fehler ausgegeben
        if (!isset($username_error) && !isset($password_error)) {
            // Bei erfolgreicher Anmeldung werden 3 Sessionvariablen gesetzt
            session_start();

            // 'userID' speichert die User_ID aus der Datenbank
            $_SESSION['userID'] = $row["User_ID"];

            // 'role' speichert ob es sich um einen user oder admin Nutzer handelt
            $_SESSION['role'] = $row["Role"];

            // 'customerID' speichert die Custommer_ID aus der Datenbank
            $_SESSION['customerID'] = $row['Customer_ID'];

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

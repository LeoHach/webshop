<?php
// 'db_connection.php' stellt die Verbindung zur Datenbank her, wird in vielen Dateien für $conn benutzt

// MySQL Server Anmeldedaten
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "webshop_schreibwaren";

// Verbindung zur Datenbank wird hergestellt
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Prüft ob die Verbindung erfolgreich war
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

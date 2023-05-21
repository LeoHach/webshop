<?php
/* Diese Datei erstellt die Datenbank mit allen Tabellen für den Webshop automatisch beim 
   ersten Aufruf der index.php Seite solange die Datenbank und jeweiligen Tabellen noch nicht existieren,
   der Admin Benutzer wird auch direkt erstellt mit dem username 'admin' und dem Passwort '123456789' */

// Anmdeldedaten für die MySQL Datenbank, müssen bei Bedarf angepasst werden!
$servername = "localhost";
$username = "root";
$password = "";

// Verbindung zur MySQL Datenbank wird erstellt
$conn = mysqli_connect($servername, $username, $password);

// Einfache Prüfung ob die Verbindung erfolgreich war 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Existiert die Datenbank "webshop_schreibwaren" noch nicht wird diese erstellt
$database_name = "webshop_schreibwaren";
$create_database_query = "CREATE DATABASE IF NOT EXISTS $database_name";

if (mysqli_query($conn, $create_database_query)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// "$conn" wird überschrieben um die Tabellen zur richtigen Datenbank zuzuweisen
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Existiert die Tabelle "users" noch nicht wird diese erstellt
$create_users_table_query = "CREATE TABLE IF NOT EXISTS users(
    User_ID INT AUTO_INCREMENT NOT NULL,
    Customer_ID INT,
    Username VARCHAR(20),
    Email VARCHAR(50),
    Password VARCHAR(40),
    Role SET('user', 'admin') DEFAULT 'user',
    Picture VARCHAR(255),
    PRIMARY KEY(User_ID)

)";

if (mysqli_query($conn, $create_users_table_query)) {
    echo "Table 'users' created successfully";
} else {
    echo "Error creating table 'users': " . mysqli_error($conn);
}

// Prüfe ob ein Admin Account bereits existiert, wenn nicht wird einer erstellt
$admin_created_query = "SELECT User_ID FROM users WHERE Role = 'admin'";
$result = mysqli_query($conn, $admin_created_query);
if (mysqli_num_rows($result) == 0) {
    // Erstelle den Admin Benutzer 
    $create_admin = "INSERT INTO users (Customer_ID, Username, Email, Password, Role,Picture) VALUES (0,'admin', 'admin@gmail.com', '12345678', 'admin' ,'hurfuehgre')";

    if (mysqli_query($conn, $create_admin)) {
        echo "admin created successfully";
    } else {
        echo "Error creating admin: " . mysqli_error($conn);
    }
}

// Die Verbindung zur MySQL Datenbank wird geschlossen
mysqli_close($conn);

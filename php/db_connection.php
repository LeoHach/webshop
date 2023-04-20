<?php
// MySQL server credentials
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "webshop_schreibwaren";

// Create a connection to MySQL server
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check if the connection is successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

<?php
// 'get_user_data.php' lädt Informationen wie Profilbild, Email und Username aus der Datenbank
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut
require_once('../database/db_connection.php');
session_start();

$user_ID = $_SESSION['userID'];

$sql = "SELECT Username, Email, Picture FROM users WHERE User_ID = $user_ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
mysqli_close($conn);

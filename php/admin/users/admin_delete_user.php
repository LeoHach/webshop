<?php
// 'admin_delete_user.php' löscht einen Nutzer aus der Datenbank wenn '.admin_user_delete' auf einem Nutzer geklickt wird 
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut
require_once('../../database/db_connection.php');

if (isset($_POST['id'])) {
    // User_Id vom Nutzer der gelöscht werden soll
    $userID = $_POST['id'];
    $sql = "DELETE FROM users WHERE User_ID = '$userID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}

mysqli_close($conn);

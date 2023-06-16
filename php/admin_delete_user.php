<?php
require_once('db_connection.php');

if (isset($_POST['id'])) {
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

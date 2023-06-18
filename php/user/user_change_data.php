<?php
// 'user_change_data.php' Updatet die Daten in der Users und Customers Tabelle in der Datenbank mit den neuen Werten
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

require_once('../database/db_connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_ID = $_SESSION['userID'];
    $customer_ID = $_SESSION['customerID'];
    $username = $_POST['user_data_username'];
    $email = $_POST['user_data_email'];
    $title = $_POST['user_data_title'];
    $name = $_POST['user_data_name'];
    $surname = $_POST['user_data_surname'];
    $street = $_POST['user_data_street'];
    $number = $_POST['user_data_number'];
    $city = $_POST['user_data_city'];
    $zipcode = $_POST['user_data_zipcode'];

    // Zielordner zum lokalen Speichern des Bildes
    $targetDir = "../src/images/profilepictures/";

    // Name des Bildes
    $fileName = basename($_FILES["user_data_picture_upload"]["name"]);

    // Kompletter Pfad für das Bild in der Ordnerstruktur
    $target_file = $targetDir . $fileName;

    // Flag welche bestimmt ob das Bild den Anforderungen entspricht und hochgeladen werden kann
    $uploadOk = 1;

    // Dateiendung wird erhoben und in lower case umgewandelt
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Es wird geprüft ob ein Bild eingetroffen ist
    $check = getimagesize($_FILES["user_data_picture_upload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Es wird geprüft ob ein Bild mit gleichem Namen existiert
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Es wird geprüft ob das Bild eine valide Dateiendung hat 
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    // Wenn alles gut lief ($uploadOk == 1) wird das Bild der Datenbank hinzugefügt
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["user_data_picture_upload"]["tmp_name"], $target_file)) {
            $picturePath = "../src/images/profilepictures/" . $fileName;
            $sql = "UPDATE users SET Username = '$username', Email = '$email', Picture = '$picturePath' WHERE User_ID = $user_ID";
            mysqli_query($conn, $sql);
        }
    }

    // Wenn der Nutzer noch kein Customer Eintrag hat wird dieser erstellt und die User Tabelle wird geupdated
    if ($customer_ID == 0) {
        $sql = "INSERT INTO customers(User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES($user_ID,'$title', '$name', '$surname', '$street', $number, '$city', $zipcode)";
        mysqli_query($conn, $sql);

        $sql = "SELECT Customer_ID FROM customers WHERE User_ID = $user_ID";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $customer_ID = $row['Customer_ID'];

        $sql = "UPDATE users SET Customer_ID = $customer_ID WHERE User_ID = $user_ID";
        mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE customers SET Title = '$title', Name = '$name', Surname = '$surname', Street = '$street', Number = $number, City = '$city', Zipcode = $zipcode WHERE Customer_ID = $customer_ID";
        mysqli_query($conn, $sql);
    }
}
mysqli_close($conn);

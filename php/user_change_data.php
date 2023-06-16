<?php
require_once('db_connection.php');
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

    $targetDir = "../src/images/profilepictures/";
    $fileName = basename($_FILES["user_data_picture_upload"]["name"]);
    $target_file = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["user_data_picture_upload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    ) {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["user_data_picture_upload"]["tmp_name"], $target_file)) {
            $picturePath = "../src/images/profilepictures/" . $fileName;
            $sql = "UPDATE users SET Username = '$username', Email = '$email', Picture = '$picturePath' WHERE User_ID = $user_ID";
            mysqli_query($conn, $sql);
        }
    }

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

<?php
require_once('db_connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_ID = $_SESSION['userID'];
    $customer_ID = $_SESSION['customerID'];
    $title = $_POST['checkout_title'];
    $name = $_POST['checkout_name'];
    $surname = $_POST['checkout_surname'];
    $street = $_POST['checkout_street'];
    $number = $_POST['checkout_number'];
    $city = $_POST['checkout_city'];
    $zipcode = $_POST['checkout_zipcode'];

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

    $timestamp = time();
    $sql = "INSERT INTO orders(Customer_ID, Date) VALUES($customer_ID, FROM_UNIXTIME($timestamp))";
    mysqli_query($conn, $sql);

    $sql = "SELECT Order_ID FROM orders WHERE Date = FROM_UNIXTIME($timestamp)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $order_ID = $row['Order_ID'];

    $cartItems = $_SESSION['cart'];
    foreach ($cartItems as $item) {
        $item_ID = $item['id'];
        $itemPrice = $item['price'];
        $sql = "INSERT INTO ordered_items(Order_ID, Product_ID, Price) VALUES($order_ID, $item_ID, $itemPrice)";
        mysqli_query($conn, $sql);
        $sql = "UPDATE products SET Stock = Stock - 1 WHERE Product_ID = $item_ID";
        mysqli_query($conn, $sql);
    }
    mysqli_close($conn);
    $_SESSION['cart'] = array();
}

<?php
// 'checkout_buy.php' übernimmt den Verkausprozess, ist der Nutzer noch kein Customer wird ein Customer erstellt mit den Daten aus dem Form
// Es wird eine order angelegt für den Verkauf und die ordered_items werden ebenfalls erstellt und der order zugewiesen
// Verbidung zur Datenbank wird durch 'db_connection.php' aufgebaut

require_once('../database/db_connection.php');
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

    // Ist der aktuelle Nutzer noch kein Customer werden die Daten aus dem Form genutzt um einen neuen anzulegen
    if ($customer_ID == 0) {

        // Einfügen in die Datenbank
        $sql = "INSERT INTO customers(User_ID, Title, Name, Surname, Street, Number, City, Zipcode) VALUES($user_ID,'$title', '$name', '$surname', '$street', $number, '$city', $zipcode)";
        mysqli_query($conn, $sql);

        // Die neu generierte Customer_ID wird abgefragt
        $sql = "SELECT Customer_ID FROM customers WHERE User_ID = $user_ID";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $customer_ID = $row['Customer_ID'];

        // Die Customer_ID wird dem entsprechendem Eintrag in users zugewiesen
        $sql = "UPDATE users SET Customer_ID = $customer_ID WHERE User_ID = $user_ID";
        mysqli_query($conn, $sql);
    } else {

        // Ist der Nutzer bereits Kunde werden die Daten in der Datenbank geupdatet 
        $sql = "UPDATE customers SET Title = '$title', Name = '$name', Surname = '$surname', Street = '$street', Number = $number, City = '$city', Zipcode = $zipcode WHERE Customer_ID = $customer_ID";
        mysqli_query($conn, $sql);
    }

    // Es wird das aktuelle Datum mit Uhrzeit gespeichert
    $timestamp = time();

    // Eine order wird erstellt
    $sql = "INSERT INTO orders(Customer_ID, Date) VALUES($customer_ID, FROM_UNIXTIME($timestamp))";
    mysqli_query($conn, $sql);

    // Die neuste Order wird rausgesucht um die ordered_items dieser zu zuweisen
    $sql = "SELECT Order_ID FROM orders WHERE Date = FROM_UNIXTIME($timestamp)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $order_ID = $row['Order_ID'];

    // Alle Produkte aus der 'cart' Session werden zu ordered_items
    $cartItems = $_SESSION['cart'];
    foreach ($cartItems as $item) {
        $item_ID = $item['id'];
        $itemPrice = $item['price'];
        $sql = "INSERT INTO ordered_items(Order_ID, Product_ID, Price) VALUES($order_ID, $item_ID, $itemPrice)";
        mysqli_query($conn, $sql);

        // Die Anzhahl des Produkts wird in products im 1 veringert
        $sql = "UPDATE products SET Stock = Stock - 1 WHERE Product_ID = $item_ID";
        mysqli_query($conn, $sql);
    }
    mysqli_close($conn);

    // Die Session 'cart' wird geleert
    $_SESSION['cart'] = array();
}

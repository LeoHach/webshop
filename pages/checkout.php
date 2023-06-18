<!DOCTYPE html>
<html>
<?php
session_start();
$readonly = '';
$disabled = '';
if (!isset($_SESSION['userID'])) {
    $readonly = 'readonly';
    $disabled = 'disabled';
} else {
    $readonly = '';
    $disabled = '';
}
?>

<head>
    <title>PaperSolutions - Checkout</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/checkout_scripts.js"></script>
    <script src="../js/register.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body class="background">
    <?php include '../components/header.php'; ?>
    <div class="container">
        <div class="middle_square">
            <div class="checkout_container">
                <form class="checkout_wrapper" id="buy_form" action="" method="post">
                    <div class="checkout_content_wrapper">
                        <span class="checkout_text checkout_big">Deine Informationen</span>
                        <hr class="checkout_hr">
                        <div class="checkout_input_wrapper">
                            <span class="checkout_text checkout_input_text">Anrede:</span>
                            <input type="text" class="checkout_input checkout_short" id="checkout_title" name="checkout_title" <?php echo $readonly; ?> required>
                        </div>
                        <div class="checkout_inputs_wrapper">
                            <div class="checkout_input_wrapper">
                                <span class="checkout_text checkout_input_text">Vorname:</span>
                                <input type="text" class="checkout_input checkout_long" id="checkout_name" name="checkout_name" <?php echo $readonly; ?> required>
                            </div>
                            <div class="checkout_input_wrapper">
                                <span class="checkout_text checkout_input_text">Nachname:</span>
                                <input type="text" class="checkout_input checkout_long" id="checkout_surname" name="checkout_surname" <?php echo $readonly; ?> required>
                            </div>
                        </div>
                        <div class="checkout_inputs_wrapper">
                            <div class="checkout_input_wrapper">
                                <span class="checkout_text checkout_input_text">Straße:</span>
                                <input type="text" class="checkout_input checkout_long" id="checkout_street" name="checkout_street" <?php echo $readonly; ?> required>
                            </div>
                            <div class="checkout_input_wrapper">
                                <span class="checkout_text checkout_input_text">Hausnummer:</span>
                                <input type="number" class="checkout_input checkout_shortest" id="checkout_number" name="checkout_number" <?php echo $readonly; ?> required>
                            </div>
                        </div>
                        <div class="checkout_inputs_wrapper">
                            <div class="checkout_input_wrapper">
                                <span class="checkout_text checkout_input_text">Stadt:</span>
                                <input type="text" class="checkout_input checkout_long" id="checkout_city" name="checkout_city" <?php echo $readonly; ?> required>
                            </div>
                            <div class="checkout_input_wrapper">
                                <span class="checkout_text checkout_input_text">Postleitzahl:</span>
                                <input type="number" class="checkout_input checkout_short" id="checkout_zipcode" name="checkout_zipcode" <?php echo $readonly; ?> required>
                            </div>
                        </div>

                    </div>
                    <div class="checkout_content_wrapper">
                        <span class="checkout_text checkout_big">Dein Warenkorb</span>
                        <hr class="checkout_hr">
                        <div class="checkout_cart" id="checkout_cart">

                        </div>
                        <hr class="checkout_hr">
                        <div class="checkout_sum_text">
                            <span class="checkout_text checkout_middle">Summe:</span>
                            <span class="checkout_text checkout_middle" id="checkout_sum">0.00€</span>
                        </div>
                        <div class="checkout_buttons">
                            <?php
                            if (!isset($_SESSION['userID'])) {
                                echo '
                                <span class="checkout_text checkout_input_text">Du musst angemeldet sein!</span>
                                ';
                            }
                            ?>
                            <input class="checkout_button" id="checkout_buy_button" type="submit" value="Jetzt Kaufen" <?php echo $disabled; ?>>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
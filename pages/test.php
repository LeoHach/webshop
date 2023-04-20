<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/scripts.js"></script>
</head>

<body>

    <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
    <p>You are now logged in.</p>
    <a href="../php/logout.php">Log out</a>

</body>

</html>
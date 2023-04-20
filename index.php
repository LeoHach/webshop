<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/register.js"></script>
    <script src="js/login.js"></script>
</head>

<body>
    <h1>Sign Up</h1>
    <form id="register-form" action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username_register"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password_register"><br>

        <input type="submit" value="Sign Up">
    </form>
    <div id="result"></div>

    <h1>Login</h1>
    <form id="login-form" action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username_login"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password_login"><br>

        <input type="submit" value="Log In">
    </form>
    <div id="result_login"></div>
</body>

</html>
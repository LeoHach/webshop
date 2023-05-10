<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/register.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body>
    <div id="header">
        <div id="header_container">
            <div id="header_menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>

            </div>
            <div id="icon">
                <a href="index.php">
                    <span id="header_paper">Paper</span><span id="header_solutions">Solutions</span>
                </a>
            </div>

            <div id="header_searchbar_conatiner">
                <input id="header_searchbar" type="search" placeholder="Suche">
            </div>

            <div id="header_icons">
                <svg xmlns="http://www.w3.org/2000/svg" class="header_icon" id="header_user" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" class="header_icon" id="header_cart" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" class="header_icon" id="header_admin" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div id="header_search">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>

            </div>
        </div>
    </div>
    <form id="login_form" action="" method="post">
        <h2 class="dropdown_text" id="login_header">Anmelden</h2>
        <label for="username_email" class="dropdown_text">E-Mail / Benutzername:</label>
        <input type="email" class="dropdown_input" id="login_username_email" name="username_email" required />
        <label for="password" class="dropdown_text">Passwort:</label>
        <input type="password" class="dropdown_input" id="login_password" name="password" required />
        <div id="login_buttons">
            <button class="dropdown_buttons" id="login_register">Registrieren</button>
            <input type="submit" class="dropdown_buttons" id="login_login" value="Anmelden" />
        </div>
    </form>
    <form id="register_form" action="" method="post">
        <h2 class="dropdown_text" id="login_header">Registrieren</h2>
        <label for="username" class="dropdown_text">Benutzername:</label>
        <input type="text" class="dropdown_input" id="register_username" name="username" required />
        <label for="email" class="dropdown_text">E-Mail:</label>
        <input type="email" class="dropdown_input" id="register_email" name="email" required />
        <label for="password" class="dropdown_text">Passwort:</label>
        <input type="password" class="dropdown_input" id="register_password" name="password" required />
        <label for="password_repeat" class="dropdown_text">Passwort wiederholen:</label>
        <input type="password" class="dropdown_input" id="register_password_repeat" name="password_repeat" required />
        <div id="register_buttons">
            <button class="dropdown_buttons" id="register_login">Anmelden</button>
            <input type="submit" class="dropdown_buttons" id="register_register" value="Registrieren" />
        </div>
    </form>
</body>

</html>
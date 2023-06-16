<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
    <title>PaperSolutions - User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/user_scripts.js"></script>
    <script src="../js/register.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body id="user_body" class="smaller_bg">
    <?php include '../components/header.php'; ?>
    <div class="container">
        <div class="middle_square">
            <div class="user_content_wrapper">
                <form class="user_top_wrapper" id="user_data_change_form" action="" method="post" enctype="multipart/form-data">
                    <div class="user_picture">
                        <img src="" alt="Profilbild" id="user_data_picture">
                        <div class="user_picture_overlay">
                            <span class="user_picture_overlay_text">Bild ändern</span>
                        </div>
                        <input type="file" id="user_data_picture_upload" name="user_data_picture_upload" style="display: none;">
                    </div>
                    <div class="user_data">
                        <div class="user_data_wrappers">
                            <div class="user_data_fields">
                                <span class="user_data_text">Benutzername:</span>
                                <input type="text" class="user_data_input" id="user_data_username" name="user_data_username" readonly>
                                <div id="user_data_username_result" class="user_data_result_text"></div>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">E-Mail:</span>
                                <input type="text" class="user_data_input" id="user_data_email" name="user_data_email" readonly>
                                <div id="user_data_email_result" class="user_data_result_text"></div>
                            </div>
                        </div>
                        <div class="user_data_wrappers">
                            <div class="user_data_fields">
                                <span class="user_data_text">Anrede:</span>
                                <input type="text" class="user_data_input user_data_input_short" id="user_data_title" name="user_data_title" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Vorname:</span>
                                <input type="text" class="user_data_input" id="user_data_name" name="user_data_name" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Nachname:</span>
                                <input type="text" class="user_data_input" id="user_data_surname" name="user_data_surname" readonly>
                            </div>
                        </div>
                        <div class="user_data_wrappers">
                            <div class="user_data_fields">
                                <span class="user_data_text">Straße:</span>
                                <input type="text" class="user_data_input" id="user_data_street" name="user_data_street" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Hausnummer:</span>
                                <input type="text" class="user_data_input user_data_input_short" id="user_data_number" name="user_data_number" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Stadt:</span>
                                <input type="text" class="user_data_input" id="user_data_city" name="user_data_city" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Postleitzahl:</span>
                                <input type="text" class="user_data_input user_data_input_short" id="user_data_zipcode" name="user_data_zipcode" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="user_buttons">
                        <input class="user_data_buttons" id="user_data_done" name="user_data_done" type="submit" value="Fertig" style="display: none;">
                        <button class=" user_data_buttons" id="user_data_change">Anpassen</button>
                    </div>
                </form>
                <div class="user_row_wrapper">
                    <span class="user_top_text">Gekaufte Produkte:</span>
                    <div class="admin_top_row_icons">
                        <svg xmlns="http://www.w3.org/2000/svg" class="admin_icon admin_show_button" id="user_show_prodcuts_button" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <hr class="admin_hr">
                <div class="admin_item_content" id="user_bought_items">

                </div>
                <div class="user_row_wrapper">
                    <span class="user_top_text">Deine Kommentare:</span>
                    <div class="admin_top_row_icons">
                        <svg xmlns="http://www.w3.org/2000/svg" class="admin_icon admin_show_button" id="user_show_comments_button" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <hr class="admin_hr">
                <div class="admin_item_content" id="user_comments">

                </div>
            </div>
        </div>
    </div>
</body>

</html>
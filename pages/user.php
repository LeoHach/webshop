<!DOCTYPE html>
<html>

<head>
    <title>PaperSolutions - User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="background">
    <?php include '../components/header.php'; ?>
    <div class="container">
        <div class="middle_square">
            <div class="user_content_wrapper">
                <div class="user_top_wrapper">
                    <div class="user_picture">
                        <img src="../src/images/profilepictures/default_picture.png" alt="Profilbild">
                        <div class="user_picture_overlay">
                            <span class="user_picture_overlay_text">Bild ändern</span>
                        </div>
                        <input type="file" id="user_picture_upload" style="display: none;">
                    </div>
                    <div class="user_data">
                        <div class="user_data_wrappers">
                            <div class="user_data_fields">
                                <span class="user_data_text">Benutzername:</span>
                                <input type="text" class="user_data_input" id="user_data_username" required readonly>
                                <div id="user_data_username_result" class="user_data_result_text"></div>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">E-Mail:</span>
                                <input type="text" class="user_data_input" id="user_data_email" required readonly>
                                <div id="user_data_email_result" class="user_data_result_text"></div>
                            </div>
                        </div>
                        <div class="user_data_wrappers">
                            <div class="user_data_fields">
                                <span class="user_data_text">Anrede:</span>
                                <input type="text" class="user_data_input" id="user_data_title" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Vorname:</span>
                                <input type="text" class="user_data_input" id="user_data_name" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Nachname:</span>
                                <input type="text" class="user_data_input" id="user_data_surname" readonly>
                            </div>
                        </div>
                        <div class="user_data_wrappers">
                            <div class="user_data_fields">
                                <span class="user_data_text">Straße:</span>
                                <input type="text" class="user_data_input" id="user_data_street" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Hausnummer:</span>
                                <input type="text" class="user_data_input" id="user_data_number" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Postleitzahl:</span>
                                <input type="text" class="user_data_input" id="user_data_zipcode" readonly>
                            </div>
                            <div class="user_data_fields">
                                <span class="user_data_text">Stadt:</span>
                                <input type="text" class="user_data_input" id="user_data_city" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="user_buttons">
                        <button class="user_data_buttons" id="user_data_change">Anpassen</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
    <title>PaperSolutions - Admin</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/admin_scripts.js"></script>
    <script src="../js/register.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body id="admin_body" class="background">
    <?php include '../components/header.php'; ?>
    <div class="container">
        <div class="middle_square">
            <div class="admin_content">
                <div class="admin_content_item">
                    <div class="admin_top_row">
                        <span class="admin_top_text">Statistiken:</span>
                    </div>
                    <hr class="admin_hr">
                    <div class="admin_item_content" id="admin_statistics">
                        <div class="admin_chart_container">
                            <div class="admin_money_chart_container">
                                <span class="admin_chart_title">Umsatz der letzten 7 Tage:</span>
                                <canvas class="admin_charts" id="money_sum_chart"></canvas>
                            </div>
                            <div class="admin_money_chart_container">
                                <span class="admin_chart_title">Menge der verkauften Produkte:</span>
                                <canvas class="admin_charts" id="stock_sum_chart"></canvas>
                            </div>
                        </div>

                    </div>
                    <hr class="admin_hr">
                </div>
                <div class="admin_content_item">
                    <div class="admin_top_row">
                        <span class="admin_top_text">Produktverwaltung:</span>
                        <div class="admin_top_row_icons">
                            <svg xmlns="http://www.w3.org/2000/svg" class="admin_icon" id="add_product_button" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="admin_icon admin_show_button" id="show_products_button" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                    <hr class="admin_hr">
                    <div class="admin_item_content" id="admin_products">

                    </div>
                    <hr class="admin_hr">
                </div>
                <div class="admin_content_item">
                    <div class="admin_top_row">
                        <span class="admin_top_text">Nutzerverwaltung:</span>
                        <div class="admin_top_row_icons">
                            <svg xmlns="http://www.w3.org/2000/svg" class="admin_icon" id="add_users_button" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="admin_icon admin_show_button" id="admin_show_users_button" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                    <hr class="admin_hr">
                    <div class="admin_item_content" id="admin_users">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
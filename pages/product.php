<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
    <title>PaperSolutions</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/register.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/product_scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <?php include '../components/header.php'; ?>
    <?php require('../php/get_product_details.php'); ?>
    <div class="container">
        <div class="middle_square">
            <div class="single_product_wrapper" id="single_product_wrapper">
                <div class="single_product_top_row">
                    <img src="<?php echo $productPicture; ?>" id="single_product_picture">
                    <div class="single_product_col">
                        <div class="single_product_row">
                            <div class="single_product_col">
                                <span class="single_product_big_text"><?php echo $productName; ?></span>
                                <span class="single_product_text"><?php echo $productBrand; ?></span>
                            </div>
                            <div class="single_product_col">
                                <span class="single_product_big_text"><?php echo $productPrice; ?>€</span>
                                <span class="single_product_text">Auf Lager: <?php echo $productStock; ?></span>
                            </div>
                            <button class="single_product_button" id="single_product_add_to_cart" data-id="<?php echo $productID; ?>" data-price="<?php echo $productPrice; ?>" data-name="<?php echo $productName; ?>" data-brand="<?php echo $productBrand; ?>" data-picture="<?php echo $productPicture; ?>">
                                <span class="material-symbols-outlined">add_shopping_cart</span>
                            </button>
                        </div>
                        <p class="single_product_text single_product_paragraph"><?php echo $productDescription; ?></p>
                    </div>
                </div>
                <div class="single_product_rating_row">
                    <span class="single_product_big_text"><?php echo $productNoRating; ?> Bewertungen</span>
                    <div class="single_product_stars">
                        <?php echo $stars; ?>
                    </div>
                </div>

                <div class="single_product_user_rating_row">
                    <img src="<?php echo $userPicture; ?>" id="single_product_user_picture">
                    <form class="single_product_rating_form" id="review_form" action="" method="post">
                        <input value="<?php echo $productID; ?>" class="single_product_id" name="single_product_id" style="display: none">
                        <input id="single_product_comment_field" type="text" placeholder="Bewertung verfassen..." name="single_product_comment_field">
                        <div class="single_product_rating_stars">
                            <i class="material-symbols-outlined md-48 star_empty_rating rating_stars" data-value="1">star</i>
                            <i class="material-symbols-outlined md-48 star_empty_rating rating_stars" data-value="2">star</i>
                            <i class="material-symbols-outlined md-48 star_empty_rating rating_stars" data-value="3">star</i>
                            <i class="material-symbols-outlined md-48 star_empty_rating rating_stars" data-value="4">star</i>
                            <i class="material-symbols-outlined md-48 star_empty_rating rating_stars" data-value="5">star</i>
                        </div>
                        <input type="hidden" id="single_product_comment_rating" name="single_product_comment_rating">
                        <button type="submit" id="single_product_comment_submit" name="single_product_comment_submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" class="single_product_comment_submit_button">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="single_product_col" id="single_product_comments">
                    <?php echo $reviews; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
require_once('db_connection.php');
if (isset($_SESSION['userID'])) {
    $user_ID = $_SESSION['userID'];
    $query = "SELECT Picture FROM users WHERE User_ID = $user_ID";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $userPicture = $row['Picture'];
} else {
    $userPicture = "../src/images/profilepictures/default_picture.png";
}

$productID = $_GET['product_id'];

$query = "SELECT * FROM products WHERE Product_ID = $productID";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$productPicture = $row['Picture'];
$productName = $row['Name'];
$productBrand = $row['Brand'];
$productPrice = $row['Price'];
$productStock = $row['Stock'];
$productAvgRating = $row['AvgRating'];
$productNoRating = $row['NoRating'];
$productDescription = $row['Description'];

$roundedRating = round($productAvgRating * 2) / 2;
$stars = '';

for ($i = 1; $i <= 5; $i++) {
    if ($i <= $roundedRating) {
        $stars .= '<i class="material-symbols-outlined md-48 star_filled rating_star">star</i>';
    } elseif ($i - 0.5 === $roundedRating) {
        $stars .= '<i class="material-symbols-outlined md-48 star_half rating_star">star_half</i>';
    } else {
        $stars .= '<i class="material-symbols-outlined md-48 star_empty rating_star">star</i>';
    }
}

$reviews = '';
$review_query = "SELECT * FROM reviews WHERE Product_ID = $productID";
$review_result = mysqli_query($conn, $review_query);

while ($row = mysqli_fetch_assoc($review_result)) {
    $review_user_ID = $row['User_ID'];
    $review_bought = $row['Bought'];
    $review_Rating = $row['Rating'];
    $review_Review = $row['Review'];

    $isBought = '';

    if ($review_bought == 1) {
        $isBought .= '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" class="comment_check">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    <span class="comment_user_bought">Gekauft</span>';
    } else {
        $isBought .= '';
    }

    $review_stars = '';

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $review_Rating) {
            $review_stars .= '<i class="material-symbols-outlined md-48 star_filled rating_star">star</i>';
        } else {
            $review_stars .= '<i class="material-symbols-outlined md-48 star_empty rating_star">star</i>';
        }
    }

    $user_query = "SELECT Username, Picture FROM users WHERE User_ID = $review_user_ID";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_assoc($user_result);
    $review_user_name = $user_row['Username'];
    $review_user_picture = $user_row['Picture'];

    $reviews .= '
    <div class="comment_wrapper">
        <div class="comment_row">
            <img src="' . $review_user_picture . '" class="comment_user_picture">
            <span class="comment_user_name">' . $review_user_name . '</span>
            <div class="comment_rating_stars">
                ' . $review_stars . '
            </div>
            <div class="comment_bought">
                ' . $isBought . '
            </div>
        </div>
        <p class="comment_comment_text">' . $review_Review . '</p>
        <hr class="comment_hr">
    </div>';
}

mysqli_close($conn);

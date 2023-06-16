<?php
session_start();
echo generate_user_comments();

function generate_user_comments()
{
    require_once('db_connection.php');
    $user_ID = $_SESSION['userID'];
    $userComments = '';
    $query = "SELECT User_ID, Bought, Rating, Review, DATE_FORMAT(Date, '%d.%m.%y') AS Date FROM reviews WHERE User_ID = $user_ID";

    $result = mysqli_query($conn, $query);


    while ($row = mysqli_fetch_assoc($result)) {
        $review_user_ID = $row['User_ID'];
        $review_bought = $row['Bought'];
        $review_Rating = $row['Rating'];
        $review_Review = $row['Review'];
        $review_Date = $row['Date'];

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

        $userComments .= '
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
                <div class="comment_user_bought">
                    Vom: ' . $review_Date . '
                </div>
            </div>
            <p class="comment_comment_text">' . $review_Review . '</p>
            <hr class="comment_hr">
        </div>
        ';
    }
    return $userComments;
    mysqli_close($conn);
}

<?php
echo generate_admin_users();

function generate_admin_users()
{
    require_once('db_connection.php');
    $adminUsers = '';
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $userID = $row['User_ID'];
        $customerID = $row['Customer_ID'];
        $username = $row['Username'];
        $email = $row['Email'];
        $role = $row['Role'];
        $picture = $row['Picture'];

        $adminUsers .= '
        <div class="admin_product_item">
            <div class="admin_item_part">
                <img src="' . $picture . '" class="admin_product_item_picture">
                <div class="admin_item_text_container">
                    <span class="admin_item_text admin_item_text_top">' . $username . '</span>
                    <span class="admin_item_text">' . $email . '</span>
                </div>
                <div class="admin_item_text_container">
                    <span class="admin_item_text admin_item_text_top">Role: ' . $role . '</span>
                    <span class="admin_item_text">Customer Id: ' . $customerID . '</span>
                </div>
            </div>
            <div class="admin_item_part">
                <button class="admin_item_icon admin_user_delete" data-id="' . $userID . '">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#253237">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        ';
    }
    return $adminUsers;
    mysqli_close($conn);
}

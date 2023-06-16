<?php

echo '
<form class="admin_add_user_container" id="add_user_form" action="" method="post">
    <div class="admin_add_item_row">
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Benutzername:</span>
            <input type="text" class="admin_add_item_input" id="add_user_name" name="add_user_name">
        </div>
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">E-Mail:</span>
            <input type="email" class="admin_add_item_input" id="add_user_email" name="add_user_email">
        </div>
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Passwort:</span>
            <input type="password" class="admin_add_item_input" id="add_user_password" name="add_user_password">
        </div>
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Rolle:</span>
            <select class="admin_add_user_select" id="add_user_role" name="add_user_role">
                <option class="admin_add_user_select_option" value="user">User</option>
                <option class="admin_add_user_select_option" value="admin">Admin</option>
            </select>
        </div>
    </div>
    <div class="admin_add_item_row">
        <input class="admin_add_item_button admin_add_user_button" id="admin_add_user_done" type="submit" value="Fertig">
        <button class="admin_add_item_button admin_add_user_button" id="admin_add_user_cancel">Abbruch</button>
    </div>
</form>
';

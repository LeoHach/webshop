<?php

echo '
<form class="admin_item_add_form" id="add_form" action="" method="post" enctype="multipart/form-data">
    <div class="admin_add_item_row">
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Produktname:</span>
            <input type="text" class="admin_add_item_input" id="add_item_name" name="add_item_name">
        </div>
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Hersteller:</span>
            <input type="text" class="admin_add_item_input" id="add_item_brand" name="add_item_brand">
        </div>
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Preis:</span>
            <input class="admin_add_item_input admin_add_item_input_small" id="add_item_price" name="add_item_price">
        </div>
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Auf Lager:</span>
            <input type="number" class="admin_add_item_input admin_add_item_input_small" id="add_item_stock" name="add_item_stock">
        </div>
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Produktbild:</span>
            <input type="file" class="admin_add_item_button" id="admin_add_item_upload" name="admin_add_item_upload">
        </div>
    </div>
    <div class="admin_add_item_row">
        <div class="admin_add_item_col">
            <span class="admin_add_item_text">Beschreibung:</span>
            <textarea class="admin_add_item_input admin_add_item_input_big" id="add_item_description" name="add_item_description"></textarea>
        </div>
        <div class="admin_add_item_buttons">
            <input class="admin_add_item_button" id="admin_add_item_done" type="submit" value="Fertig">
            <button class="admin_add_item_button" id="admin_add_item_cancel">Abbruch</button>
            <input type="number" id="admin_item_id" name="admin_item_id">
        </div>  
    </div>
</form>
';

<?php
require_once '../../initialized.php';

$selectedItems = $functions->validate($_POST["items"]);

$separate_item_ID = explode(",", $selectedItems);

foreach ($separate_item_ID as $separated_item) {
       $database->DBQuery("DELETE FROM `cart` WHERE `c_id` = ?", [$separated_item]); 
}

$functions->notification("success","Selected items successfully removed.", "yes", "");
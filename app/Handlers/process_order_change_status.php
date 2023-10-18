<?php
require_once '../../initialized.php';

$id = $functions->validate($_POST['id']);
$value = $functions->validate($_POST['value']);

$database->DBQuery("UPDATE `orders` SET `order_status` = ? WHERE `order_id` = ?",[$value, $id]);
       
$functions->notification("success","Order status successfully changed.", "yes", "");

$database->closeConnection();
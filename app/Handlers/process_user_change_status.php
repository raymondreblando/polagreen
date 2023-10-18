<?php
require_once '../../initialized.php';

$id = $functions->validate($_POST['id']);
$value = $functions->validate($_POST['value']);

$database->DBQuery("UPDATE `users` SET `status` = ? WHERE `user_id` = ?",[$value, $id]);
       
$functions->notification("success","User successfully block.", "yes", "");

$database->closeConnection();
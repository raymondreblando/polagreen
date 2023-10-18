<?php
require_once '../../initialized.php';

$identifier = $functions->validate($_POST['identifier']);
$newCountValue = $functions->validate($_POST['newCountValue']);

$database->DBQuery("UPDATE `cart` SET `quantity`=? WHERE `c_id` = ?", [$newCountValue, $identifier]);

$database->closeConnection();
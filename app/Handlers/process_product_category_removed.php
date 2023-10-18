<?php
require_once '../../initialized.php';

$id = $functions->validate($_POST['id']);

$database->DBQuery("SELECT * FROM `category` WHERE `category_id`=? LIMIT 1",[$id]);
if($database->rowCount() > 0){
       $database->DBQuery("DELETE FROM `category` WHERE `category_id`=?",[$id]);
       $functions->notification("success","Successfully removed.", "yes", "");
}else{
       $functions->notification("error","Sorry there is an error found. Please ty again later.", "no", "");
}


$database->closeConnection();
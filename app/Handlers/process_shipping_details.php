<?php
require_once '../../initialized.php';

$zone = $functions->validate($_POST['zone']);
$address = $functions->validate($_POST['address']);
$zip_code = $functions->validate($_POST['zip_code']);
$phone_number = $functions->validate($_POST['phone_number']);

if(empty($zone) OR empty($address) OR empty($phone_number)){
       $functions->notification("error","Please field up all the fields.", "no", "");
}else{
       $database->DBQuery("SELECT `user_id` FROM `shipping` WHERE `user_id` = ?",[$_SESSION['uid']]);
       if($database->rowCount() > 0){
              $database->DBQuery("UPDATE `shipping` SET `s_zone`=?,`s_address`=?,`s_contact`=?,`s_zip`=? WHERE `user_id` = ?",[$zone, $address, $phone_number, $zip_code, $_SESSION['uid']]);
              $functions->notification("success","Shipping Information Successfully Saved.", "no", "");
       }else{
              $database->DBQuery("INSERT INTO `shipping` (`s_id`,`s_zone`,`s_address`,`s_contact`,`s_zip`,`user_id`) VALUES (?,?,?,?,?,?)",[RANDOM_ID, $zone, $address, $phone_number, $zip_code, $_SESSION['uid']]);
              $functions->notification("success","Shipping Information Successfully Saved.", "no", "");
       }
}

$database->closeConnection();
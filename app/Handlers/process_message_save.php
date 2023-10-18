<?php
require_once '../../initialized.php';

$fullname = $functions->validate($_POST['fullname']);
$subject = $functions->validate($_POST['subject']);
$email = $functions->validate($_POST['email']);
$address = $functions->validate($_POST['address']);
$message = $functions->validate($_POST['message']);

if(empty($fullname) OR empty($subject) OR empty($email) OR empty($address) OR empty($message)){
       $functions->notification("error","Please field up all the fields.", "no", "");
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $functions->notification("error","Invalid email address.", "no", "");
}else{
       $database->DBQuery("INSERT INTO `message` (`msg_id`,`msg_fullname`,`msg_subject`,`msg_email`,`msg_address`,`msg_content`,`msg_date`) VALUES (?,?,?,?,?,?,?)",[RANDOM_ID, $fullname, $subject, $email, $address, $message, TODAYS]);
       $functions->notification("success","Successfully save.", "yes", "");
}

$database->closeConnection();
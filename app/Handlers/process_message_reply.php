<?php
require_once '../../initialized.php';

$id = $functions->validate($_POST['id']);
$reply = $functions->validate($_POST['reply']);

if(empty($reply)){
       $functions->notification("error","Please write a reply.", "no", "");
}else{
       $database->DBQuery("SELECT * FROM `message` WHERE `msg_id` = ?", [$id]);
       $receiver = $database->fetch();

       $email_send->sendEmail($receiver->msg_email, 'Pola Green', $reply);

       $database->DBQuery("INSERT INTO `reply` (`msg_id`,`reply`,`r_date`) VALUES (?,?,?)", [$id, $reply, TODAYS]);

       $functions->notification("success","Your message has been sent.", "yes", "");
}

$database->closeConnection();
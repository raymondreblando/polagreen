<?php
require_once '../../initialized.php';

$fullname = $functions->validate($_POST['fullname']);
$email = $functions->validate($_POST['email']);
$gender = $functions->validate($_POST['gender']);
$username = $functions->validate($_POST['username']);
$phone_number = $functions->validate($_POST['phone_number']);
$address = $functions->validate($_POST['address']);
$password = $functions->validate($_POST['password']);
$confirm_password = $functions->validate($_POST['confirm_password']);

if(empty($fullname) OR empty($email) OR empty($gender) OR empty($username) OR empty($phone_number) OR empty($address) OR empty($password) OR empty($confirm_password)){
       $functions->notification("error","Please fill-up all the fields.", "no", "");
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $functions->notification("error","Invalid email address.", "no", "");
}elseif($password !== $confirm_password){
       $functions->notification("error","Passwords didn't match.", "no", "");
}elseif(strlen($password) < 6){
       $functions->notification("error","Password must be more than 6 characters.", "no", "");
}elseif(strlen($username) > 40){
       $functions->notification("error","Username must be 6-40 character Only!.", "no", "");
}else{
       $database->DBQuery("SELECT * FROM `users` WHERE `email`=?",[$email]);
       if($database->rowCount() > 0){
              $functions->notification("error","Email address already used by other users.", "no", "");
       }else{
              $database->DBQuery("INSERT INTO `users` (`user_id`,`username`,`password`,`fullname`,`email`,`contact`,`address`,`gender`,`date_created`) VALUES (?,?,?,?,?,?,?,?,?)",[RANDOM_ID, $username, md5($password), $fullname, $email, $phone_number, $address, $gender, TODAYS]);
              $functions->notification("success","Successfully Register.", "yes", "");
       }
}

$database->closeConnection();
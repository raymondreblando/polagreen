<?php
require_once '../../initialized.php';


$fullname = $functions->validate($_POST['fullname']);
$email = $functions->validate($_POST['email']);
$gender = $functions->validate($_POST['gender']);
$username = $functions->validate($_POST['username']);
$phone_number = $functions->validate($_POST['phone_number']);
$address = $functions->validate($_POST['address']);

if(empty($fullname) OR empty($email) OR empty($gender) OR empty($username) OR empty($phone_number) OR empty($address)){
       $functions->notification("error","Please fill up all the fields.", "no", "");
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $functions->notification("error","Invalid email address.", "no", "");
}elseif(strlen($username) > 40){
       $functions->notification("error","Username must be 6-40 character Only!.", "no", "");
}else{
       $database->DBQuery("UPDATE `users` SET `fullname` = ?,`email`=?,`contact`=?,`address`=?,`gender`=?,`username`=? WHERE `user_id` = ?",[$fullname, $email, $phone_number, $address, $gender, $username, $_SESSION['uid']]);
       $functions->notification("success","Account successfully updated.", "yes", "");
}

$database->closeConnection();
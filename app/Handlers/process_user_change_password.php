<?php
require_once '../../initialized.php';


$current_password = $functions->validate($_POST['current_password']);
$new_password = $functions->validate($_POST['new_password']);
$confirm_password = $functions->validate($_POST['confirm_password']);

if(empty($current_password)){
       $functions->notification("error","Please enter current password.", "no", "");
}elseif(empty($new_password)){
       $functions->notification("error","Enter new password.", "no", "");
}elseif(empty($confirm_password)){
       $functions->notification("error","Confirm new password.", "no", "");
}elseif($new_password !== $confirm_password){
       $functions->notification("error","Passwords didn't match.", "no", "");
}elseif(strlen($new_password) < 6){
       $functions->notification("error","Password must be more than 6 characters.", "no", "");
}else{
       $database->DBQuery("SELECT * FROM `users` WHERE `user_id`=? AND `password`=?",[$_SESSION['uid'], md5($current_password)]);
       if($database->rowCount() > 0){
              $database->DBQuery("UPDATE `users` SET `password` = ? WHERE `user_id` = ?",[md5($new_password), $_SESSION['uid']]);
              $functions->notification("success","Password successfully change.", "yes", "");
       }else{
              $functions->notification("error","Wrong current password.", "no", "");
       }
}

$database->closeConnection();
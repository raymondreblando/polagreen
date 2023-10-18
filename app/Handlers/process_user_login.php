<?php
require_once '../../initialized.php';

$email = $functions->validate($_POST['email']);
$password = $functions->validate($_POST['password']);

if(empty($email) OR empty($password)){
    $functions->notification("error","Please provide your email and password.", "no", "");
}else{
    $database->DBQuery("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?", [$email, md5($password)]);
    $user = $database->fetch();
    if($database->rowCount() > 0){
        if($user->status === "Block"){
            $functions->notification("error","Your account has been block.", "no", "");
        }else{
            $_SESSION["logged"] = true;
            $_SESSION["uid"] = $user->user_id;
            $_SESSION["role"] = $user->role_id;

            if($user->role_id === "231232163"){
                $functions->notification("success","Login Successfully", "no", SYSTEM_URL."/dashboard-product-inventory");
            }else{
                $functions->notification("success","Login Successfully", "no", SYSTEM_URL."/products");
            }
        }
    }else{
        $functions->notification("error","Wrong username and password.", "no", "");
    }
}

$database->closeConnection();
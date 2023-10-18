<?php
require_once '../../initialized.php';

$category = $functions->validate($_POST['category']);

if(empty($category)){
       $functions->notification("error","Please provide category name.", "no", "");
}else{
       $database->DBQuery("SELECT * FROM `category` WHERE `category_name`=?",[$category]);
       if($database->rowCount() > 0){
              $functions->notification("error","Category name already exist", "no", "");
       }else{
              $database->DBQuery("INSERT INTO `category` (`category_id`,`category_name`,`category_date_added`) VALUES (?,?,?)",[RANDOM_ID, $category, TODAYS]);
              $functions->notification("success","Successfully save.", "yes", "");
       }
}

$database->closeConnection();
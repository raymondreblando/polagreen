<?php
require_once '../../initialized.php';

$product_name = $functions->validate($_POST['product_name']);
$category = $functions->validate($_POST['category']);
$price = $functions->validate($_POST['price']);
$stocks = $functions->validate($_POST['stocks']);
$status = $functions->validate($_POST['status']);

if(empty($product_name) OR empty($category) OR empty($price) OR empty($stocks) OR empty($status)){
       $functions->notification("error","Please fill up all the fields.", "no", "");
}else{
       if (!empty($_FILES["product_img_1"]) AND !empty($_FILES["product_img_2"]) AND !empty($_FILES["product_img_3"]) AND !empty($_FILES["product_img_4"])) {
              $allowTypes = array('jpg', 'png', 'jpeg');
              $uploadDir = "../../uploads/products/";
              $filename_1 = $_FILES["product_img_1"]["name"];
              $filename_2 = $_FILES["product_img_2"]["name"];
              $filename_3 = $_FILES["product_img_3"]["name"];
              $filename_4 = $_FILES["product_img_4"]["name"];
              $getFileExt_1 = pathinfo($filename_1, PATHINFO_EXTENSION);
              $getFileExt_2 = pathinfo($filename_2, PATHINFO_EXTENSION);
              $getFileExt_3 = pathinfo($filename_3, PATHINFO_EXTENSION);
              $getFileExt_4 = pathinfo($filename_4, PATHINFO_EXTENSION);
              $newFilename_1 = $functions->randomString(35)."_1." . $getFileExt_1;
              $newFilename_2 = $functions->randomString(35)."_2." . $getFileExt_2;
              $newFilename_3 = $functions->randomString(35)."_3." . $getFileExt_3;
              $newFilename_4 = $functions->randomString(35)."_4." . $getFileExt_4;
              if(!in_array($getFileExt_1, $allowTypes)){
                     $functions->notification("error","First attached file not supported.", "no", "");
              }elseif(!in_array($getFileExt_2, $allowTypes)){
                     $functions->notification("error","Second attached file not supported.", "no", "");
              }elseif(!in_array($getFileExt_3, $allowTypes)){
                     $functions->notification("error","Third attached file not supported.", "no", "");
              }elseif(!in_array($getFileExt_4, $allowTypes)){
                     $functions->notification("error","Fourth attached file not supported.", "no", "");
              }else{

                     $database->DBQuery("SELECT `product_name` FROM `product` WHERE `product_name` = ?",[$product_name]);

                     if($database->rowCount() > 0){
                            $functions->notification("error","Product name already exist.", "no", "");
                     }else{
                            move_uploaded_file($_FILES["product_img_1"]["tmp_name"], $uploadDir . $newFilename_1);
                            move_uploaded_file($_FILES["product_img_2"]["tmp_name"], $uploadDir . $newFilename_2);
                            move_uploaded_file($_FILES["product_img_3"]["tmp_name"], $uploadDir . $newFilename_3);
                            move_uploaded_file($_FILES["product_img_4"]["tmp_name"], $uploadDir . $newFilename_4);

                            $database->DBQuery("INSERT INTO `product` (`product_id`,`product_name`,`category_id`,`product_price`,`product_stocks`,`product_status`,`product_thumbnail_1`,`product_thumbnail_2`,`product_thumbnail_3`,`product_thumbnail_4`,`product_date_added`) VALUES (?,?,?,?,?,?,?,?,?,?,?)",[RANDOM_ID, $product_name, $category, $price, $stocks, $status, $newFilename_1, $newFilename_2, $newFilename_3, $newFilename_4, TODAYS]);

                            $functions->notification("success","Product successfully added.", "yes", "");
                     }

              }
          }else{
              $functions->notification("error","Please upload image.", "no", "");
          }
}

$database->closeConnection();
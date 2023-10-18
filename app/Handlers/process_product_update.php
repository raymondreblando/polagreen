<?php
require_once '../../initialized.php';

$id = $functions->validate($_POST['id']);
$product_name = $functions->validate($_POST['product_name']);
$category = $functions->validate($_POST['category']);
$price = $functions->validate($_POST['price']);
$stocks = $functions->validate($_POST['stocks']);
$status = $functions->validate($_POST['status']);

if(empty($product_name) OR empty($category) OR empty($price) OR empty($stocks) OR empty($status)){
       $functions->notification("error","Please fill up all the fields.", "no", "");
}else{

     $allowTypes = array('jpg', 'png', 'jpeg');
     $uploadDir = "../../uploads/products/";

     if(!empty($_FILES["product_img_1"])){
          $filename_1 = $_FILES["product_img_1"]["name"];
          $getFileExt_1 = pathinfo($filename_1, PATHINFO_EXTENSION);
          $newFilename_1 = $functions->randomString(35)."_1." . $getFileExt_1;

          if(!in_array($getFileExt_1, $allowTypes)){
               $functions->notification("error","Uploaded file not supported.", "no", "");
          }

          $database->DBQuery("SELECT `product_thumbnail_1` FROM `product` WHERE `product_id` = ?",[$id]);
          $row = $database->fetch();

          unlink($uploadDir.$row->product_thumbnail_1);

          move_uploaded_file($_FILES["product_img_1"]["tmp_name"], $uploadDir . $newFilename_1);

          $database->DBQuery("UPDATE `product` SET `product_thumbnail_1` = ? WHERE `product_id` = ?",[$newFilename_1, $id]);
     }

     if(!empty($_FILES["product_img_2"])){
          $filename_2 = $_FILES["product_img_2"]["name"];
          $getFileExt_2 = pathinfo($filename_2, PATHINFO_EXTENSION);
          $newFilename_2 = $functions->randomString(35)."_2." . $getFileExt_2;

          if(!in_array($getFileExt_2, $allowTypes)){
               $functions->notification("error","Uploaded file not supported.", "no", "");
          }

          $database->DBQuery("SELECT `product_thumbnail_2` FROM `product` WHERE `product_id` = ?",[$id]);
          $row = $database->fetch();

          unlink($uploadDir.$row->product_thumbnail_2);

          move_uploaded_file($_FILES["product_img_2"]["tmp_name"], $uploadDir . $newFilename_2);

          $database->DBQuery("UPDATE `product` SET `product_thumbnail_2` = ? WHERE `product_id` = ?",[$newFilename_2, $id]);
     }

     if(!empty($_FILES["product_img_3"])){
          $filename_3 = $_FILES["product_img_3"]["name"];
          $getFileExt_3 = pathinfo($filename_3, PATHINFO_EXTENSION);
          $newFilename_3 = $functions->randomString(35)."_3." . $getFileExt_3;

          if(!in_array($getFileExt_3, $allowTypes)){
               $functions->notification("error","Uploaded file not supported.", "no", "");
          }

          $database->DBQuery("SELECT `product_thumbnail_3` FROM `product` WHERE `product_id` = ?",[$id]);
          $row = $database->fetch();

          unlink($uploadDir.$row->product_thumbnail_3);

          move_uploaded_file($_FILES["product_img_3"]["tmp_name"], $uploadDir . $newFilename_3);

          $database->DBQuery("UPDATE `product` SET `product_thumbnail_3` = ? WHERE `product_id` = ?",[$newFilename_3, $id]);
     }

     if(!empty($_FILES["product_img_4"])){
          $filename_4 = $_FILES["product_img_4"]["name"];
          $getFileExt_4 = pathinfo($filename_4, PATHINFO_EXTENSION);
          $newFilename_4 = $functions->randomString(35)."_4." . $getFileExt_4;

          if(!in_array($getFileExt_4, $allowTypes)){
               $functions->notification("error","Uploaded file not supported.", "no", "");
          }

          $database->DBQuery("SELECT `product_thumbnail_4` FROM `product` WHERE `product_id` = ?",[$id]);
          $row = $database->fetch();

          unlink($uploadDir.$row->product_thumbnail_4);

          move_uploaded_file($_FILES["product_img_4"]["tmp_name"], $uploadDir . $newFilename_4);

          $database->DBQuery("UPDATE `product` SET `product_thumbnail_4` = ? WHERE `product_id` = ?",[$newFilename_4, $id]);
     }

     $database->DBQuery("SELECT `product_id`,`product_name` FROM `product` WHERE `product_name` = ? AND `product_id` <> ?",[$product_name, $id]);

     if($database->rowCount() > 0){
            $functions->notification("error","Product name already exist.", "no", "");
     }else{
            $database->DBQuery("UPDATE `product` SET `product_name`=?,`category_id`=?,`product_price`=?,`product_stocks`=?,`product_status`=? WHERE `product_id` = ?",[$product_name, $category, $price, $stocks, $status, $id]);

            $functions->notification("success","Product successfully updated.", "yes", "");
     }
}

$database->closeConnection();
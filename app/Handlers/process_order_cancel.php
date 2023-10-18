<?php
require_once '../../initialized.php';

$id = $functions->validate($_POST['id']);

$database->DBQuery("SELECT * FROM `my_order` WHERE `order_id` = ?",[$id]);
foreach($database->fetchAll() AS $row){
      $database->DBQuery("SELECT `product_id`,`product_stocks` FROM `product` WHERE `product_id` = ?", [$row->product_id]);
      $productDetail = $database->fetch();

      $database->DBQuery("UPDATE `product` SET `product_stocks` = ? WHERE `product_id` = ?", [($productDetail->product_stocks + $row->quantity), $row->product_id]);
}

$database->DBQuery("UPDATE `orders` SET `order_status` = 'Cancelled' WHERE `order_id` = ?",[$id]);
       
$functions->notification("success","Order successfully cancel.", "yes", "");

$database->closeConnection();
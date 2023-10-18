<?php
require_once '../../initialized.php';

$totalAmount = $functions->validate($_POST['totalAmount']);

$database->DBQuery("SELECT `order_no`,`order_id` FROM `orders` ORDER BY `order_no` DESC LIMIT 1");
$getCurrentOrderID = $database->fetch();
if($database->rowCount() > 0){
       $orderID = $getCurrentOrderID->order_id + 1;
}else{
       $orderID = "10000001";
}

$database->DBQuery("SELECT * FROM `cart` WHERE `user_id` = ?", [$_SESSION['uid']]);
$cartItems = $database->fetchAll();
if($database->rowCount() > 0){
       $database->DBQuery("SELECT * FROM `shipping` WHERE `user_id` = ?", [$_SESSION['uid']]);
       if($database->rowCount() > 0){
              foreach($cartItems as $cartItem){
                     $database->DBQuery("INSERT INTO `my_order` (`order_id`,`product_id`,`quantity`) VALUES (?,?,?)", [$orderID, $cartItem->product_id, $cartItem->quantity]);

                     $database->DBQuery("SELECT `product_id`,`product_stocks` FROM `product` WHERE `product_id` = ?", [$cartItem->product_id]);
                     $productDetail = $database->fetch();

                     $database->DBQuery("UPDATE `product` SET `product_stocks` = ? WHERE `product_id` = ?", [($productDetail->product_stocks - $cartItem->quantity), $cartItem->product_id]);
              }

              $database->DBQuery("INSERT INTO `orders` (`order_id`,`user_id`,`order_type`,`amount`,`order_date`) VALUES (?,?,?,?,?)", [ $orderID, $_SESSION['uid'], 'Cash on Delivery', $totalAmount, TODAYS]);

              $database->DBQuery("DELETE FROM `cart` WHERE `user_id` = ?", [$_SESSION['uid']]);
 
              $functions->notification("success","Your order are successfully checkout.", "yes", "");
       }else{
              $functions->notification("error","Please setup shipping information.", "no", "");
       }
}else{
       $functions->notification("error","Your cart is empty.", "no", "");
}

$database->closeConnection();
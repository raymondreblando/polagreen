<?php
require_once '../../initialized.php';

$identifier = $functions->validate($_POST['identifier']);

$database->DBQuery("SELECT `c_no` FROM `cart` WHERE `user_id`=?",[$_SESSION['uid']]);
$cartCount = $database->rowCount() + 1;

if(empty($identifier)){
       $functions->notification("error","There is a problem saving your order. Please try again later.", "no", "");
}else{
       $database->DBQuery("SELECT * FROM `cart` WHERE `user_id`=? AND `product_id` = ?",[$_SESSION['uid'], $identifier]);
       if($database->rowCount() > 0){
              $functions->notification("error","This product are already added on your cart.", "no", "");
       }else{
              $database->DBQuery("INSERT INTO `cart` (`c_id`,`user_id`,`product_id`) VALUES (?,?,?)",[RANDOM_ID, $_SESSION['uid'], $identifier]);
              $data = array(
                     'responseType' => 'success',
                     'responseMsg' => 'Order successfully added.',
                     'responseEvent' => 'no',
                     'responseRedirect' => '',
                     'cartCount'  => $cartCount
              );
              header('Content-Type: application/json');
              $json = json_encode($data);
              echo $json;
       }
}

$database->closeConnection();
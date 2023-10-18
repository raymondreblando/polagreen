<?php
$page_title = "My Order";
$tab_active = "My Order";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="relative">
  
  <?php include('Partials/customer_navigation.php'); ?>


    <section class="min-h-screen bg-accent overflow-hidden pt-32 pb-24">
      <div class="w-[80%] mx-auto">
        <h1 class="text-3xl text-dark font-bold text-center">Order Transactions</h1>
        <p class="text-sm text-gray-600 text-center mb-12">Harvest Your Selections: Checkout and Cultivate Your Cart.</p>
        <div class="max-w-[950px] grid md:grid-cols-2 xl:grid-cols-3 gap-8 mx-auto">
          <?php
                $database->DBQuery("SELECT * FROM `orders` WHERE `user_id`=? ORDER BY orders.order_no DESC", [$_SESSION['uid']]);
                foreach($database->fetchAll() AS $order):
          ?>
              <div class="order-card order-card-<?= strtolower($order->order_status) ?>">
                <div class="flex justify-between items-center gap-4 py-5 border-b border-b-gray-300/40">
                  <div>
                    <p class="text-sm text-dark font-semibold"><?= $order->order_id ?></p>
                    <p class="text-xs text-gray-500"><?= $functions->formatDateTime($order->order_date, "M d, Y h:s A") ?></p>
                  </div>
                  <span class="order-status status-<?= strtolower($order->order_status) ?>"><?= $order->order_status ?></span>
                </div>
                <div class="flex items-center justify-between border-b border-b-gray-300/40">
                  <span class="text-xs text-gray-500 py-3"><?= $order->order_type ?></span>
                  <span class="text-xs text-gray-500 py-3">&#8369;  <?= $order->amount ?></span>
                </div>
                <div class="grid grid-cols-2 gap-2 py-3 border-b border-b-gray-300/40">
                  <?php
                        $database->DBQuery("SELECT * FROM `my_order` LEFT JOIN `product` ON my_order.product_id=product.product_id WHERE my_order.order_id = ? ORDER BY my_order.my_order_no DESC", [$order->order_id]);
                        foreach($database->fetchAll() AS $item):
                  ?>
                      <div class="flex items-center gap-x-2 mb-3">
                        <img src="<?= SYSTEM_URL."/uploads/products/".$item->product_thumbnail_1 ?>" alt="plant" class="w-10 h-10 rounded-full object-cover">
                        <div>
                          <p class="text-sm text-dark font-semibold"><?= $item->product_name ?></p>
                          <p class="text-xs text-gray-500">&#8369;  <?= $item->product_price ?> x <?= $item->quantity ?></p>
                        </div>
                      </div>
                  <?php endforeach ?>
                </div>
                <?php if($order->order_status === "Pending"): ?>
                    <button data-id="<?= $order->order_id ?>" class="cancel-order cancel-btn w-full flex justify-center items-center gap-1 bg-whitesmoke text-dark py-3 px-4 text-xs font-semibold">
                      <i class="ri-close-line text-sm"></i>
                      Cancel Order
                    </button>
                <?php endif ?>
              </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>

<?php include('Partials/section.php'); ?>
<?php include('Partials/footer.php'); ?>
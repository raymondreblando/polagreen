<?php
$page_title = "Orders";
$tab_active = "Orders";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <?php include('Partials/admin_navigation.php'); ?>

    <div>
      <div class="flex items-center justify-between gap-4 bg-white py-4 px-8 border-b border-b-gray-300/40">
        <div class="flex items-center gap-3">
          <button class="show-sidebar block md:hidden text-lg font-bold"><i class="ri-menu-line"></i></button>
          <div>
            <p class="text-sm font-semibold text-dark">Orders</p>
            <p class="hidden md:block text-[9px] text-gray-500">Customer order list</p>
          </div>
        </div>
        <div class="w-[7rem] h-10 flex items-center gap-3">
          <i class="ri-search-line text-lg text-gray-500"></i>
          <input type="text" class="search-div w-full text-gray-500 text-xs font-medium placeholder:text-gray-500 outline-none" id="search-input" placeholder="Search here" autocomplete="off">
        </div>
      </div>
      <div class="py-6 px-8">
        <div class="flex flex-col-reverse sm:flex-row justify-between items-center gap-4 mb-6">
          <div class="flex items-center gap-2">
                <button id="all-button" class="h-10 px-4 bg-white text-xs font-medium rounded-md border border-gray-300/40">All</button>
              <button id="pending-button" class="h-10 px-4 bg-white text-xs font-medium rounded-md border border-gray-300/40">Pending</button>
            <button id="confirmed-button" class="h-10 px-4 bg-white text-xs font-medium rounded-md border border-gray-300/40">Confirmed</button>
            <button id="completed-button" class="h-10 px-4 bg-white text-xs font-medium rounded-md border border-gray-300/40">Completed</button>
            <button id="cancelled-button" class="h-10 px-4 bg-white text-xs font-medium rounded-md border border-gray-300/40">Cancelled</button>
          </div>
        </div>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8 mx-auto">
          <?php
                $database->DBQuery("SELECT * FROM `orders` LEFT JOIN `shipping` ON orders.user_id=shipping.user_id LEFT JOIN `users` ON orders.user_id=users.user_id ORDER BY orders.order_no DESC");
                foreach($database->fetchAll() AS $order):
          ?>
              <div class="search-area">
                <div class="order-card order-card-<?= strtolower($order->order_status) ?>">
                  <div class="flex justify-between items-center gap-4 py-5 border-b border-b-gray-300/40">
                    <div>
                      <p class="text-sm text-dark font-semibold finder1"><?= $order->order_id ?></p>
                      <p class="text-xs text-gray-500 finder2"><?= $functions->formatDateTime($order->order_date, "M d, Y h:s A") ?></p>
                    </div>
                    <span class="finder4 order-status status-<?= strtolower($order->order_status) ?>"><?= $order->order_status ?></span>
                  </div>
                  <div class="border-b border-b-gray-300/40 py-3">
                  <div class="flex items-center justify-between mb-2">
                      <span class="text-xs font-semibold text-black"><?= $order->fullname ?></span>
                    </div>
                    <div class="flex items-center justify-between mb-2">
                      <span class="text-xs text-gray-500"><?= $order->s_zone.", ".$order->s_address.", ".$order->s_zip ?></span>
                      <span class="text-xs text-gray-500"><?= $order->s_contact ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                      <span class="text-xs text-gray-500"><?= $order->order_type ?></span>
                      <span class="text-xs text-gray-500">&#8369;  <?= $order->amount ?></span>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2 py-3 border-b border-b-gray-300/40">
                  <?php
                        $database->DBQuery("SELECT * FROM `my_order` LEFT JOIN `product` ON my_order.product_id=product.product_id WHERE my_order.order_id = ? ORDER BY my_order.my_order_no DESC", [$order->order_id]);
                        foreach($database->fetchAll() AS $item):
                  ?>
                      <div class="flex items-center gap-x-2 mb-3">
                        <img src="<?= SYSTEM_URL."/uploads/products/".$item->product_thumbnail_1 ?>" alt="plant" class="w-10 h-10 rounded-full object-cover">
                        <div>
                          <p class="text-xs text-dark font-semibold finder3"><?= $item->product_name ?></p>
                          <p class="text-[10px] font-semibold text-gray-500">&#8369;  <?= $item->product_price ?> x <?= $item->quantity ?></p>
                        </div>
                      </div>
                  <?php endforeach ?>
                </div>
                  <?php if($order->order_status === "Pending" OR $order->order_status === "Confirmed"): ?>
                    <div class="border-y border-y-gray-300/40 py-4 mt-auto">
                      <p class="text-xs text-gray-500 mb-2">Change Order Status</p>
                      <div class="flex items-center justify-start flex-wrap gap-1">
                        <span data-value="Pending" data-id="<?= $order->order_id ?>" class="change-order shrink-0 text-[10px] font-medium border border-gray-300/40 rounded-md py-2 px-3 cursor-pointer">Pending</span>
                        <span data-value="Confirmed" data-id="<?= $order->order_id ?>" class="change-order shrink-0 text-[10px] font-medium border border-gray-300/40 rounded-md py-2 px-3 cursor-pointer">Confirmed</span>
                        <span data-value="Completed" data-id="<?= $order->order_id ?>" class="change-order shrink-0 text-[10px] font-medium border border-gray-300/40 rounded-md py-2 px-3 cursor-pointer">Completed</span>
                      </div>
                    </div>
                  <?php endif ?>
                </div>
              </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </main>

  <?php include('Partials/footer.php'); ?>
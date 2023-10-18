<?php
$page_title = "Pola Green";
$tab_active = "Products";

require_once("./initialized.php");

include('Partials/header.php');

$database->DBQuery("SELECT * FROM `product` LEFT JOIN `category` ON product.category_id=category.category_id WHERE `product_id` = ?", [$id]);
$product_info = $database->fetch();

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="relative">
  
  <?php include('Partials/customer_navigation.php'); ?>

  <section class="min-h-screen bg-accent overflow-hidden pt-32 md:pt-44">
      <div class="w-[min(60rem,80%)] mx-auto">
        <button type="button" onclick="history.back()" class="back-btn flex items-center gap-2 text-sm text-gray-500 mb-4">
          <i class="ri-arrow-left-s-line text-lg"></i>
          Back
        </button>

        <div class="grid md:grid-cols-2 gap-4 md:gap-12">
          <div class="rounded-md overflow-hidden">
            <img src="<?php echo SYSTEM_URL."/uploads/products/".$product_info->product_thumbnail_1 ?>" alt="plant" class="w-full h-[300px] object-cover object-center mb-2">
            <div class="grid grid-cols-3 gap-2">
              <img src="<?php echo SYSTEM_URL."/uploads/products/".$product_info->product_thumbnail_2 ?>" alt="plant" class="w-full h-full object-cover object-center">
              <img src="<?php echo SYSTEM_URL."/uploads/products/".$product_info->product_thumbnail_3 ?>" alt="plant" class="w-full h-full object-cover object-center">
              <img src="<?php echo SYSTEM_URL."/uploads/products/".$product_info->product_thumbnail_4 ?>" alt="plant" class="w-full h-full object-cover object-center">
            </div>
          </div>
          <div class="py-8 flex flex-col">
            <h1 class="text-4xl font-semibold text-dark mb-4"><?php echo $product_info->product_name ?></h1>
            <div class="flex gap-12 mb-12">
              <div>
                <p class="text-sm font-medium text-gray-500">Category</p>
                <h3 class="text-xl font-semibold text-dark"><?php echo $product_info->category_name ?></h3>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Price</p>
                <h3 class="text-xl font-semibold text-dark">&#8369; <?php echo $product_info->product_price ?></h3>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Stocks</p>
                <h3 class="text-xl font-semibold text-dark"><?php echo $product_info->product_stocks ?></h3>
              </div>
            </div>
            <div class="w-fit flex items-center border border-gray-300/40 rounded-md">
              <button class="minus-btn py-3 px-6 hover:bg-gray-100"><i class="ri-subtract-line pointer-events-none"></i></button>
              <div class="p_counter py-3 px-6 border-x border-x-gray-300/40">1</div>
              <button class="add-btn py-3 px-6 hover:bg-gray-100"><i class="ri-add-line pointer-events-none"></i></button>
            </div>
            <?php if(isset($_SESSION["uid"]) AND isset($_SESSION["logged"])): ?>
                  <?php if($_SESSION["role"] !== "231232163"): ?>
                      <button data-id="<?php echo $id ?>" class="saveOrderWithQty w-fit flex items-center gap-3 bg-primary text-sm text-white mt-6 md:mt-auto py-4 px-6 rounded-md">
                        <img src="<?php echo SYSTEM_URL ?>/public/icons/shopping-cart-linear.svg" alt="cart" class="w-5 h-5">
                        Add to Cart
                      </button>
                <?php endif ?>
            <?php else: ?>
                <button onclick="window.location.href='<?= SYSTEM_URL.'/login' ?>'" class="w-fit flex items-center gap-3 bg-primary text-sm text-white mt-6 md:mt-auto py-4 px-6 rounded-md">
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/shopping-cart-linear.svg" alt="cart" class="w-5 h-5">
                  Add to Cart
                </button>
            <?php endif ?>
          </div>
        </div>
      </div>
    </section>

<?php include('Partials/section.php'); ?>
<?php include('Partials/footer.php'); ?>
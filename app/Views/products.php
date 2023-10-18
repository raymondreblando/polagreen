<?php
$page_title = "Pola Green";
$tab_active = "Products";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="relative">
  
  <?php include('Partials/customer_navigation.php'); ?>

    <section class="min-h-screen bg-accent overflow-hidden pt-32 pb-24">
      <h1 class="text-3xl text-dark font-bold text-center">Pola Green Products</h1>
      <p class="text-sm text-gray-600 text-center mb-12">Welcome to our enchanting nursery and farm. <br> Experience a green oasis where nature flourishes and dreams grow.</p>
      <div class="w-[80%] md:w-[85%] grid md:grid-cols-[15rem_auto] gap-6 mx-auto">
        <div class="filter-container">
          <p class="text-sm font-semibold text-dark mb-3">Categories</p>
          <ul class="border-l border-l-gray-300/40 mb-4">
            <li class="filter-option category-option active">All</li>
            <?php
              $database->DBQuery("SELECT * FROM `category` ORDER BY `category_name` ASC");
              foreach($database->fetchAll() AS $category){
                echo '<li class="filter-option category-option">'.$category->category_name.'</li>';
              }
            ?>
          </ul>
          <p class="text-sm font-semibold text-dark mb-3">Prices</p>
          <ul class="border-l border-l-gray-300/40 mb-4">
            <li class="filter-option price-option active">All</li>
            <li class="filter-option price-option">1 - 100</li>
            <li class="filter-option price-option">100 - 200</li>
            <li class="filter-option price-option">200 - 300</li>
            <li class="filter-option price-option">500 - 1000</li>
            <li class="filter-option price-option">1000 Up</li>
          </ul>
        </div>
        <div>
          <div class="flex md:hidden items-center justify-between gap-4 mb-4">
            <button class="show-filter bg-gray-100 w-12 h-12 rounded-md"><i class="ri-menu-unfold-line"></i></button>
            <div class="bg-gray-100 flex items-center gap-3 h-12 px-6 rounded-md">
              <i class="ri-search-line"></i>
              <input type="text" class="search-div search-input w-full text-sm text-dark outline-none placeholder:text-dark bg-transparent" placeholder="Search product..." autocomplete="off">
            </div>
          </div>
          <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-14">
            <?php
                $num = 1;
                $database->DBQuery("SELECT * FROM `product` LEFT JOIN `category` ON product.category_id=category.category_id ORDER BY `product_name` ASC");
                foreach($database->fetchAll() AS $product):
            ?>
                <div class="search-area">
                    <div class="filter-identifier relative bg-whitesmoke pt-[5.5rem] mt-24 rounded-2xl">
                      <img src="<?= SYSTEM_URL."/uploads/products/".$product->product_thumbnail_1 ?>" alt="plant" class="absolute -top-16 left-1/2 -translate-x-1/2 w-[140px] h-[140px] object-cover object-center rounded-full">
                      <div class="px-8 mb-4">
                        <a href="<?= SYSTEM_URL.'/view-product/'.$product->product_id ?>" class="block font-semibold text-black text-center finder1"><?= $product->product_name ?></a>
                        <p class="text-xs font-medium text-dark leading-none text-center category-name finder2"><?= $product->category_name ?></p>
                      </div>
                      <div class="flex items-center justify-between gap-2 bg-emerald-100 py-4 px-10 rounded-b-2xl">
                        <div>
                          <p class="text-xs font-medium text-dark leading-none">Price</p>
                          <p class="text-lg font-extrabold text-dark d-flex">&#8369; <span class="filter-price finder3"><?= $product->product_price ?></span></p>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <?php if(isset($_SESSION["uid"]) AND isset($_SESSION["logged"])): ?>
                              <?php if($_SESSION["role"] !== "231232163"): ?>
                                  <button data-id="<?= $product->product_id ?>" class="saveOrder buy-btn bg-primary p-2 rounded-md">
                                    <img src="<?= SYSTEM_URL ?>/public/icons/shopping-cart-linear.svg" alt="cart" class="w-4 h-4 pointer-events-none">
                                  </button>
                              <?php endif ?>
                            <?php else: ?>
                                <button onclick="window.location.href='<?= SYSTEM_URL.'/login' ?>'" class="buy-btn bg-primary p-2 rounded-md">
                                  <img src="<?= SYSTEM_URL ?>/public/icons/shopping-cart-linear.svg" alt="cart" class="w-4 h-4 pointer-events-none">
                                </button>
                            <?php endif ?>
                        </div>
                      </div>
                    </div>
                </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </section>

<?php include('Partials/section.php'); ?>
<?php include('Partials/footer.php'); ?>
<?php
$page_title = "Pola Green";
$tab_active = "Homepage";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="relative">
  
  <?php include('Partials/customer_navigation.php'); ?>

    <section class="min-h-screen flex items-center bg-whitesmoke overflow-hidden pt-28">
      <div class="w-[85%] flex flex-col md:flex-row items-center mx-auto">
        <div class="flex-1">
          <h1 class="text-5xl font-bold leading-[4rem] mb-4">
            Nurturing <span class="text-primary">Growth</span>, <br> Harvesting <span class="text-primary">Success</span>.
          </h1>
          <p class="font-medium text-gray-500 mb-8">Planting the seeds of excellence: empowering your green venture <br> with premium plant crops for bountiful harvests and flourishing fields</p>
          <a href="<?php echo SYSTEM_URL."/login" ?>" class="block w-fit bg-primary text-white font-medium py-4 px-8 rounded-md">Shop Now</a>
        </div>
        <div class="flex-1 relative">
          <img src="<?php echo SYSTEM_URL ?>/public/images/hero-image.png" alt="hero image" class="static md:absolute md:-top-60 md:left-0 w-[80%] min-w-full md:min-w-[700px] rotate-0 md:-rotate-12">
        </div>
      </div>
    </section>
    <section class="flex items-center bg-accent overflow-hidden py-20">
      <div class="w-[85%] grid md:grid-cols-2 lg:grid-cols-4 gap-6 mx-auto">
        <div class="flex flex-col items-center py-4 px-6 bg-white">
          <img src="<?php echo SYSTEM_URL ?>/public/icons/potted_plant.svg" alt="plant" class="w-14 h-14 mb-3">
          <h3 class="font-semibold text-dark mb-3">Premium Plant Selection</h3>
          <p class="text-sm text-gray-500 text-center">Polagreen Nursery and Farm offers a premium plant selection that is sure to satisfy any plant enthusiast. Each plant is carefully selected and grown with utmost care to ensure the highest quality and health. <br><br> At Polagreen Nursery and Farm, we prioritize sustainability and environmentally friendly practices. Our plants are grown using organic methods, minimizing the use of pesticides and synthetic fertilizers. This ensures that you are not only getting beautiful plants but also contributing to a healthier planet.</p>
        </div>
        <div class="flex flex-col items-center py-4 px-6 bg-white">
          <img src="<?php echo SYSTEM_URL ?>/public/icons/bag-tick-linear.svg" alt="pickup" class="w-14 h-14 mb-3">
          <h3 class="font-semibold text-dark mb-3">Easy Pick Up</h3>
          <p class="text-sm text-gray-500 text-center">Polagreen Nursery and Farm specializes in providing high-quality seedlings and plants for various purposes. Whether you're looking to start your own garden, cultivate crops, or enhance your landscape, Polagreen offers a wide variety of easy-to-pick-up seedlings and plants. Their selection includes a range of vegetables, fruits, and more. With their expertise in plant cultivation and a commitment to quality, Polagreen ensures that you can easily pick up healthy and thriving seedlings and plants to start your own green journey.</p>
        </div>
        <div class="flex flex-col items-center py-4 px-6 bg-white">
          <img src="<?php echo SYSTEM_URL ?>/public/icons/truck-fast-linear.svg" alt="delivery" class="w-14 h-14 mb-3">
          <h3 class="font-semibold text-dark mb-3">Fast Delivery</h3>
          <p class="text-sm text-gray-500 text-center normal-case">Polagreen Nursery and Farm guarantees fast delivery services, even to distant locations. They prioritize the health and growth of their seedlings and plants during transportation, ensuring they arrive in good condition. Special handling instructions are provided to customers for successful acclimation upon delivery.</p>
        </div>
        <div class="flex flex-col items-center py-4 px-6 bg-white">
          <img src="<?php echo SYSTEM_URL ?>/public/icons/flash-circle-linear.svg" alt="transaction" class="w-14 h-14 mb-3">
          <h3 class="font-semibold text-dark mb-3">Fast & Easy Checkout</h3>
          <p class="text-sm text-gray-500 text-center normal-case">Seamless checkout, instant green delight. Experience the ultimate convenience with our fast and easy checkout process. Shop effortlessly and confirm your selections. All in just a few clicks</p>
        </div>
      </div>
    </section>
    <section class="flex items-center bg-accent overflow-hidden py-12">
      <div class="w-[85%] mx-auto">
        <!-- <h1 class="text-3xl text-dark font-bold text-center">Best Selling Plants</h1>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5  gap-4 mb-32">
          <div class="relative bg-whitesmoke pt-[5.5rem] mt-28 rounded-2xl">
            <img src="../../public/images/plant-2.jpg" alt="plant" class="absolute -top-16 left-1/2 -translate-x-1/2 w-[140px] h-[140px] object-cover object-center rounded-full">
            <div class="px-8 mb-4">
              <a href="view-plant.html" class="block font-semibold text-black text-center">Pavo Pechay</a>
              <p class="text-xs font-medium text-dark leading-none text-center">Vegetable</p>
            </div>
            <div class="flex items-center justify-between gap-2 bg-emerald-100 py-4 px-10 rounded-b-2xl">
              <div>
                <p class="text-xs font-medium text-dark leading-none">Price</p>
                <p class="text-lg font-extrabold text-dark">P100</p>
              </div>
              <button class="buy-btn bg-primary p-2 rounded-md">
                <img src="../../public/icons/shopping-cart-linear.svg" alt="cart" class="w-4 h-4 pointer-events-none">
              </button>
            </div>
          </div>
          <div class="relative bg-whitesmoke pt-[5.5rem] mt-28 rounded-2xl">
            <img src="../../public/images/plant-1.jpg" alt="plant" class="absolute -top-16 left-1/2 -translate-x-1/2 w-[140px] h-[140px] object-cover object-center rounded-full">
            <div class="px-8 mb-4">
              <a href="view-plant.html" class="block font-semibold text-black text-center">Pavo Pechay</a>
              <p class="text-xs font-medium text-dark leading-none text-center">Vegetable</p>
            </div>
            <div class="flex items-center justify-between gap-2 bg-emerald-100 py-4 px-10 rounded-b-2xl">
              <div>
                <p class="text-xs font-medium text-dark leading-none">Price</p>
                <p class="text-lg font-extrabold text-dark">P100</p>
              </div>
              <button class="buy-btn bg-primary p-2 rounded-md">
                <img src="../../public/icons/shopping-cart-linear.svg" alt="cart" class="w-4 h-4 pointer-events-none">
              </button>
            </div>
          </div>
          <div class="relative bg-whitesmoke pt-[5.5rem] mt-28 rounded-2xl">
            <img src="../../public/images/plant-3.jpg" alt="plant" class="absolute -top-16 left-1/2 -translate-x-1/2 w-[140px] h-[140px] object-cover object-center rounded-full">
            <div class="px-8 mb-4">
              <a href="view-plant.html" class="block font-semibold text-black text-center">Pavo Pechay</a>
              <p class="text-xs font-medium text-dark leading-none text-center">Vegetable</p>
            </div>
            <div class="flex items-center justify-between gap-2 bg-emerald-100 py-4 px-10 rounded-b-2xl">
              <div>
                <p class="text-xs font-medium text-dark leading-none">Price</p>
                <p class="text-lg font-extrabold text-dark">P100</p>
              </div>
              <button class="buy-btn bg-primary p-2 rounded-md">
                <img src="../../public/icons/shopping-cart-linear.svg" alt="cart" class="w-4 h-4 pointer-events-none">
              </button>
            </div>
          </div>
          <div class="relative bg-whitesmoke pt-[5.5rem] mt-28 rounded-2xl">
            <img src="../../public/images/plant-4.jpg" alt="plant" class="absolute -top-16 left-1/2 -translate-x-1/2 w-[140px] h-[140px] object-cover object-center rounded-full">
            <div class="px-8 mb-4">
              <a href="view-plant.html" class="block font-semibold text-black text-center">Pavo Pechay</a>
              <p class="text-xs font-medium text-dark leading-none text-center">Vegetable</p>
            </div>
            <div class="flex items-center justify-between gap-2 bg-emerald-100 py-4 px-10 rounded-b-2xl">
              <div>
                <p class="text-xs font-medium text-dark leading-none">Price</p>
                <p class="text-lg font-extrabold text-dark">P100</p>
              </div>
              <button class="buy-btn bg-primary p-2 rounded-md">
                <img src="../../public/icons/shopping-cart-linear.svg" alt="cart" class="w-4 h-4 pointer-events-none">
              </button>
            </div>
          </div>
          <div class="relative bg-whitesmoke pt-[5.5rem] mt-28 rounded-2xl">
            <img src="../../public/images/plant-1.jpg" alt="plant" class="absolute -top-16 left-1/2 -translate-x-1/2 w-[140px] h-[140px] object-cover object-center rounded-full">
            <div class="px-8 mb-4">
              <a href="view-plant.html" class="block font-semibold text-black text-center">Pavo Pechay</a>
              <p class="text-xs font-medium text-dark leading-none text-center">Vegetable</p>
            </div>
            <div class="flex items-center justify-between gap-2 bg-emerald-100 py-4 px-10 rounded-b-2xl">
              <div>
                <p class="text-xs font-medium text-dark leading-none">Price</p>
                <p class="text-lg font-extrabold text-dark">P100</p>
              </div>
              <button class="buy-btn bg-primary p-2 rounded-md">
                <img src="../../public/icons/shopping-cart-linear.svg" alt="cart" class="w-4 h-4 pointer-events-none">
              </button>
            </div>
          </div>
        </div> -->

        <h1 class="text-3xl text-dark font-bold text-center">Plant Collections</h1>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mb-16">
          <?php
              $num = 1;
              $database->DBQuery("SELECT * FROM `product` LEFT JOIN `category` ON product.category_id=category.category_id ORDER BY `product_no` DESC LIMIT 10");
              foreach($database->fetchAll() AS $product):
          ?>
              <div class="relative bg-whitesmoke pt-[5.5rem] mt-28 rounded-2xl">
                <img src="<?= SYSTEM_URL."/uploads/products/".$product->product_thumbnail_1 ?>" alt="plant" class="absolute -top-16 left-1/2 -translate-x-1/2 w-[140px] h-[140px] object-cover object-center rounded-full">
                <div class="px-8 mb-4">
                  <a href="<?= SYSTEM_URL.'/view-product/'.$product->product_id ?>" class="block font-semibold text-black text-center"><?= $product->product_name ?></a>
                  <p class="text-xs font-medium text-dark leading-none text-center"><?= $product->category_name ?></p>
                </div>
                <div class="flex items-center justify-between gap-2 bg-emerald-100 py-4 px-10 rounded-b-2xl">
                  <div>
                    <p class="text-xs font-medium text-dark leading-none">Price</p>
                    <p class="text-lg font-extrabold text-dark">&#8369; <?= $product->product_price ?></p>
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
          <?php endforeach ?>
        </div>
      </div>
    </section>

<?php include('Partials/section.php'); ?>
<?php include('Partials/footer.php'); ?>
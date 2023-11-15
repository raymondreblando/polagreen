<?php
$page_title = "Cart";
$tab_active = "Cart";

require_once("./initialized.php");

include('Partials/header.php');

$zone = "";
$address = "";
$contact = "";
$zip = "";

$database->DBQuery("SELECT * FROM `shipping` WHERE `user_id`=?",[$_SESSION['uid']]);
if($database->rowCount() > 0){
    $shipping = $database->fetch();
    $zone = $shipping->s_zone;
    $address = $shipping->s_address;
    $contact = $shipping->s_contact;
    $zip = $shipping->s_zip;
}

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="relative">
  
  <?php include('Partials/customer_navigation.php'); ?>

    <section class="min-h-screen bg-accent overflow-hidden pt-32 pb-24">
      <div class="w-[80%] mx-auto">
        <h1 class="text-3xl text-dark font-bold text-center">Shopping Cart</h1>
        <p class="text-sm text-gray-600 text-center mb-12">Harvest Your Selections: Checkout and Cultivate Your Cart.</p>
        <div class="max-w-[500px] mx-auto">
          <div class="flex items-center justify-between gap-4 mb-4">
            <?php if($cartCount > 0): ?>
                <div>
                    <p class="text-sm font-medium">Order Summary</p>
                    <p class="text-xs text-gray-500">Here are the list of your orders</p>
                </div>
                <button class="remove-btn bg-rose-100 text-rose-600 flex items-center gap-1 text-xs font-medium py-1 px-3 rounded-md">
                  <i class="ri-close-line text-base"></i>
                  Remove
                </button>
            <?php endif ?>
          </div>
          <?php if($cartCount === 0): ?>
              <div class="min-h-[200px] flex flex-col items-center justify-center border-y border-y-gray-300/40">
                <img src="<?php echo SYSTEM_URL ?>/public/icons/bag-2-linear.svg" alt="bag" class="w-10 h-10 mb-2">
                <p class="text-xs font-semibold mb-3">Cart was empty</p>
                <a href="<?php echo SYSTEM_URL.'/products' ?>" class="text-xs font-medium bg-primary text-white py-2 px-4 rounded-md">Order Item</a>
              </div>
          <?php endif ?>
          <?php
                $database->DBQuery("SELECT * FROM `cart` LEFT JOIN `product` ON cart.product_id=product.product_id LEFT JOIN `category` ON product.category_id=category.category_id WHERE cart.user_id = ? ORDER BY `c_no`", [$_SESSION['uid']]);
                foreach($database->fetchAll() AS $cart_item):
            ?>
              <div class="cart-item items w-full flex items-center gap-3 border-y border-y-gray-300/40 py-3" data-item-id="<?= $cart_item->c_id ?>">
                <div class="checkbox hidden" hidden>
                    <input type="checkbox" class="item-checkbox">
                </div>
                <div class="radio"></div>
                <img src="<?= SYSTEM_URL."/uploads/products/".$cart_item->product_thumbnail_1 ?>" alt="plant" class="w-[80px] h-[80px] object-cover rounded-full">
                <div class="w-full flex items-center">
                  <div>
                    <p class="font-semibold"><?= $cart_item->product_name ?></p>
                    <p class="text-xs text-gray-500 font-medium mb-2"><?= $cart_item->category_name ?></p>
                    <p class="text-xs text-primary font-bold">&#8369; <span class="item-price"><?= $cart_item->product_price ?></span></p>
                  </div>
                  <input type="number" class="w-12 h-10 text-sm text-center font-medium border-2 border-gray-200 rounded-sm outline-none ml-auto" value="<?= $cart_item->quantity ?>">
                </div>
              </div>
              <?php endforeach ?>
          <div class="flex items-center justify-between gap-4 py-4 border-b border-b-gray-300/40">
            <p class="text-sm font-medium">Total Amount</p>
            <p class="text-sm font-bold">&#8369; <span id="total-amount"></span></p>
          </div>
          <div class="flex items-center justify-between gap-4 py-4 border-b border-b-gray-300/40">
            <div>
              <p class="text-sm font-medium">Shipping Information</p>
              <p class="text-xs text-gray-500">Set up your address and contact number for delivery</p>
            </div>
            <button class="setup-btn text-xs font-medium bg-emerald-100 text-primary py-1 px-3 rounded-md">Set Up</button>
          </div>
          <form autocomplete="off" id="shipping-form" class="hidden py-4">
            <div class="grid grid-cols-4 gap-4 mb-3">
              <div>
                <label for="zone" class="text-xs font-semibold text-dark">Zone</label>
                <div class="w-full h-12 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
                  <input type="text" value="<?php echo $zone ?>" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="zone" placeholder="Zone #">
                </div>
              </div>
              <div class="col-span-3">
                <label for="address" class="text-xs font-semibold text-dark">Address</label>
                <div class="w-full h-12 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
                  <input type="text" value="<?php echo $address ?>" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="address" placeholder="Ex. Napo, Polangui, Albay">
                </div>
              </div>
              <div>
                <label for="zip_code" class="text-xs font-semibold text-dark">Zip Code</label>
                <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
                  <input type="text" value="<?php echo $zip ?>" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="zip_code" placeholder="Zip code">
                </div>
              </div>
              <div class="col-span-3">
                <label for="phone_number" class="text-xs font-semibold text-dark">Phone Number</label>
                <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
                  <input type="text" value="<?php echo $contact ?>" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="phone_number" placeholder="Enter your phone number" onkeypress="return isNumeric(event)" oninput="maxNumLength(this)" maxlength = "11">
                </div>
              </div>
            </div>
            <button type="button" id="saveShippingDetails" class="bg-primary text-sm font-medium text-white py-4 w-full uppercase rounded-md">Save</button>
          </form>
          <form autocomplete="off">
            <div class="flex items-center justify-between gap-4 py-4 border-b border-b-gray-300/40 mb-4">
              <div>
                <p class="text-sm font-medium">Payment Method</p>
                <p class="text-xs text-gray-500">Choose a payment method</p>
              </div>
              <button type="button" class="flex items-center gap-2 text-xs font-medium py-3 px-4 rounded-md border border-gray-300/40">
                <img src="<?php echo SYSTEM_URL ?>/public/icons/tick-circle-bold.svg" alt="check" class="w-4 h-4">
                Cash on Delivery
              </button>
            </div>
            <button type="button" id="checkOut" class="bg-primary text-sm font-medium text-white py-4 w-full uppercase rounded-md">Check Out</button>
          </form>
        </div>
      </div>
    </section>

<?php include('Partials/section.php'); ?>
<?php include('Partials/footer.php'); ?>
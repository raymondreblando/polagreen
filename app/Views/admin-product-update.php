<?php
$page_title = "Pola Green";
$tab_active = "Homepage";

require_once("./initialized.php");

include('Partials/header.php');

$database->DBQuery("SELECT * FROM `product` WHERE `product_id` = ?", [$id]);
$product_detail = $database->fetch(); 

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <?php include('Partials/admin_navigation.php'); ?>

    <div>
      <div class="flex items-center justify-between gap-4 bg-white py-4 px-8 border-b border-b-gray-300/40">
        <div class="flex items-center gap-3">
          <button class="show-sidebar block md:hidden text-lg font-bold"><i class="ri-menu-line"></i></button>
          <div>
            <p class="text-sm font-semibold text-dark">Update Product</p>
            <p class="hidden md:block text-[9px] text-gray-500">Update product information</p>
          </div>
        </div>
        <div class="w-[7rem] h-10 flex items-center gap-3">
          <i class="ri-search-line text-lg text-gray-500"></i>
          <input type="text" class="w-full text-gray-500 text-xs font-medium placeholder:text-gray-500 outline-none" id="search-input" placeholder="Search here" autocomplete="off">
        </div>
      </div>
      <div class="py-6 px-8">
        <div class="max-w-[600px] mt-6 mx-auto">
          <h2 class="text-xl text-dark font-semibold text-center">Update Product Information</h2>
          <p class="text-xs text-gray-500 text-center mb-10">To properly update the product, edit the information below.</p>
          <form autocomplete="off">
            <div class="grid grid-cols-4 gap-2 mb-4">
              <div class="upload-container h-[150px] relative bg-gray-100 rounded-lg cursor-pointer">
                <input type="file" id="product_img_1" class="upload-input" hidden>
                <img src="<?php echo SYSTEM_URL."/uploads/products/".$product_detail->product_thumbnail_1  ?>" alt="profile" class="upload-overview w-full h-full object-cover pointer-events-none">
                <div class="icon absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 pointer-events-none">
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/image-linear.svg" alt="image" class="w-5 h-5 mx-auto mb-2 pointer-events-none" hidden>
                  <p class="text-[10px] font-medium pointer-events-none text-center" hidden>Upload Image</p>
                </div>
              </div>
              <div class="upload-container h-[150px] relative bg-gray-100 rounded-lg cursor-pointer">
                <input type="file" id="product_img_2" class="upload-input" hidden>
                <img src="<?php echo SYSTEM_URL."/uploads/products/".$product_detail->product_thumbnail_2  ?>" alt="profile" class="upload-overview w-full h-full object-cover pointer-events-none">
                <div class="icon absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 pointer-events-none">
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/image-linear.svg" alt="image" class="w-5 h-5 mx-auto mb-2 pointer-events-none" hidden>
                  <p class="text-[10px] font-medium pointer-events-none text-center" hidden>Upload Image</p>
                </div>
              </div>
              <div class="upload-container h-[150px] relative bg-gray-100 rounded-lg cursor-pointer">
                <input type="file" id="product_img_3" class="upload-input" hidden>
                <img src="<?php echo SYSTEM_URL."/uploads/products/".$product_detail->product_thumbnail_3  ?>" alt="profile" class="upload-overview w-full h-full object-cover pointer-events-none">
                <div class="icon absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 pointer-events-none">
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/image-linear.svg" alt="image" class="w-5 h-5 mx-auto mb-2 pointer-events-none" hidden>
                  <p class="text-[10px] font-medium pointer-events-none text-center" hidden>Upload Image</p>
                </div>
              </div>
              <div class="upload-container h-[150px] relative bg-gray-100 rounded-lg cursor-pointer">
                <input type="file" id="product_img_4" class="upload-input" hidden>
                <img src="<?php echo SYSTEM_URL."/uploads/products/".$product_detail->product_thumbnail_4  ?>" alt="profile" class="upload-overview w-full h-full object-cover pointer-events-none">
                <div class="icon absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 pointer-events-none">
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/image-linear.svg" alt="image" class="w-5 h-5 mx-auto mb-2 pointer-events-none" hidden>
                  <p class="text-[10px] font-medium pointer-events-none text-center" hidden>Upload Image</p>
                </div>
              </div>
            </div>
            <div class="grid md:grid-cols-2 gap-6 mb-4">
              <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-3 transition-all">
                <input type="text" value="<?php echo $product_detail->product_name ?>" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="product_name" placeholder="Enter the product name">
              </div>
              <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-3 transition-all">
                <select id="category" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent">
                    <?php 
                        $selected_category = $product_detail->category_id;

                        $database->DBQuery("SELECT * FROM `category` ORDER BY `category_name`");
                        foreach ($database->fetchAll() as $category) {
                          $options[$category->category_id] = $category->category_name;
                        };

                        foreach($options as $key => $value){
                          if($selected_category == $key){
                                echo '<option selected="selected" value="'.$key.'">'.$value.'</option>';
                          }else{
                                echo '<option value="'.$key.'">'.$value.'</option>';
                          }
                        }
                    ?>
                </select>
              </div>
            </div>
            <div class="grid md:grid-cols-3 gap-6 mb-4">
              <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-3 transition-all">
                <input type="text" value="<?php echo $product_detail->product_price ?>" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="price" placeholder="Enter the product price" onkeypress="return isNumeric(event)" oninput="maxNumLength(this)" maxlength = "15">
              </div>
              <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-3 transition-all">
                <input type="text" value="<?php echo $product_detail->product_stocks ?>" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="stocks" placeholder="Enter the product stocks" onkeypress="return isNumeric(event)" oninput="maxNumLength(this)" maxlength = "15">
              </div>
              <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-3 transition-all">
                <select id="status" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent">
                    <?php 
                        $selected_status = $product_detail->product_status;

                        $options = array("Available","Unavailable");

                        foreach($options as $option){
                          if($selected_status == $option){
                                echo '<option selected="selected" value="'.$option.'">'.$option.'</option>';
                          }else{
                                echo '<option value="'.$option.'">'.$option.'</option>';
                          }
                        }
                    ?>
                </select>
              </div>
            </div>
            <div class="flex items-center gap-4">
              <button type="button" id="update-product" data-id="<?php echo $id ?>" class="w-full bg-primary text-xs font-medium text-white py-4 rounded-md">Update Product</button>
              <a href="<?php echo SYSTEM_URL."/dashboard-product-inventory" ?>" class="w-full bg-gray-200 text-xs font-medium text-dark text-center py-4 rounded-md">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

<?php include('Partials/footer.php'); ?>
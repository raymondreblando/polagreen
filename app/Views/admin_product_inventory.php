<?php
$page_title = "Products";
$tab_active = "Products";

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
            <p class="text-sm font-semibold text-dark">Products</p>
            <p class="hidden md:block text-[9px] text-gray-500">Manage product inventory</p>
          </div>
        </div>
        <div class="w-[7rem] h-10 flex items-center gap-3">
          <i class="ri-search-line text-lg text-gray-500"></i>
          <input type="text" id="search-table" class="w-full text-gray-500 text-xs font-medium placeholder:text-gray-500 outline-none" id="search-input" placeholder="Search here" autocomplete="off">
        </div>
      </div>
      <div class="py-6 px-8">
        <div class="flex flex-col-reverse sm:flex-row justify-between items-center gap-4 mb-6">
          <div class="flex items-center gap-3">
            <p class="text-xs font-semibold text-dark">Sort <br> Products</p>
            <button class="ascending h-10 px-4 bg-white rounded-md border border-gray-300/40" title="Stock Ascending"><i class="ri-sort-asc"></i></button>
            <button class="descending h-10 px-4 bg-white rounded-md border border-gray-300/40" title="Stock Descending"><i class="ri-sort-desc"></i></button>
          </div>
          <a href="<?php echo SYSTEM_URL."/dashboard-product-create" ?>" class="flex items-center justify-center w-full sm:w-fit h-12 bg-primary text-xs text-white font-medium px-4 rounded-md">Create Product</a>
        </div>
        <div class="w-[calc(100vw-4rem)] lg:w-[calc(100vw-16rem)] bg-white overflow-x-auto">
          <table id="table" class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
              <th>Product ID</th>
              <th>Product</th>
              <th>Price</th>
              <th>Remaining Stock</th>
              <th>Status</th>
              <th>Date Added</th>
              <th></th>
            </thead>
            <tbody>
              <?php
                  $num = 1;
                  $database->DBQuery("SELECT * FROM `product` LEFT JOIN `category` ON product.category_id=category.category_id ORDER BY `product_no` DESC");
                  foreach($database->fetchAll() AS $product):
              ?>
                  <tr>
                    <td><?= $num++ ?></td>
                    <td>
                      <div class="w-max md:w-auto flex items-center gap-3 text-left">
                        <img src="<?= SYSTEM_URL."/uploads/products/".$product->product_thumbnail_1 ?>" alt="plant" class="w-8 h-8 object-cover rounded-full">
                        <div>
                          <p class="text-sm font-semibold text-dark"><?= $product->product_name ?></p>
                          <p class="text-[9px] text-gray-500"><?= $product->category_name ?></p>
                        </div>
                      </div>
                    </td>
                    <td><?= $product->product_price ?></td>
                    <td><?= $product->product_stocks ?></td>
                    <td>
                      <span class="status-tag status-<?= strtolower($product->product_status) ?> uppercase"><?= $product->product_status ?></span>
                    </td>
                    <td><?= $functions->formatDateTime($product->product_date_added, "M d, Y") ?></td>
                    <td>
                      <a href="<?= SYSTEM_URL."/dashboard-product-update/".$product->product_id ?>"><i class="ri-loop-left-line"></i></a>
                    </td>
                  </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

<?php include('Partials/footer.php'); ?>
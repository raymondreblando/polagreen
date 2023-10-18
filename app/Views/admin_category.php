<?php
$page_title = "Product Category";
$tab_active = "Category";

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
            <p class="text-sm font-semibold text-dark">Categories</p>
            <p class="hidden md:block text-[9px] text-gray-500">Manage product categories</p>
          </div>
        </div>
        <div class="w-[7rem] h-10 flex items-center gap-3">
          <i class="ri-search-line text-lg text-gray-500"></i>
          <input type="text" id="search-table" class="w-full text-gray-500 text-xs font-medium placeholder:text-gray-500 outline-none" id="search-input" placeholder="Search here" autocomplete="off">
        </div>
      </div>
      <div class="py-6 px-8">
        <div class="flex items-center gap-4 mb-6">
          <input type="text" id="category" class="w-full h-12 text-xs text-gray-500 placeholder:text-gray-500 border border-gray-300/40 rounded-md px-4" placeholder="Enter category name">
          <button type="button" id="create-category" class="w-max sm:w-fit h-12 bg-primary text-xs text-white font-medium px-4 rounded-md">Create Category</button>
        </div>
        <div class="w-[calc(100vw-4rem)] lg:w-[calc(100vw-16rem)] bg-white overflow-x-auto">
          <table id="table" class="w-full text-center border-collapse whitespace-nowrap">
            <thead>
              <th>Category ID</th>
              <th>Category Name</th>
              <th>Date Added</th>
              <th width="10%"></th>
            </thead>
            <tbody>
              <?php
                  $num = 1;
                  $database->DBQuery("SELECT * FROM `category` ORDER BY `category_no` DESC");
                  foreach($database->fetchAll() AS $category):
              ?>
                  <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $category->category_name ?></td>
                    <td><?= $functions->formatDateTime($category->category_date_added, "M d, Y") ?></td>
                    <td>
                      <button data-id="<?= $category->category_id ?>" class="remove-category delete-btn flex items-center gap-2 bg-rose-100 text-xs font-medium text-red-500 py-[3px] px-4 rounded-md">
                        <i class="ri-close-line text-base"></i>
                        Remove
                      </button>
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
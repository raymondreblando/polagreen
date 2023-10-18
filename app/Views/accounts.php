<?php
$page_title = "Accounts";
$tab_active = "Accounts";

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
            <p class="text-sm font-semibold text-dark">Accounts</p>
            <p class="hidden md:block text-[9px] text-gray-500">Manage customer accounts</p>
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
            <p class="text-xs font-semibold text-dark">Filter Accounts</p>
                <button class="filter-btn h-10 px-4 bg-white text-xs font-medium rounded-md border border-gray-300/40" data-status="all">All</button>
                <button class="filter-btn h-10 px-4 bg-white text-xs font-medium rounded-md border border-gray-300/40" data-status="active">Active</button>
                <button class="filter-btn h-10 px-4 bg-white text-xs font-medium rounded-md border border-gray-300/40" data-status="block">Block</button>
          </div>
        </div>
        <div class="w-[calc(100vw-4rem)] lg:w-[calc(100vw-16rem)] bg-white overflow-x-auto">
          <table id="table" class="w-full text-left border-collapse whitespace-nowrap">
            <thead>
              <th>Account Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Status</th>
              <th></th>
            </thead>
            <tbody>
              <?php
                  $num = 1;
                  $database->DBQuery("SELECT * FROM `users` LEFT JOIN `role` ON users.role_id=role.role_id WHERE users.role_id = '231573527' ORDER BY `user_no` DESC");
                  foreach($database->fetchAll() AS $user):
              ?>
                <tr>
                  <td>
                    <div class="w-max md:w-auto flex items-center gap-3 text-left">
                      <img src="<?php echo SYSTEM_URL."/public/images/".strtolower($user->gender).".png" ?>" alt="profile" class="w-8 h-8 object-cover rounded-full">
                      <div>
                        <p class="text-xs font-semibold text-dark"><?= $user->fullname ?></p>
                        <p class="text-[9px] text-gray-500"><?= $user->role_name ?></p>
                      </div>
                    </div>
                  </td>
                  <td><?= $user->gender ?></td>
                  <td><?= $user->email ?></td>
                  <td><?= $user->contact ?></td>
                  <td><?= $user->address ?></td>
                  <td>
                    <span class="status-tag status-<?= strtolower($user->status) ?> uppercase"><?= $user->status ?></span>
                  </td>
                  <td>
                    <button data-value="Block" data-id="<?= $user->user_id ?>" class="block-user block-btn"><img src="<?php echo SYSTEM_URL ?>/public/icons/slash-linear.svg" alt="block" class="w-3 h-3" title="Block User"></button>
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
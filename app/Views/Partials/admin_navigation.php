<?php
  $database->DBQuery("SELECT * FROM `users` LEFT JOIN `role` ON users.role_id=role.role_id WHERE `user_id` = ?", [$_SESSION['uid']]);
  $user_info = $database->fetch();
?>
<main class="relative grid md:grid-cols-[12rem_auto]">
  <aside class="sidebar">
        <div class="px-4">
          <p class="text-lg font-bold text-primary text-center mb-6">Polagreen</p>
          <img src="<?php echo SYSTEM_URL."/public/images/".strtolower($user_info->gender).".png" ?>" alt="profile" class="w-20 h-20 rounded-full object-cover mx-auto mb-1">
          <p class="text-sm font-semibold text-dark text-center"><?php echo $user_info->fullname ?></p>
          <p class="text-xs font-medium text-gray-500 text-center"><?php echo $user_info->role_name ?></p>
          <a href="<?php echo SYSTEM_URL."/dashboard-manage-account" ?>" class="block w-fit text-[9px] font-semibold bg-emerald-100 text-primary mx-auto py-1 px-2">Manage Account</a>
        </div>
        <ul>
          <li>
            <a href="<?php echo SYSTEM_URL."/dashboard-product-inventory" ?>" class="sidebar__links <?php echo $tab_active == 'Products' ? 'active' : '' ?>">
              <i class="ri-box-3-line text-lg font-medium"></i>
              Products
            </a>
          </li>
          <li>
            <a href="<?php echo SYSTEM_URL."/dashboard-categories" ?>" class="sidebar__links <?php echo $tab_active == 'Category' ? 'active' : '' ?>">
              <i class="ri-apps-2-line text-lg font-medium"></i>
              Categories
            </a>
          </li>
          <li>
            <a href="<?php echo SYSTEM_URL."/dashboard-orders" ?>" class="sidebar__links <?php echo $tab_active == 'Orders' ? 'active' : '' ?>">
              <i class="ri-shopping-bag-2-line text-lg font-medium"></i>
              Orders
            </a>
          </li>
          <li>
            <a href="<?php echo SYSTEM_URL."/dashboard-accounts" ?>" class="sidebar__links <?php echo $tab_active == 'Accounts' ? 'active' : '' ?>">
              <i class="ri-user-4-line text-lg font-medium"></i>
              Accounts
            </a>
          </li>
          <li>
            <a href="<?php echo SYSTEM_URL."/dashboard-messages" ?>" class="sidebar__links <?php echo $tab_active == 'Messages' ? 'active' : '' ?>">
              <i class="ri-chat-1-line text-lg font-medium"></i>
              Messages
            </a>
          </li>
        </ul>
        <ul>
          <a href="<?php echo SYSTEM_URL."/logout" ?>" class="flex items-center gap-3 text-[13px] text-gray-600 font-medium py-1 px-10">
            <i class="ri-logout-circle-r-line text-lg font-medium"></i>
            Log Out
          </a>
        </ul>
  </aside>
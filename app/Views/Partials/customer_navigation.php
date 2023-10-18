<?php
$cartCount = 0;
if(isset($_SESSION["uid"]) AND isset($_SESSION["logged"])){
       $database->DBQuery("SELECT * FROM `users` LEFT JOIN `role` ON users.role_id=role.role_id WHERE `user_id`=?",[$_SESSION["uid"]]);
       $user_data = $database->fetch();  
       
       $database->DBQuery("SELECT `c_no` FROM `cart` WHERE `user_id`=?",[$_SESSION['uid']]);
       $cartCount = $database->rowCount();
}

?>
<header class="fixed top-0 inset-x-0 bg-white/50 backdrop-blur-md z-10 border-b border-b-gray-300/40">
       <nav class="relative w-[85%] flex justify-between items-center gap-2 py-4 mx-auto">
              <div class="flex-1 flex items-center gap-2">
                     <img src="<?php echo SYSTEM_URL ?>/public/images/logo.png" alt="logo" class="w-14 h-14">
                     <div>
                            <p class="font-bold text-primary uppercase leading-tight">Pola Green</p>
                            <p class="text-sm font-semibold text-dark leading-tight">Nursery & Farm</p>
                     </div>
              </div>

              <ul class="nav__menu">
                     <button type="button" class="close-nav block md:hidden absolute top-7 right-10 text-lg"><i class="ri-close-line"></i></button>
                     <li><a href="<?php echo SYSTEM_URL."/" ?>" class="nav__links <?php echo $tab_active == 'Homepage' ? 'active' : '' ?>">Home</a></li>
                     <li><a href="<?php echo SYSTEM_URL."/products" ?>" class="nav__links <?php echo $tab_active == 'Products' ? 'active' : '' ?>">Products</a></li>
                     
                     <?php if(isset($_SESSION["uid"]) AND isset($_SESSION["logged"])): ?>
                            <?php if(($_SESSION["role"]) === "231573527"): ?>
                                   <li><a href="<?php echo SYSTEM_URL."/my-orders" ?>" class="nav__links <?php echo $tab_active == 'My Order' ? 'active' : '' ?>">My Orders</a></li>
                            <?php endif ?>
                            <li><a href="<?php echo SYSTEM_URL."/about" ?>" class="nav__links <?php echo $tab_active == 'About' ? 'active' : '' ?>">About Us</a></li>
                            <li><a href="<?php echo SYSTEM_URL."/contact" ?>" class="nav__links <?php echo $tab_active == 'Contact' ? 'active' : '' ?>">Contact Us</a></li>
                     <?php else: ?>
                            <li><a href="<?php echo SYSTEM_URL."/about" ?>" class="nav__links <?php echo $tab_active == 'About' ? 'active' : '' ?>">About Us</a></li>
                            <li><a href="<?php echo SYSTEM_URL."/contact" ?>" class="nav__links <?php echo $tab_active == 'Contact' ? 'active' : '' ?>">Contact Us</a></li>
                     <?php endif ?>

                     <ul class="flex flex-col gap-4 md:hidden">
                            <?php if(isset($_SESSION["uid"]) AND isset($_SESSION["logged"])): ?>
                                   <?php if(($_SESSION["role"]) === "231573527"): ?>
                                          <a href="<?php echo SYSTEM_URL."/cart" ?>" class="relative w-fit">
                                                 <img src="<?php echo SYSTEM_URL ?>/public/icons/bag-2-linear.svg" alt="cart" class="w-5 h-5">
                                                 <span id="badgeCart1" class="<?php if($cartCount === 0){echo 'hidden';} ?> absolute top-0 -right-2 w-4 h-4 text-[9px] font-medium text-white bg-primary rounded-full grid place-items-center"><p id="countCart1"><?php echo $cartCount; ?></p></span>
                                          </a>
                                   <?php endif ?>

                                   <div class="shrink-0 flex items-center gap-2">
                                          <img src="<?php echo SYSTEM_URL."/public/images/".strtolower($user_data->gender).".png" ?>" alt="profile" class="w-8 h-8 object-cover rounded-full">
                                          <div>
                                                 <p class="text-sm font-semibold text-dark leading-tight"><?php echo $user_data->fullname ?></p>
                                                 <p class="text-xs font-medium text-gray-500 leading-tight"><?php echo $user_data->role_name ?></p>
                                          </div>
                                   </div>

                                   <?php if($user_data->role_id === "231232163"): ?>
                                          <a href="<?php echo SYSTEM_URL."/dashboard-product-inventory" ?>" class="bg-primary text-sm font-medium text-white py-3 px-6 rounded-md">Dashboard</a>
                                   <?php else: ?>
                                          <a href="<?php echo SYSTEM_URL."/logout" ?>" class="bg-primary text-sm font-medium text-white py-3 px-6 rounded-md">Logout</a>
                                   <?php endif ?>
                            <?php else: ?>
                                   <a href="<?php echo SYSTEM_URL."/login" ?>" class="bg-primary text-sm font-medium text-white py-3 px-6 rounded-md">Log In</a>
                            <?php endif ?>
                     </ul>
                     <div class="w-full bg-gray-100 flex md:hidden items-center gap-3 py-3 px-6 rounded-md">
                            <i class="ri-search-line"></i>
                            <input type="text" class="search-div search-input w-full text-sm text-dark outline-none placeholder:text-dark bg-transparent" placeholder="Search here..." autocomplete="off">
                     </div>
              </ul>

              <div class="searchbar absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 w-[min(28rem,90%)] bg-gray-100 hidden items-center gap-3 py-3 px-6 rounded-md">
                     <i class="ri-search-line"></i>
                     <input type="text" class="search-div search-input w-full text-sm text-dark outline-none placeholder:text-dark bg-transparent" placeholder="Search here..." autocomplete="off">
              </div>

              <ul class="flex-1 hidden md:flex justify-end items-center gap-6">
                     <?php if($tab_active === "Products"): ?>
                            <button class="search-btn text-lg"><i class="ri-search-line"></i></button>
                     <?php endif ?>

                     <?php if(isset($_SESSION["uid"]) AND isset($_SESSION["logged"])): ?>
                            <?php if(($_SESSION["role"]) === "231573527"): ?>
                                   <a href="<?php echo SYSTEM_URL."/cart" ?>" class="relative">
                                          <img src="<?php echo SYSTEM_URL ?>/public/icons/bag-2-linear.svg" alt="cart" class="w-5 h-5">
                                          <span id="badgeCart2" class="<?php if($cartCount === 0){echo 'hidden';} ?> absolute top-0 -right-2 w-4 h-4 text-[9px] font-medium text-white bg-primary rounded-full grid place-items-center"><p id="countCart2"><?php echo $cartCount; ?></p></span>
                                   </a>
                            <?php endif ?>

                            <div class="shrink-0 flex items-center gap-2">
                                   <img src="<?php echo SYSTEM_URL."/public/images/".strtolower($user_data->gender).".png" ?>" alt="profile" class="w-8 h-8 object-cover rounded-full">
                                   <div>
                                          <p class="text-sm font-semibold text-dark leading-tight"><?php echo $user_data->fullname ?></p>
                                          <p class="text-xs font-medium text-gray-500 leading-tight"><?php echo $user_data->role_name ?></p>
                                   </div>
                            </div>
                            
                            <a href="<?php echo SYSTEM_URL."/logout" ?>" class="bg-primary text-sm font-medium text-white py-3 px-6 rounded-md">Logout</a>
                                   
                     <?php else: ?>
                            <a href="<?php echo SYSTEM_URL."/login" ?>" class="bg-primary text-sm font-medium text-white py-3 px-6 rounded-md">Log In</a>
                     <?php endif ?>
              </ul>

              <button class="menu-btn block md:hidden"><i class="ri-menu-3-line text-dark text-xl font-semibold"></i></button>
       </nav>
</header>
<?php
$page_title = "Manage Account";
$tab_active = "Manage Account";

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
            <p class="text-sm font-semibold text-dark">Manage Account</p>
            <p class="hidden md:block text-[9px] text-gray-500">Manage your account</p>
          </div>
        </div>
      </div>
      <div class="py-6 px-8">
        <div class="max-w-[900px] mt-6 mx-auto">
          <h2 class="text-xl text-dark font-semibold text-center">Manage Account Information</h2>
          <p class="text-xs text-gray-500 text-center mb-10">In this section, you can update your account data and your account password.</p>
          <div class="grid md:grid-cols-2 gap-10">
            <div>
              <h2 class="text-dark font-semibold">Account Information</h2>
              <p class="text-xs text-gray-500 mb-4">Make sure to update your account information.</p>
              <form autocomplete="off">
                <div class="grid md:grid-cols-2 gap-6 mb-4">
                  <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary transition-all">
                    <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="fullname" value="<?php echo $user_info->fullname ?>" placeholder="Enter your fullname">
                  </div>
                  <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary transition-all">
                    <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="email" value="<?php echo $user_info->email ?>" placeholder="Enter your email">
                  </div>
                </div>
                <div class="grid md:grid-cols-3 gap-6 mb-4">
                  <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary transition-all">
                    <select id="gender" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent">
                    <?php 
                        $selected = $user_info->gender;
                        $options = array("Male","Female");
                        foreach($options as $option){
                            if($selected == $option){
                                  echo '<option selected="selected" value="'.$option.'">'.$option.'</option>';
                            }else{
                                  echo '<option value="'.$option.'">'.$option.'</option>';
                            }
                        }
                    ?>
                    </select>
                  </div>
                  <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary transition-all">
                    <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="username" value="<?php echo $user_info->username ?>" placeholder="Enter your username">
                  </div>
                  <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary transition-all">
                    <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="phone_number" value="<?php echo $user_info->contact ?>" placeholder="Enter your phone number" maxlength="11">
                  </div>
                </div>
                <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-4 transition-all">
                  <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="address" value="<?php echo $user_info->address ?>" placeholder="Enter your address">
                </div>
                <div class="flex items-center gap-4">
                  <button type="button" id="updateAccount" class="w-full bg-primary text-xs font-medium text-white py-4 rounded-md">Update Information</button>
                </div>
              </form>
            </div>
            <div>
              <h2 class="text-dark font-semibold">Security</h2>
              <p class="text-xs text-gray-500 mb-4">For greater security, make sure you used strong combinations.</p>
              <form autocomplete="off">
                <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-4 transition-all">
                  <input type="password" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="current_password" placeholder="Enter account password">
                  <i role="button" class="show-password ri-eye-line text-black/60"></i>
                </div>
                <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-4 transition-all">
                  <input type="password" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="new_password" placeholder="Enter new password">
                  <i role="button" class="show-password ri-eye-line text-black/60"></i>
                </div>
                <div class="w-full h-14 flex items-center gap-3 border-b border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary mb-4 transition-all">
                  <input type="password" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="confirm_password" placeholder="Confirm password">
                  <i role="button" class="show-password ri-eye-line text-black/60"></i>
                </div>
                <div class="flex items-center gap-4">
                  <button type="button" id="changePassword" class="w-full bg-primary text-xs font-medium text-white py-4 rounded-md">Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include('Partials/footer.php'); ?>
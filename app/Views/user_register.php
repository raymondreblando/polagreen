<?php
$page_title = "Create Account";
$tab_active = "Register";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="min-h-screen grid place-items-center relative py-8 bg-whitesmoke">
    <div class="w-[min(38rem,90%)] rounded-md p-8">
      <a href="<?php echo SYSTEM_URL ?>" class="w-fit block mx-auto mb-2">
        <img src="<?php echo SYSTEM_URL ?>/public/images/logo.png" alt="logo" class="w-[100px]">
      </a>
      <p class="text-3xl font-bold text-primary uppercase leading-tight text-center">Pola Green</p>
      <p class="text-xl font-semibold text-dark leading-tight text-center mb-8">Nursery & Farm</p>
      <p class="text-2xl font-bold text-dark leading-tight text-center mb-1">Create your account</p>
      <p class="text-sm font-medium text-gray-500 leading-tight text-center mb-12">Join the green community: Start your blooming journey today</p>

      <form autocomplete="off">
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label for="fullname" class="text-xs font-semibold text-dark">Fullname</label>
            <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-4 mt-1 focus-within:border-b-primary  transition-all">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/user-square-linear.svg" alt="user" class="w-5 h-5">
              <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="fullname" placeholder="Enter your fullname">
            </div>
          </div>
          <div>
            <label for="email" class="text-xs font-semibold text-dark">Email Address</label>
            <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/email-gray.svg" alt="email" class="w-5 h-5">
              <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="email" placeholder="Enter your email address">
            </div>
          </div>
          <div>
            <label for="gender" class="text-xs font-semibold text-dark">Gender</label>
            <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/woman-linear.svg" alt="gender" class="w-5 h-5">
              <select id="gender" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
          <div>
            <label for="username" class="text-xs font-semibold text-dark">Username</label>
            <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/user-linear.svg" alt="user" class="w-5 h-5">
              <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="username" placeholder="Enter your username">
            </div>
          </div>
          <div>
            <label for="phone_number" class="text-xs font-semibold text-dark">Phone Number</label>
            <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/call-linear.svg" alt="phone" class="w-5 h-5">
              <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="phone_number" placeholder="Enter phone number" value="09" onkeypress="return isNumeric(event)" oninput="maxNumLength(this)" maxlength = "11">
            </div>
          </div>
          <div>
            <label for="address" class="text-xs font-semibold text-dark">Address</label>
            <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary  transition-all">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/location-linear.svg" alt="location" class="w-5 h-5">
              <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="address" placeholder="Enter your address">
            </div>
          </div>
          <div>
            <label for="password" class="text-xs font-semibold text-dark">Password</label>
            <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary mb-4 transition-all">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/security-gray.svg" alt="password" class="w-5 h-5">
              <input type="password" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="password" placeholder="Account password">
              <i role="button" class="show-password ri-eye-line text-black/60"></i>
            </div>
          </div>
          <div>
            <label for="confirm_password" class="text-xs font-semibold text-dark">Confirm Password</label>
            <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary mb-4 transition-all">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/security-gray.svg" alt="password" class="w-5 h-5">
              <input type="password" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="confirm_password" placeholder="Confirm password">
              <i role="button" class="show-password ri-eye-line text-black/60"></i>
            </div>
          </div>
        </div>
        <button type="button" id="register" class="w-full bg-primary text-sm text-white py-4 rounded-lg uppercase">Sign Up</button>
      </form>
      <p class="mt-4 text-sm text-dark text-center mb-2">Already have an account?</p>
      <a href="<?php echo SYSTEM_URL."/login" ?>" class="block w-fit bg-white text-xs font-semibold text-dark py-2 px-4 mx-auto rounded-md shadow-sm">Log In</a>
    </div>
  </main>

<?php include('Partials/footer.php'); ?>
<script>
    $('#register').click(function(){registerUsers();});
    $(document).on('keypress',function(e){if(e.which == 13){registerUsers();}});
</script>
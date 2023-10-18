<?php
$page_title = "Login";
$tab_active = "Login";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="min-h-screen grid place-items-center relative bg-whitesmoke">
    <div class="w-[min(28rem,90%)] rounded-md p-8">
      <a href="<?php echo SYSTEM_URL ?>" class="w-fit block mx-auto mb-2">
        <img src="<?php echo SYSTEM_URL ?>/public/images/logo.png" alt="logo" class="w-[100px]">
      </a>
      <p class="text-3xl font-bold text-primary uppercase leading-tight text-center">Pola Green</p>
      <p class="text-xl font-semibold text-dark leading-tight text-center mb-6">Nursery & Farm</p>
      <p class="text-2xl font-bold text-dark leading-tight text-center mb-1">Login to your account</p>
      <p class="text-sm font-medium text-gray-500 leading-tight text-center mb-12">Reconnect with nature: Your green journey continues here</p>

      <form autocomplete="off">
        <label for="email" class="text-xs font-semibold text-dark">Email Address</label>
        <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary mb-3 transition-all">
          <img src="<?php echo SYSTEM_URL ?>/public/icons/email-gray.svg" alt="email" class="w-5 h-5">
          <input type="text" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="email" placeholder="Enter your email address">
        </div>
        <label for="password" class="text-xs font-semibold text-dark">Password</label>
        <div class="w-full h-14 flex items-center gap-3 border-b-2 border-b-gray-300/50 px-6 mt-1 focus-within:border-b-primary mb-4 transition-all">
          <img src="<?php echo SYSTEM_URL ?>/public/icons/security-gray.svg" alt="password" class="w-5 h-5">
          <input type="password" class="w-full h-full text-xs text-gray-500 placeholder:text-gray-500 outline-none bg-transparent" id="password" placeholder="Account password">
          <i role="button" class="show-password ri-eye-line text-black/60"></i>
        </div>
        <button type="button" id="login" class="w-full bg-primary text-sm text-white py-4 rounded-lg uppercase">Log In</button>
      </form>
      <p class="mt-4 text-sm text-dark text-center mb-2">Does not have an account?</p>
      <a href="<?php echo SYSTEM_URL."/register" ?>" class="block w-fit bg-white text-xs text-dark font-semibold py-2 px-4 mx-auto rounded-md shadow-sm">Sign up</a>
    </div>
  </main>

<?php include('Partials/footer.php'); ?>
<script>
    $('#login').click(function(){loginUsers();});
    $(document).on('keypress',function(e){if(e.which == 13){loginUsers();}});
</script>
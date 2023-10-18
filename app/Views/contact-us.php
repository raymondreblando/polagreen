<?php
$page_title = "Contact Us";
$tab_active = "Contact";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="relative">
  
  <?php include('Partials/customer_navigation.php'); ?>

    <section class="min-h-screen bg-accent overflow-hidden pt-32 pb-24">
      <div class="w-[80%] mx-auto">
        <h1 class="text-3xl text-dark font-bold text-center">Get In Touch With Us</h1>
        <p class="text-sm text-gray-600 text-center mb-12">Let's Connect and Grow Together. Reach Out Now</p>
        <div class="max-w-[950px] flex flex-col-reverse md:flex-row items-center gap-6 mx-auto">
          <div class="flex-1">
            <img src="<?php echo SYSTEM_URL ?>/public/images/contact-image.svg" alt="contact" class="w-full object-contain">
          </div>
          <div class="flex-1">
            <div class="flex flex-col md:flex-row justify-center md:justify-start items-center gap-6 mb-6 border-b border-b-gray-300/40 pb-6">
              <img src="<?php echo SYSTEM_URL ?>/public/images/logo.png" alt="logo" class="w-[140px]">
              <div class="text-center md:text-left">
                <p class="text-xl font-bold text-primary uppercase leading-none">Pola Green</p>
                <p class="text-lg font-bold text-black">Nursery & Farm</p>
                <p class="text-xs text-black">Zone 5, Napo, Polangui, Albay</p>
                <p class="text-xs text-black">0907-037-4407</p>
                <p class="text-xs text-primary font-semibold mb-2">Always Open</p>
                <a href="https://www.facebook.com/profile.php?id=100064382031653" class="text-xs flex justify-center md:justify-start items-center gap-1" target="_blank">
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/facebook.svg" alt="facebook" class="w-5 h-5">
                  Polagreen
                </a>
              </div>
            </div>
            <form autocomplete="off" autocapitalize="on">
              <div class="grid md:grid-cols-2 gap-4 mb-4">
                <input type="text" id="fullname" class="w-full h-12 rounded-md outline-none text-sm font-light text-dark/90 px-4  border border-gray-300/40 bg-transparent placeholder:text-gray-500" placeholder="Enter your fullname">
                <input type="text" id="subject" class="w-full h-12 rounded-md outline-none text-sm font-light text-dark/90 px-4  border border-gray-300/40 bg-transparent placeholder:text-gray-500" placeholder="Enter the message subject">
                <input type="text" id="email" class="w-full h-12 rounded-md outline-none text-sm font-light text-dark/90 px-4  border border-gray-300/40 bg-transparent placeholder:text-gray-500" placeholder="Enter your email address">
                <input type="text" id="address" class="w-full h-12 rounded-md outline-none text-sm font-light text-dark/90 px-4  border border-gray-300/40 bg-transparent placeholder:text-gray-500" placeholder="Enter your address">
              </div>
              <textarea id="message" cols="30" rows="10" class="resize-none w-full h-24 rounded-md outline-none text-sm font-light text-dark/90  border border-gray-300/40 bg-transparent p-4 mb-4 placeholder:text-gray-500" placeholder="Enter your message here"></textarea>
              <button type="button" id="save-message" class="bg-primary text-white font-medium text-sm py-4 w-full rounded-md">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php include('Partials/section.php'); ?>
<?php include('Partials/footer.php'); ?>
<?php
$page_title = "About Us";
$tab_active = "About";

require_once("./initialized.php");

include('Partials/header.php');

?>
<body>

  <?php include('Partials/loader.php'); ?>

  <main class="relative">
  
  <?php include('Partials/customer_navigation.php'); ?>

    <section class="min-h-screen bg-accent overflow-hidden pt-32 pb-24">
      <div class="w-[80%] mx-auto">
        <h1 class="text-3xl text-dark font-bold text-center">Pola Green Nursery & Farm</h1>
        <p class="text-sm text-gray-600 text-center mb-12">Explore the individuals who have been engaged with Pola Green Nursery & Farm and its mission and vission.</p>
        <div class="max-w-[850px] mx-auto">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-8">
            <img src="<?php echo SYSTEM_URL ?>/public/images/plant-1.jpg" alt="plant" class="w-full h-full object-cover rounded-md">
            <img src="<?php echo SYSTEM_URL ?>/public/images/plant-2.jpg" alt="plant" class="w-full h-full object-cover rounded-md">
            <img src="<?php echo SYSTEM_URL ?>/public/images/plant-3.jpg" alt="plant" class="w-full h-full object-cover rounded-md">
            <img src="<?php echo SYSTEM_URL ?>/public/images/plant-4.jpg" alt="plant" class="w-full h-full object-cover rounded-md">
          </div>
          <div class="grid md:grid-cols-3 gap-6 md:gap-0">
            <div class="col-span-1 md:col-span-2">
              <h2 class="text-2xl text-black font-bold mb-4">Meet the team of <br> Pola Green Nursery & Farm</h2>
              <div class="flex flex-col sm:flex-row gap-6 mb-8">
                <div class="flex-1">
                  <p class="text-sm text-gray-500">CEO Plantation</p>
                  <p class="text-black font-medium mb-2">Mr. Mel Santos</p>
                  <p class="text-sm text-gray-500">Nursery Cooperator</p>
                  <p class="text-black font-medium mb-2">Mr. Jason Dennis Sambitan</p>
                  <p class="text-sm text-gray-500">Land Owner</p>
                  <p class="text-black font-medium mb-2">Mr. Gerard Peter Carreon</p>
                  <p class="text-sm text-gray-500">Nursery Propagator</p>
                  <p class="text-black font-medium">Mr. Gray Lotivo</p>
                </div>
                <div class="flex-1">
                  <p class="text-black font-semibold mb-2">Partnership</p>
                  <p class="text-sm text-gray-500">Individual Farmers</p>
                  <p class="text-black font-medium mb-2">HRISIA INC. Model Farm</p>
                  <p class="text-sm text-gray-500">Drip Irrigation Project</p>
                  <p class="text-black font-medium mb-2">IA Model Farm</p>
                  <p class="text-sm text-gray-500">Brgy. Napo, Polangui, Albay</p>
                  <p class="text-black font-medium">HIBIGA RIS (WMPA) IA</p>
                </div>
              </div>
              <div class="flex flex-col sm:flex-row gap-6">
                <div class="flex-1">
                  <p class="text-sm text-gray-500">In Partnership With</p>
                  <p class="text-black font-semibold mb-2">LGU Polangui & Municipal Agricultural Service Office</p>
                  <p class="text-black font-medium">HRISIA Administrative Officer</p>
                  <p class="text-sm text-gray-500 mb-2">Year 2020-2024</p>
                  <p class="text-sm text-gray-500">President</p>
                  <p class="text-black font-medium mb-2">Mr. Melanio B. Banares J.</p>
                  <p class="text-sm text-gray-500">Internal</p>
                  <p class="text-black font-medium mb-2">Ven John T. Chavez</p>
                  <p class="text-sm text-gray-500">External</p>
                  <p class="text-black font-medium mb-2">Edgardo R. Goyena</p>
                  <p class="text-sm text-gray-500">Secretary</p>
                  <p class="text-black font-medium mb-2">Arnel M. Lotivo</p>
                  <p class="text-sm text-gray-500">Treasurer</p>
                  <p class="text-black font-medium mb-2">Analyn B. Garcia</p>
                  <p class="text-sm text-gray-500">Auditor</p>
                  <p class="text-black font-medium mb-2">Alfie John P. Sanosa</p>
                </div>
                <div class="flex-1">
                  <p class="text-sm text-gray-500">Board of Directors</p>
                  <p class="text-black font-medium mb-2">Alfredo Brondial</p>
                  <p class="text-black font-medium mb-2">Ernesto Bernarte</p>
                  <p class="text-black font-medium mb-2">Rodolfo Tanqui</p>
                  <p class="text-black font-medium mb-2">Noli Cariso</p>
                  <p class="text-black font-medium mb-2">Oscar Villagomez Jr.</p>
                  <p class="text-black font-medium mb-2">Edgardo Lotivo</p>
                  <p class="text-black font-medium mb-2">Gregorio P. Mariscotes</p>
                  <p class="text-black font-medium mb-2">Berting Mella</p>
                  <p class="text-black font-medium mb-2">Victor Rosales</p>
                  <p class="text-black font-medium mb-2">Enrique Tripon</p>
                  <p class="text-black font-medium mb-2">Gil Rebustillo</p>
                  <p class="text-black font-medium">Celerino C. Libelo Jr.</p>
                </div>
              </div>
            </div>
            <div>
              <div class="flex-1 rounded-md p-8 bg-primary mb-4">
                <h2 class="text-xl text-white font-semibold mb-4">Mission</h2>
                <p class="text-sm text-white mb-2">1. Do Continuous Research and Development;</p>
                <p class="text-sm text-white mb-2">2. Sharing Best Practices in Production, Processing, Profit Making and Sharing</p>
                <p class="text-sm text-white mb-2">3. Engagement in Human Resource Development;</p>
                <p class="text-sm text-white">4. Developing Linkgaes and Networking;</p>
              </div>
              <div class="flex-1 rounded-md p-8 bg-primary">
                <h2 class="text-xl text-white font-semibold mb-4">Vision</h2>
                <p class="text-sm text-white">All individuals and groups involved in the Cacao Industry in the Philippines and the World work together for a mutually benegicial and sustainable partnership</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php include('Partials/section.php'); ?>
<?php include('Partials/footer.php'); ?>
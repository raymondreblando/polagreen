<?php
Flight::set('flight.views.path', 'app/');

Flight::route('/', function(){
    Flight::render('Views/system_homepage.php');
});
Flight::route('/login', function(){
    Flight::render('Views/user_login.php');
});
Flight::route('/register', function(){
    Flight::render('Views/user_register.php');
});
Flight::route('/logout', function(){
    Flight::render('Views/user_logout.php');
});
Flight::route('/products', function(){
    Flight::render('Views/products.php');
});
Flight::route('/view-product/@id', function($id){
    Flight::render('Views/view-plant.php', array('id' => $id));
});
Flight::route('/my-orders', function(){
    Flight::render('Views/my-orders.php');
});
Flight::route('/cart', function(){
    Flight::render('Views/shopping-cart.php');
});
Flight::route('/about', function(){
    Flight::render('Views/about-us.php');
});
Flight::route('/contact', function(){
    Flight::render('Views/contact-us.php');
});
Flight::route('/dashboard-product-inventory', function(){
    Flight::render('Views/admin_product_inventory.php');
});
Flight::route('/dashboard-product-create', function(){
    Flight::render('Views/admin-product-create.php');
});
Flight::route('/dashboard-product-update/@id', function($id){
    Flight::render('Views/admin-product-update.php', array('id' => $id));
});
Flight::route('/dashboard-categories', function(){
    Flight::render('Views/admin_category.php');
});
Flight::route('/dashboard-accounts', function(){
    Flight::render('Views/accounts.php');
});
Flight::route('/dashboard-orders', function(){
    Flight::render('Views/orders.php');
});
Flight::route('/dashboard-manage-account', function(){
    Flight::render('Views/manage-account.php');
});
Flight::route('/dashboard-messages', function(){
    Flight::render('Views/messages.php');
});
// Route for handling 403 Forbidden error
Flight::map('error403', function(){
    Flight::render('Views/error/403.php');
});
// Route for handling 404 Not Found error
Flight::map('notFound', function(){
    Flight::render('Views/error/404.php');
});
// Route for handling 405 Method Not Allowed error
Flight::map('methodNotAllowed', function(){
    Flight::render('Views/error/405.php');
});
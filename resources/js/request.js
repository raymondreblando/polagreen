function showToastNotification(responseType, responseMsg, responseEvent) {
       var settings = {
         title: 'Pola Green:',
         message: responseMsg,
         layout: 1,
         close: true,
         position: 'topCenter',
         animateInside: true,
         pauseOnHover: false,
         progressBar: true,
         progressBarColor: '#f9c929',
         progressBarEasing: 'linear',
         transitionIn: 'fadeInUp',
         transitionOut: 'fadeOut',
         transitionInMobile: 'fadeInUp',
         transitionOutMobile: 'fadeOutDown',
         theme: 'dark',
         onClosing: function () {
              if(responseEvent === "yes"){
                     location.reload();
              }
         }
       };
     
       switch (responseType) {
         case 'success':
           settings.backgroundColor = '#03a65a';
           settings.titleColor = '#ffffff';
           settings.messageColor = '#ffffff';
           settings.icon = 'ri-shield-check-fill';
           settings.iconColor = '#ffffff';
           settings.timeout = 2000
           break;
         case 'error':
           settings.backgroundColor = '#db3056';
           settings.titleColor = '#ffffff';
           settings.messageColor = '#ffffff';
           settings.icon = 'ri-close-circle-fill';
           settings.iconColor = '#ffffff';
           settings.timeout = 3000
           break;
         case 'info':
           settings.backgroundColor = '#0070e0';
           settings.titleColor = '#ffffff';
           settings.messageColor = '#ffffff';
           settings.icon = 'ri-information-fill';
           settings.iconColor = '#ffffff';
           settings.timeout = 3000
           break;
         default:
           settings.backgroundColor = '#444444';
           settings.titleColor = '#ffffff';
           settings.messageColor = '#ffffff';
           settings.icon = 'ri-alert-line';
           settings.iconColor = '#ffffff';
           settings.timeout = 3000
           break;
       }
     
       return settings;
}
function transferData(url, data){
       NProgress.start();
       $.ajax({
              type: "POST",
              url: url,
              data: data,
              dataType: 'json',
              cache: false,
              contentType: false,
              processData: false,
              success: function (response) {
                     NProgress.done();
                     iziToast.show(showToastNotification(response.responseType, response.responseMsg, response.responseEvent));
                     if(response.responseType === "success" && response.responseRedirect.trim() !== ""){
                            setTimeout(function() {
                                   window.location.href = response.responseRedirect;
                            }, 600);
                     }
              },
              error: function (response) {
                     console.log(response);
              }
       });
}
function loginUsers(){
       var form_data = new FormData();
       var email = $("#email").val();
       var password = $("#password").val();

       form_data.append("email", email);
       form_data.append("password", password);

       url = "app/Handlers/process_user_login.php";
       transferData(url, form_data);
}
function registerUsers(){
       var form_data = new FormData();
       var fullname = $("#fullname").val();
       var email = $("#email").val();
       var gender = $("#gender").val();
       var username = $("#username").val();
       var phone_number = $("#phone_number").val();
       var address = $("#address").val();
       var password = $("#password").val();
       var confirm_password = $("#confirm_password").val();

       form_data.append("fullname", fullname);
       form_data.append("email", email);
       form_data.append("gender", gender);
       form_data.append("username", username);
       form_data.append("phone_number", phone_number);
       form_data.append("address", address);
       form_data.append("password", password);
       form_data.append("confirm_password", confirm_password);

       url = "app/Handlers/process_user_register.php";
       transferData(url, form_data);
}
function UpdateTotalAmount() {
       var totalAmount = 0;
   
       $('.items').each(function () {
           var price = parseFloat($(this).find('.item-price').text());
           var quantity = parseInt($(this).find('.item-counter').text());
           
           if (!isNaN(price) && !isNaN(quantity)) {
               totalAmount += price * quantity;
           }
       });
   
       $('#total-amount').text(totalAmount);
}
$(document).on('click', '#save-product', function() {
       var form_data = new FormData();
       var product_name = $("#product_name").val();
       var category = $("#category").val();
       var price = $("#price").val();
       var stocks = $("#stocks").val();
       var status = $("#status").val();
       var product_img_1 = $("#product_img_1").prop('files')[0];
       var product_img_2 = $("#product_img_2").prop('files')[0];
       var product_img_3 = $("#product_img_3").prop('files')[0];
       var product_img_4 = $("#product_img_4").prop('files')[0];

       form_data.append("product_name", product_name);
       form_data.append("category", category);
       form_data.append("price", price);
       form_data.append("stocks", stocks);
       form_data.append("status", status);
       form_data.append("product_img_1", product_img_1);
       form_data.append("product_img_2", product_img_2);
       form_data.append("product_img_3", product_img_3);
       form_data.append("product_img_4", product_img_4);

       url = "app/Handlers/process_product_create.php";
       transferData(url, form_data);
});
$(document).on('click', '#update-product', function() {
       var form_data = new FormData();
       var id = $(this).data('id');
       var product_name = $("#product_name").val();
       var category = $("#category").val();
       var price = $("#price").val();
       var stocks = $("#stocks").val();
       var status = $("#status").val();
       var product_img_1 = $("#product_img_1").prop('files')[0];
       var product_img_2 = $("#product_img_2").prop('files')[0];
       var product_img_3 = $("#product_img_3").prop('files')[0];
       var product_img_4 = $("#product_img_4").prop('files')[0];

       

       form_data.append("id", id);
       form_data.append("product_name", product_name);
       form_data.append("category", category);
       form_data.append("price", price);
       form_data.append("stocks", stocks);
       form_data.append("status", status);
       form_data.append("product_img_1", product_img_1);
       form_data.append("product_img_2", product_img_2);
       form_data.append("product_img_3", product_img_3);
       form_data.append("product_img_4", product_img_4);

       url = "./../app/Handlers/process_product_update.php";
       transferData(url, form_data);
});
$(document).on('click', '#create-category', function() {
       var form_data = new FormData();
       var category = $("#category").val();

       form_data.append("category", category);

       url = "app/Handlers/process_product_category_create.php";
       transferData(url, form_data);
});
$(document).on('click', '.remove-category', function() {
       var form_data = new FormData();
       var id = $(this).data('id');

       form_data.append("id", id);

       url = "app/Handlers/process_product_category_removed.php";
       transferData(url, form_data);
});
$(document).on('click', '#save-message', function() {
       var form_data = new FormData();
       var fullname = $("#fullname").val();
       var subject = $("#subject").val();
       var email = $("#email").val();
       var address = $("#address").val();
       var message = $("#message").val();

       form_data.append("fullname", fullname);
       form_data.append("subject", subject);
       form_data.append("email", email);
       form_data.append("address", address);
       form_data.append("message", message);

       url = "app/Handlers/process_message_save.php";
       transferData(url, form_data);
});
$(document).on('click', '.saveOrder', function() {
       var form_data = new FormData();
       var identifier = $(this).data('id');
       
       form_data.append("identifier", identifier);

       $.ajax({
              type: "POST",
              url: "app/Handlers/process_save_order_to_cart.php",
              data: form_data,
              dataType: 'json',
              cache: false,
              contentType: false,
              processData: false,
              success: function (response) {
                     iziToast.show(showToastNotification(response.responseType, response.responseMsg, response.responseEvent));
                     if(response.responseType === "success" && response.responseRedirect.trim() !== ""){
                            window.location.href = response.responseRedirect;
                     }

                     $('#countCart1').text(response.cartCount);
                     $('#countCart2').text(response.cartCount);
                     if(response.cartCount > 0){
                            $('#badgeCart1').removeClass('hidden');
                            $('#badgeCart2').removeClass('hidden');
                     }
              }
       });
});
$(document).on('click', '.saveOrderWithQty', function() {
       var form_data = new FormData();
       var identifier = $(this).data('id');
       var qty = $('.p_counter').text();
       
       form_data.append("identifier", identifier);
       form_data.append("qty", qty);

       $.ajax({
              type: "POST",
              url: "./../app/Handlers/process_save_order_to_cart_w_qty.php",
              data: form_data,
              dataType: 'json',
              cache: false,
              contentType: false,
              processData: false,
              success: function (response) {
                     iziToast.show(showToastNotification(response.responseType, response.responseMsg, response.responseEvent));
                     if(response.responseType === "success" && response.responseRedirect.trim() !== ""){
                            window.location.href = response.responseRedirect;
                     }

                     $('#countCart1').text(response.cartCount);
                     $('#countCart2').text(response.cartCount);
                     if(response.cartCount > 0){
                            $('#badgeCart1').removeClass('hidden');
                            $('#badgeCart2').removeClass('hidden');
                     }
              }
       });
});
$(document).on('click', '#saveShippingDetails', function() {
       var form_data = new FormData();
       var zone = $("#zone").val();
       var address = $("#address").val();
       var zip_code = $("#zip_code").val();
       var phone_number = $("#phone_number").val();

       form_data.append("zone", zone);
       form_data.append("address", address);
       form_data.append("zip_code", zip_code);
       form_data.append("phone_number", phone_number);

       url = "app/Handlers/process_shipping_details.php";
       transferData(url, form_data);
});
$(document).on('click', '.cart-item .radio', function () {
       var $checkbox = $(this).siblings(".checkbox").find(".item-checkbox");
       $checkbox.prop("checked", !$checkbox.prop("checked"));
});
$(document).on('click', '.remove-btn', function () {
       var form_data = new FormData();

       var selectedItems = [];
   
       $(".cart-item .item-checkbox:checked").each(function () {
         selectedItems.push($(this).closest(".cart-item").data("item-id"));
       });
   
       form_data.append("items", selectedItems);

       if (selectedItems.length > 0) {
              url = "app/Handlers/process_cart_item_removed.php";
              transferData(url, form_data);
       }else{
              iziToast.show(showToastNotification("error", 'No product selected.', 'no'));
       }
});
$(document).on('click', '.increment', function() {
       var id = $(this).attr("id");
       var identifier = $(this).data("id");
       var counter = $('#items-counters-' + id);
       var currentValue = parseInt(counter.text());

       newCountValue = currentValue + 1;
       counter.text(newCountValue);
       UpdateTotalAmount();

       var form_data = new FormData();
       form_data.append("identifier", identifier);
       form_data.append("newCountValue", newCountValue);
       $.ajax({
              type: "POST",
              url: "app/Handlers/process_cart_quantity_update.php",
              data: form_data,
              dataType: 'json',
              cache: false,
              contentType: false,
              processData: false
       });
});   
$(document).on('click', '.decrement', function() {
       var id = $(this).attr("id");
       var identifier = $(this).data("id");
       var counter = $('#items-counters-' + id);
       var currentValue = parseInt(counter.text());
   
       if (currentValue > 1) {
              newCountValue = currentValue - 1;
              counter.text(newCountValue);
              UpdateTotalAmount();
           
              var form_data = new FormData();
              form_data.append("identifier", identifier);
              form_data.append("newCountValue", newCountValue);
              $.ajax({
                     type: "POST",
                     url: "app/Handlers/process_cart_quantity_update.php",
                     data: form_data,
                     dataType: 'json',
                     cache: false,
                     contentType: false,
                     processData: false
              });

              if(newCountValue === 0){
                     location.reload();
              }
       }
});      
$(document).on('click', '#checkOut', function() {
       var form_data = new FormData();
       var totalAmount = $("#total-amount").text();

       form_data.append("totalAmount", totalAmount);

       url = "app/Handlers/process_checkout_order.php";
       transferData(url, form_data);
}); 
$(document).on('click', '.cancel-order', function() {
       var form_data = new FormData();
       var id = $(this).data('id');

       form_data.append("id", id);

       url = "app/Handlers/process_order_cancel.php";
       transferData(url, form_data);
}); 
$(document).on('click', '.block-user', function() {
       var form_data = new FormData();
       var id = $(this).data('id');
       var value = $(this).data('value');

       form_data.append("id", id);
       form_data.append("value", value);

       url = "app/Handlers/process_user_change_status.php";
       transferData(url, form_data);
}); 
$(document).on('click', '#changePassword', function() {
       var form_data = new FormData();
       var current_password = $('#current_password').val();
       var new_password = $('#new_password').val();
       var confirm_password = $('#confirm_password').val();

       form_data.append("current_password", current_password);
       form_data.append("new_password", new_password);
       form_data.append("confirm_password", confirm_password);

       url = "app/Handlers/process_user_change_password.php";
       transferData(url, form_data);
}); 
$(document).on('click', '#updateAccount', function() {
       var form_data = new FormData();
       var fullname = $('#fullname').val();
       var email = $('#email').val();
       var gender = $('#gender').val();
       var username = $('#username').val();
       var phone_number = $('#phone_number').val();
       var address = $('#address').val();

       form_data.append("fullname", fullname);
       form_data.append("email", email);
       form_data.append("gender", gender);
       form_data.append("username", username);
       form_data.append("phone_number", phone_number);
       form_data.append("address", address);

       url = "app/Handlers/process_user_update_info.php";
       transferData(url, form_data);
}); 
$(document).on('click', '.change-order', function() {
       var form_data = new FormData();
       var id = $(this).data('id');
       var value = $(this).data('value');

       form_data.append("id", id);
       form_data.append("value", value);

       url = "app/Handlers/process_order_change_status.php";
       transferData(url, form_data);
}); 
$(document).on('click', '.sendReply', function() {
       var form_data = new FormData();
       var id = $(this).data('id');
       var reply = $('#reply'+id+'').val();

       form_data.append("id", id);
       form_data.append("reply", reply);

       url = "app/Handlers/process_message_reply.php";
       transferData(url, form_data);
}); 
$(document).ready(function () {
      UpdateTotalAmount();
      
       // Search for table
       $('#search-table').keyup(function () { 
            var $tableRow = $('#table tbody tr');
            var val = $.trim($(this).val()).replace(/ +/g,'').toLowerCase();
            $tableRow.show().filter(function(){
            var text = $(this).text().replace(/\s+/g,'').toLowerCase();
            return !~text.indexOf(val);
            }).hide();
     });

     // Search for Element
     $('.search-div').keyup(function () { 
            var matcher = new RegExp($(this).val(), 'i');
            $('.search-area').show().not(function(){
            return matcher.test($(this).find('.finder1, .finder2, .finder3, .finder4, .finder5').text());
            }).hide();
     });

     // Filter Product By Category and Price
     $(".filter-option.category-option").on("click", function () {
       $(".filter-option.category-option").removeClass("active");
       $(this).addClass("active");
       applyFilters();
     });
   
     $(".filter-option.price-option").on("click", function () {
       $(".filter-option.price-option").removeClass("active");
       $(this).addClass("active");
       applyFilters();
     });

     
      var ascending = false;

      $('.ascending').on('click', function () {
          sortTable(!ascending);
      });

      $('.descending').on('click', function () {
          sortTable(ascending);
      });
      $('.filter-btn').on('click', function () {
        var statusFilter = $(this).data('status');
        filterTable(statusFilter);
    });

    $('.date-filter').on('input', function () {
        var dateFilter = $(this).val();
        filterTable(dateFilter);
    });

    // Initially, show all cards
    $('.order-card').show();

    // Click event handlers for filter buttons
    $('#all-button').click(function () {
        $('.order-card').show();
    });

    $('#pending-button').click(function () {
        $('.order-card').hide();
        $('.order-card-pending').show();
    });

    $('#confirmed-button').click(function () {
        $('.order-card').hide();
        $('.order-card-confirmed').show();
    });

    $('#completed-button').click(function () {
        $('.order-card').hide();
        $('.order-card-completed').show();
    });
    $('#cancelled-button').click(function () {
      $('.order-card').hide();
      $('.order-card-cancelled').show();
  });
});
function applyFilters() {
       const selectedCategory = $(".filter-option.category-option.active").text();
       const selectedPriceRange = $(".filter-option.price-option.active").text();
   
       $(".filter-identifier").each(function () {
         const category = $(this).find(".category-name").text();
         const price = parseInt($(this).find(".filter-price").text());
   
         if ((selectedCategory === "All" || category === selectedCategory) &&
             (selectedPriceRange === "All" || isPriceInRange(price, selectedPriceRange))) {
           $(this).show();
         } else {
           $(this).hide();
         }
       });
}
function isPriceInRange(price, range) {
       const ranges = {
         "1 - 100": [1, 100],
         "100 - 200": [100, 200],
         "200 - 300": [200, 300],
         "500 - 1000": [500, 1000],
         "1000 Up": [1001, Infinity]
       };
   
       const [min, max] = ranges[range];
       return price >= min && price <= max;
}
function sortTable(asc) {
  var table = $('#table');
  
  var rows = table.find('tbody tr').get();
  rows.sort(function (a, b) {
      var A = $(a).find('td:eq(1)').text().toUpperCase();
      var B = $(b).find('td:eq(1)').text().toUpperCase();

      if (A < B) {
          return asc ? -1 : 1;
      }
      if (A > B) {
          return asc ? 1 : -1;
      }

      return 0;
  });

  $.each(rows, function (index, row) {
      table.children('tbody').append(row);
  });

  ascending = asc;
}
function filterTable(statusFilter) {
  var dateFilter = new Date($('.date-filter').val());

  $('#table tbody tr').each(function () {
      var row = $(this);
      var status = row.find('td:eq(6) .status-tag').text().toLowerCase();
      var date = new Date(row.find('td:eq(5)').text());

      if ((statusFilter === 'all' || status === statusFilter) &&
          (isNaN(dateFilter) || date.toDateString() === dateFilter.toDateString())) {
          row.show();
      } else {
          row.hide();
      }
  });
}
function isNumeric(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode (key);
  var regex = /[0-9]|\./;
  if ( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
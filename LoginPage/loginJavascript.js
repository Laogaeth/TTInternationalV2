//script for the side menu animation
// its not that pretty, arguably anything in the world can be programmed with Elses and isFinite, I got to thrive to go beyond this.

$(document).ready(function(){
    $('.btn__menu__arrow').click(function() {
        $(this).toggleClass('menu-open');
        const currentWidth = $('.navbar').css('width');
        if ($(this).hasClass('menu-open')) {
            $('.navbar').animate({
                width: '10.625rem',
                height: '100%'
            }, 'fast');
            $('.nav--arrow').animate({
                left: '+=7.813rem'
            }, 'fast');
        } else {
            $('.navbar').animate({
                width: '2.5rem',
                height: '2.5rem'
            }, 'fast');
            $('.nav--arrow').animate({
                left: '-=7.813rem'
            }, 'fast');
        }
    });

    //this bit makes the side menu content reappear once it's expanded
    $('.nav--arrow').click(function() {
        if ($('.menu__nav').is(':visible')) {
            $('.menu__nav').hide();
        } else {
            setTimeout(function() {
                $('.menu__nav').show();
            }, 100);
        }
    });
});



$.ajax({
  url: "./fetch_stock.php",
  method: "GET",
  success: function(data) {
    let products = JSON.parse(data);
    products.forEach(function(product) {
      $("#stock-table").append("<tr>" + 
          "<input type='hidden' name='id' value='"+ product.id +" '>" + 
          "<input class='product--category' type='hidden' name='product_id' value='"+ product.product_id +" '>" + 
          "<td ><input class='product--name'  name='product_name' type='text' value='" + product.product_name + "'" + "</td>" + 
          "<td><input name='quantity' type='number' value='" + product.quantity + "'" + "</td>" + 
          "<td><input name='price' type='text' value='" + product.price + "'" +  "</td>" + 
          "<td>" + "<input type='submit' name='update--btn' value='update' class='update--button'>" + "</td>" + 
      "</tr>" 
      );
    });

  }
});


//search bar
$("#searchTerm").on("keyup", function () {
  let searchTerm = $(this).val().toLowerCase();
  $("#stock-table input")
    .filter(".product--name")
    .each(function () {
      let productName = $(this).val().toLowerCase();
      let productCategory = $(this)
        .closest("tr")
        .find(".product--category")
        .val()
        .toLowerCase();
      let hideRow = true;
      if (productName.indexOf(searchTerm) !== -1) {
        hideRow = false;
      }
      if (productCategory.indexOf(searchTerm) !== -1) {
        hideRow = false;
      }
      if (hideRow) {
        $(this).closest("tr").fadeOut(500);
      } else {
        $(this).closest("tr").fadeIn(500);
      }
    });
});

// Add the click event listener to a parent element using event delegation
$("#stock-table").on("click", ".update--button", function (e) {
  e.preventDefault();
  let row = $(this).closest("tr");
  let id = row.find("input[name='id']").val();
  let product_name = row.find("input[name='product_name']").val();
  let product_id = row.find("input[name='product_id']").val();
  let quantity = row.find("input[name='quantity']").val();
  let price = row.find("input[name='price']").val();

  $.ajax({
    url: "./update_stock.php",
    method: "POST",
    data: {
      id: id,
      product_id: product_id,
      product_name: product_name,
      quantity: quantity,
      price: price,
    },
    success: function (data) {
      console.log(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error(jqXHR,textStatus, errorThrown);
    },
  });
});


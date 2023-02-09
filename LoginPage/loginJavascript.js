//script for the side menu animation
// its not that pretty, arguably anything in the world can be programmed with Elses and isFinite, I got to thrive to go beyond this.

$(document).ready(function(){
    $('.btn__menu__arrow').click(function() {
        const currentWidth = $('.navbar').css('width');
        if (currentWidth === '40px') {
            $('.navbar').animate({
                width: '170px',
                height: '100%'
            }, 'fast');
            $('.nav--arrow').animate({
                left: '+=125px'
            }, 'fast');
        } else {
            $('.navbar').animate({
                width: '40px',
                height: '40px'
            }, 'fast');
            $('.nav--arrow').animate({
                left: '-=125px'
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
        "<form>" +
          "<input type='hidden' name='id' value='"+ product.id +" '>" + 
          "<td><input type='text' value='" + product.product_name + "'" + "</td>" + 
          "<td><input type='number' value='" + product.quantity + "'" + "</td>" + 
          "<td><input type='text' value='" + product.price + "'" + "</td>" + 
          "<td>" + "<input type='submit' name='update' value='update' class='update-button'>" + "</td>" + 
        "</form>" +
      "</tr>" 
      );
    });
    
    // Add the click event listener to the submit button
    $(".update-button").click(function(e) {
      e.preventDefault();
      let form = $(this).closest("form");
      let id = form.find("input[name='id']").val();
      let product_name = form.find("input[name='product_name']").val();
      let quantity = form.find("input[name='quantity']").val();
      let price = form.find("input[name='price']").val();
      
      $.ajax({
        url: "./update_stock.php",
        method: "POST",
        data: { id: id, product_name: product_name, quantity: quantity, price: price },
        success: function(data) {
          console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus, errorThrown);
        }
      });
    });
  }
});

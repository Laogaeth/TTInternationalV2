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
            "<td>" + product.product_name + "</td>" + 
            "<td>" + product.quantity + "</td>" + 
            "<td>" + product.price + "</td>" + 
            "<td>" + "<input type='button' value='Update' class='update-button'>" + "</td>" + 
         "</tr>");
      });
   }
});

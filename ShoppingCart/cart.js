  //script for the side menu animation
    $(document).ready(function(){
        $('.btn__menu__arrow').click(function() {
            const currentWidth = $('.navbar').css('width');
            if (currentWidth === '40px') {
                $('.navbar').animate({
                    width: '170px'
                }, 'fast');
                $('.nav--arrow').animate({
                    left: '+=125px'
                }, 'fast');
            } else {
                $('.navbar').animate({
                    width: '40px'
                }, 'fast');
                $('.nav--arrow').animate({
                    left: '-=125px'
                }, 'fast');
            }
        });
    });

    //this script makes the side menu content reappear once it's expanded
    $(document).ready(function() {
      $('.nav--arrow').click(function() {
        if ($('.menu__nav').is(':visible')) {
          $('.menu__nav').hide();
        } else {
          setTimeout(function() {
            $('.menu__nav').show();
          }, 200);
        }
      });
    });

    //Remove from cart functionality
$(document).ready(function(){
  $('.cart--remove--button').click(function(){
    const cartId = $(this).data('cart-id');

    $.ajax({
      url: 'removeFromCart.php',
      type: 'POST',
      data: {cart_id: cartId},
      success: function(response){
        console.log('Item removed from cart');
        location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error(textStatus, errorThrown);
      }
    });
  });
});






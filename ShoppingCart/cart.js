//script for the side menu animation

// $(document).ready(function(){
//     $('.btn__menu__arrow').click(function() {
//         $(this).toggleClass('menu-open');
//         const currentWidth = $('.navbar').css('width');
//         if ($(this).hasClass('menu-open')) {
//             $('.navbar').animate({
//                 width: '10.625rem',
//                 height: '100%'
//             }, 'fast');
//             $('.nav--arrow').animate({
//                 left: '+=7.813rem'
//             }, 'fast');
//         } else {
//             $('.navbar').animate({
//                 width: '2.5rem',
//                 height: '2.5rem'
//             }, 'fast');
//             $('.nav--arrow').animate({
//                 left: '-=7.813rem'
//             }, 'fast');
//         }
//     });

//     //this bit makes the side menu content reappear once it's expanded
//     $('.nav--arrow').click(function() {
//         if ($('.menu__nav').is(':visible')) {
//             $('.menu__nav').hide();
//         } else {
//             setTimeout(function() {
//                 $('.menu__nav').show();
//             }, 100);
//         }
//     });
// });

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







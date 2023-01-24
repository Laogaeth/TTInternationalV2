//script for the side menu animation

$(document).ready(function(){
    $('.btn__menu__arrow').click(function() {
        const currentWidth = $('.navbar').css('width');
        if (currentWidth === '40px') {
            $('.navbar').animate({
                width: '170px'
            }, 'slow');
            $('.nav--arrow').animate({
                left: '+=125px'
            }, 'slow');
        } else {
            $('.navbar').animate({
                width: '40px'
            }, 'slow');
            $('.nav--arrow').animate({
                left: '-=125px'
            }, 'slow');
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
      }, 800);
    }
  });
});

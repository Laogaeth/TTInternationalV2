
//validate  Form
function validateForm() {
  let x = document.forms["formulario"]["name"].value;
  if (x == "") {
    alert("All fields required to be filled.");
    return false;
  }
  let n = document.forms["formulario"]["last"].value;
  if (n == "") {
    alert("All fields required to be filled.");
    return false;
  }
  let y = document.forms["formulario"]["email"].value;
  if (y == "") {
    alert("All fields required to be filled.");
    return false;
  }
  let z = document.forms["formulario"]["phone"].value;
  if (z == "") {
    alert("All fields required to be filled.");
    return false;
  }
}


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

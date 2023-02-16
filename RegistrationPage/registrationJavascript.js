
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


 document.getElementById("birthday").addEventListener("change", function () {
   let today = new Date();
   let birthdate = new Date(this.value);
   let age = today.getFullYear() - birthdate.getFullYear();
   let m = today.getMonth() - birthdate.getMonth();
   if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
     age--;
   }
   if (age < 18) {
     alert("You must be at least 18 years old to register.");
     this.value = "";
   }
 });


//get back to the top button
const button = document.querySelector('.button--icon');
const h5Title = document.getElementById('Hygiene');
window.addEventListener('scroll', () => {
  // Get the position of the h5 title on the page
  const h5TitlePosition = h5Title.getBoundingClientRect();
  // Check if the h5 title is out of view
  if (h5TitlePosition.top < 0) {
    // Show the button
    button.style.display = 'block';
  } else {
    // Hide the button
    button.style.display = 'none';
  }
});

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


//search bar
$("#searchTerm").on("keyup", function() {
  let searchTerm = $(this).val().toLowerCase();
  $(".card").each(function() {
    let productName = $(this).find(".card--title").text().toLowerCase();
    if (productName.indexOf(searchTerm) === -1) {
      $(this).fadeOut(500);
    } else {
      $(this).fadeIn(500);
    }
  });
});




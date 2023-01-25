//map out category names 
const categoryDivMap ={
  "Food & Treats":"#food-treats",
  "Hygiene":"#hygiene-products",
  "Toys":"#toys",
  "Clothes":"#clothes"
};
//Snatch products data from json file
$.getJSON("productsData.json", function(data){
    //Snatch the prices from prices.php script
    $.getJSON("prices.php", function(prices){
      //Loops through all products
      $.each(data.products,function(index,product){
        const categoryDiv = categoryDivMap[product.category];
        if (categoryDiv){
          $(categoryDiv).append(
            "<div class = 'col-sm card shadow--sm'>" +
            "<img class = 'card--image' src='"+ product.image +"'>"+
            "<p class ='card--text  card--buy--info'>"+ product.name + 
             " <br>" +prices[product.name] + " €"+ "<i class='fa-solid fa-cart-shopping card--cart'></i>" + "</p>" +
            "</div>"
          );
        }
      });
    });
});




//get back to the top button
const button = document.querySelector('.button--icon');
const h5Title = document.getElementById('hygiene');
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

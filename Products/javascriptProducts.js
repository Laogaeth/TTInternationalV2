$.getJSON ("productsData.php", function(data){
//loop through all products
$.each(data, function(index, product){
//get the correct div to append the product to
const categoryDiv = categoryDivMap[product.category];
if (categoryDiv){
//get the correct product name based on the category
const name = "";
if(product.category == "food"){
name = product.product_name;
}else if(product.category == "toys"){
name = product.product_name;
}else if(product.category == "hygiene"){
name = product.product_name;
}else if(product.category == "clothes"){
name = product.product_name;
}
//get the price of the product from the prices.php file
$.getJSON("prices.php", {id: product.id}, function(price){
//append the product to the correct category div
$(categoryDiv).append(
"<div class = 'col-sm card shadow--sm'>" +
"<img class = 'card--image' src='" +"'>"+
"<p class ='card--text  card--buy--info'>"+ name +
"<br>" + price + " €"+ "<i class='fa-solid fa-cart-shopping card--cart'></i>" +
"<br> Stock: "+ product.stock + "</p>" +
"</div>"
);
});
}
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

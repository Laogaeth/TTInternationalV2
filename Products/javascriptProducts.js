
$.getJSON("./dbProductsData.php", function(data) {
     $.each(data, function(index, value) {
        var category = value.category;
        var product_name = value.product_name;
        var price = value.price;
        var image_path = value.image_path;

        var categoryDiv = $("#" + category);
        var card = $("<div>", { class: "col card shadow-sm" });
        var cardImg = $("<img>", { class: "card-img-top card-image", src: image_path });
        var cardBody = $("<div>", { class: "card-body" });
        var cardTitle = $("<h5>", { class: "card-title", text: product_name });
        var cardText = $("<p>", { class: "card-text card-buy-info", text: price + " €" });
        var cardCart = $("<i>", { class: "fa fa-cart-plus card-cart" });

        cardBody.append(cardTitle);
        cardBody.append(cardText);
        cardBody.append(cardCart);
        card.append(cardImg);
        card.append(cardBody);
        categoryDiv.append(card);
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


$.getJSON("./dbProductsData.php", function(data) {
     $.each(data, function(index, value) {
        const category = value.category;
        const product_name = value.product_name;
        const price = value.price;
        const image_path = value.image_path;

        let categoryDiv = $("#" + category);
        let card = $("<div>", { class: "col-sm-2 card shadow--sm" });
        let cardImg = $("<img>", { class: "card-img-top card--image", src: image_path });
        let cardBody = $("<div>");
        let cardTitle = $("<h5>", { class: "card--title", text: product_name });
        let cardFooter = $("<div>", { class: "card--footer card--buy--info  " });
        let cardText = $("<p>", { class: "card--text  col", text: price + " €" });
        let cardCart = $("<i>", { class: "fa-solid fa-2x fa-cart-shopping card--cart" }); 

        
        cardBody.append(cardTitle);
        card.append(cardImg);
        card.append(cardBody);
        categoryDiv.append(card);
        cardFooter.append(cardText, cardCart);
        card.append(cardFooter);
    });
});



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


// Bind a click event to the shopping cart icon
$('.card--cart').on('click', function() {
  // Get the product name, price, and quantity from the product page
  var productName = $(this).data('product-name');
  var productPrice = $(this).data('product-price');
  var productQuantity = $(this).data('product-quantity');
  
  // Create a new row for the item in the cart table
  var newRow = $('<div>', { class: 'row' });
  
  // Create a new column for the product name and add the name to it
  var productNameCol = $('<div>', { class: 'col' });
  productNameCol.text(productName);
  
  // Create a new column for the product price and add the price to it
  var productPriceCol = $('<div>', { class: 'col' });
  productPriceCol.text(productPrice);
  
  // Create a new column for the product quantity
  var productQuantityCol = $('<div>', { class: 'col' });
  // Create a quantity input field and add it to the column
  var quantityInput = $('<input>', { type: 'number', class: 'form-control', value: productQuantity });
  productQuantityCol.append(quantityInput);
  
  // Create a new column for the total cost of the item
  var totalCostCol = $('<div>', { class: 'col' });
  totalCostCol.text(productPrice * productQuantity);
  
  // Create a new column for the remove button
  var removeCol = $('<div>', { class: 'col' });
  var removeBtn = $('<a>', { href: '#', class: 'btn btn-danger btn--remove' }).text('Remove');
  removeCol.append(removeBtn);
  
  // Append all the columns to the new row
  newRow.append(productNameCol, productPriceCol, productQuantityCol, totalCostCol, removeCol);
  
  // Append the new row to the cart table
  $('.cart-table').append(newRow);
});
console.log(".card--cart")

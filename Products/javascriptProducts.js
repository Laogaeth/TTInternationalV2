var categoryDivMap = {
    "Food & Treats": "#food-treats",
    "Hygiene": "#hygiene-products",
    "Toys": "#toys",
    "Clothes": "#clothes"
};

$.getJSON("productsData.json", function(data) {
    $.each(data.products, function(index, product) {
        var categoryDiv = categoryDivMap[product.category];
        if (categoryDiv) {
            $(categoryDiv).append(
                "<div class='col-sm card shadow--sm'>" +
                    "<img class='card--image' src='" + product.image + "'>" +
                    "<p class='card--text'>" + product.name + "</p>" +
                "</div>"
            );
        }
    });
});


//get back to the top button

// Get the button
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

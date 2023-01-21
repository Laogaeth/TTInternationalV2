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

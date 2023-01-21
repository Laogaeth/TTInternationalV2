$.getJSON("productsData.json", function(data) {
    $.each(data.products, function(index, product) {
        if (product.category === "Food & Treats") {
            $("#food-treats").append(
                "<div class='col-sm card shadow--sm'>" +
                    "<img class='card--image' src='" + product.image + "'>" +
                    "<p class='card--text'>" + product.name + "</p>" +
                "</div>"
            );
        } else if (product.category === "Hygiene products") {
            $("#hygiene-products").append(
                "<div class='col-sm card shadow--sm'>" +
                    "<img class='card--image' src='" + product.image + "'>" +
                    "<p class='card--text'>" + product.name + "</p>" +
                "</div>"
            );
        }
    });
});

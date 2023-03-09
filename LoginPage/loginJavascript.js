//script for the side menu animation
// its not that pretty, arguably anything in the world can be programmed with Elses and isFinite, I got to thrive to go beyond this.

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



$.ajax({
  url: ".././fetch_stock.php",
  method: "GET",
  success: function(data) {
    let products = JSON.parse(data);
    products.forEach(function(product) {
      $("#stock-table").append("<tr>" + 
          "<input type='hidden' name='id' value='"+ product.id +" '>" + 
          "<input class='product--category' type='hidden' name='product_id' value='"+ product.product_id +" '>" + 
          "<td ><input class='product--name'  name='product_name' type='text' value='" + product.product_name + "'" + "</td>" + 
          "<td><input name='quantity' type='number' value='" + product.quantity + "'" + "</td>" + 
          "<td><input name='price' type='text' value='" + product.price + "'" +  "</td>" + 
          "<td>" + "<input type='submit' name='update--btn' value='update' class='update--button'>" + "</td>" + 
      "</tr>" 
      );
    });

  }
});


//search bar
$("#searchTerm").on("keyup", function () {
  let searchTerm = $(this).val().toLowerCase();
  $("#stock-table input")
    .filter(".product--name")
    .each(function () {
      let productName = $(this).val().toLowerCase();
      let productCategory = $(this)
        .closest("tr")
        .find(".product--category")
        .val()
        .toLowerCase();
      let hideRow = true;
      if (productName.indexOf(searchTerm) !== -1) {
        hideRow = false;
      }
      if (productCategory.indexOf(searchTerm) !== -1) {
        hideRow = false;
      }
      if (hideRow) {
        $(this).closest("tr").fadeOut(500);
      } else {
        $(this).closest("tr").fadeIn(500);
      }
    });
});

// Add the click event listener to a parent element using event delegation
$("#stock-table").on("click", ".update--button", function (e) {
  e.preventDefault();
  let row = $(this).closest("tr");
  let id = row.find("input[name='id']").val();
  let product_name = row.find("input[name='product_name']").val();
  let product_id = row.find("input[name='product_id']").val();
  let quantity = row.find("input[name='quantity']").val();
  let price = row.find("input[name='price']").val();

  $.ajax({
    url: "./update_stock.php",
    method: "POST",
    data: {
      id: id,
      product_id: product_id,
      product_name: product_name,
      quantity: quantity,
      price: price,
    },
    success: function (data) {
      console.log(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error(jqXHR,textStatus, errorThrown);
    },
  });
});


////////////////////////add Products to the database////////////////////////


$(document).ready(function () {
  $("#category").change(function () {
    $("#selected_category").val($(this).val());
  });

  $("#form--add--products").submit(function (e) {
    e.preventDefault();
    let product_name = $("#product_name").val();
    let price = $("#price").val();
    let stock = $("#stock").val();
    let image_path = $("#image_path").val();
    let category = $("#selected_category").val();
    $.ajax({
      type: "POST",
      url: "addProducts.php",
      data: {
        product_name: product_name,
        price: price,
        stock: stock,
        image_path: image_path,
        category: category,
      },
      success: function (data) {
        console.log("Product added successfully");
      },
    });
  });
});

/////////////////////////orders search bar/////////////////////////


$(document).ready(function () {
  $("#search--orders").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    //in here its ignoring table--cart thead tr, this way they'll remain visible.
    $(".table--cart tbody tr")
      .not(":first")
      .filter(function () {
        $(this).toggle(
          $(this).find("td:first-child").text().toLowerCase().indexOf(value) >
            -1
        );
      });
  });
});

/////////////////////////clients info search bar/////////////////////////
// $(document).ready(function () {
//   $("#search--clients").on("keyup", function () {
//     var value = $(this).val().toLowerCase();
//     $(".table--all--users tbody tr").filter(function () {
//       var matches = false;
//       $(this)
//         .find("td")
//         .each(function () {
//           var cellText = $(this).text().toLowerCase();
//           if (
//             cellText.indexOf(value) > -1 &&
//             ($(this).hasClass("id") ||
//               $(this).hasClass("client") ||
//               $(this).hasClass("email") ||
//               $(this).hasClass("address"))
//           ) {
//             matches = true;
//             return false;
//           }
//         });
//       $(this).toggle(matches);
//     });
//   });
// });

// Select all the buttons with the class "btn-details"
const buttons = document.querySelectorAll('.btn-details');

// Loop through each button and add a click event listener to it
buttons.forEach(button => {
  button.addEventListener('click', () => {
    // Get the parent row of the button (which has the "order-row" class)
    const orderRow = button.closest('.order-row');

    // Get the next row (which has the "details-row" class)
    const detailsRow = orderRow.nextElementSibling;

    // Get the order ID from the data-order-id attribute of the details row
    const orderId = detailsRow.getAttribute('data-order-id');

    // Get the table element inside the details row
    const detailsTable = detailsRow.querySelector('.details-table');

    // Send a GET request to the PHP script to retrieve the order details
    fetch(`./get_orders_details.php?order_id=${orderId}`)
      .then(response => response.json())
      .then(data => {
        // Clear the existing rows in the details table
        detailsTable.innerHTML = '';

        // Loop through the order details and add a row for each one
        data.order_details.forEach(orderDetail => {
          const productName = orderDetail.product_name;
          const quantity = orderDetail.quantity;

          const row = document.createElement('tr');
          row.innerHTML = `<td class='order-extra-details'><h5>Product: </h5> ${productName}</td><td class='order-extra-details'>${quantity} x</td>`;
          detailsTable.appendChild(row);
        });

        // Toggle the "hidden" class of the details row to show it
        detailsRow.classList.toggle('hidden');
      })
      .catch(error => {
        console.error('Error retrieving order details:', error);
      });
  });
});

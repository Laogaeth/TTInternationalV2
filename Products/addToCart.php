<?php
session_start();

// Connect to the database
$conn = mysqli_connect("localhost:3307", "root", "", "db_login");

// Get the product information from the POST request
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$user_id = $_SESSION['user_id'];
$quantity = $_POST['quantity'];

// Check if the product is already in the cart
// Check if the product is already in the cart
$check_query = "SELECT * FROM cart WHERE product_name = '$product_name' AND user_id = '$user_id'";
$check_result = mysqli_query($conn, $check_query);

// If the product is in the cart, update its quantity
if (mysqli_num_rows($check_result) > 0) {
  $update_query = "UPDATE cart SET quantity = quantity + $quantity WHERE product_name = '$product_name' AND user_id = '$user_id'";
  $update_result = mysqli_query($conn, $update_query);

  if ($update_result) {
    header("Location: ../ShoppingCart/cartPage.php?user_id=$user_id");
  } else {
    echo "Error updating product quantity. Error: " . mysqli_error($conn);
  }


// If the product is not in the cart, insert it
} else {
  $insert_query = "INSERT INTO cart (product_id, product_name, user_id, quantity) VALUES ('$product_id', '$product_name', '$user_id', '$quantity')";
  $insert_result = mysqli_query($conn, $insert_query);

  if ($insert_result) {
    header("Location: ../ShoppingCart/cartPage.php?user_id=$user_id");
  } else {
    echo "Error adding product to cart. Error: " . mysqli_error($conn);
  }
}
?>
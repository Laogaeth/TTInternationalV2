<?php
session_start();

//connect to the database
$conn = mysqli_connect("localhost:3307", "root", "", "db_login");

//get the product_id and user_id from the POST request
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

//Check if the product is already in the cart
$check_product_query = "SELECT * FROM cart WHERE product_id='$product_id' AND user_id='$user_id'";
$check_product_result = mysqli_query($conn, $check_product_query);

if (mysqli_num_rows($check_product_result) > 0) {
  //The product is already in the cart, update the quantity
  $update_quantity_query = "UPDATE cart SET quantity=quantity+'$quantity' WHERE product_id='$product_id' AND user_id='$user_id'";
  $update_quantity_result = mysqli_query($conn, $update_quantity_query);

  if ($update_quantity_result) {
    header("Location: ./cartPage.php?user_id=$user_id");
  } else {
    echo "Error updating the quantity. Error: " . mysqli_error($conn);
  }
} else {
  //The product is not in the cart, insert a new row
  $insert_product_query = "INSERT INTO cart (product_id, user_id, quantity, total_price) VALUES ('$product_id', '$user_id', '$quantity', '$price')";
  $insert_product_result = mysqli_query($conn, $insert_product_name);
  if ($insert_product_result) {
header("Location: ./cartPage.php?user_id=$user_id");
} else {
echo "Error adding product to cart. Error: " . mysqli_error($conn);
}
}

mysqli_close($conn);
?>

<?php

$conn = mysqli_connect("localhost:3307", "root", "", "db_login");

if (isset($_POST['update'])) {

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);

  // update product name and price in hygiene, food, toys, clothes table
  $update_hygiene_query = "UPDATE hygiene SET product_name='$product_name', price='$price' WHERE id='$id'";
  $update_food_query = "UPDATE food SET product_name='$product_name', price='$price' WHERE id='$id'";
  $update_toys_query = "UPDATE toys SET product_name='$product_name', price='$price' WHERE id='$id'";
  $update_clothes_query = "UPDATE clothes SET product_name='$product_name', price='$price' WHERE id='$id'";

  if (
    !mysqli_query($conn, $update_hygiene_query) ||
    !mysqli_query($conn, $update_food_query) ||
    !mysqli_query($conn, $update_toys_query) ||
    !mysqli_query($conn, $update_clothes_query)
  ) {
    echo "Error updating record: " . mysqli_error($conn);
  } else {
    header("Location: ./stockManagement.php");
  }
}

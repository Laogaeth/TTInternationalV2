<?php

$conn = mysqli_connect("localhost:3307", "root", "", "db_login");

if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];

  // update product in stock table
  $update_stock_query = "UPDATE stock SET quantity='$quantity' WHERE id='$id'";
  mysqli_query($conn, $update_stock_query);

  // update product name and price in hygiene, food, toys, clothes table
$update_hygiene_query = "UPDATE hygiene SET product_name='$product_name', price='$price' WHERE id='$id'";
$update_food_query = "UPDATE food SET product_name='$product_name', price='$price' WHERE       id='$id'";
$update_toys_query = "UPDATE toys SET product_name='$product_name', price='$price' WHERE       id='$id'";
$update_clothes_query = "UPDATE clothes SET product_name='$product_name', price='$price' WHERE id='$id'";

  mysqli_query($conn, $update_hygiene_query);
  mysqli_query($conn, $update_food_query);
  mysqli_query($conn, $update_toys_query);
  mysqli_query($conn, $update_clothes_query);

  header("Location: stockManagement.php");
}

?>
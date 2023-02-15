<?php

$conn = mysqli_connect("localhost:3307", "root", "", "db_login");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if (!isset($_POST['update--btn'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);



  // prepare update query statement
  $update_hygiene_query = "UPDATE hygiene SET product_name=?, price=?, stock=? WHERE id=? AND product_id=?";
  $stmt = mysqli_prepare($conn, $update_hygiene_query);
  mysqli_stmt_bind_param($stmt, "sdiis", $product_name, $price, $quantity, $id,$product_id);

  if (!mysqli_stmt_execute($stmt)) {
    echo "Error updating hygiene table: " . mysqli_stmt_error($stmt);
  }


  // prepare update query statement
  $update_food_query = "UPDATE food SET product_name=?, price=?, stock=? WHERE id=? AND product_id=?" ;
  $stmt = mysqli_prepare($conn, $update_food_query);
  mysqli_stmt_bind_param($stmt, "sdiis", $product_name, $price, $quantity, $id, $product_id);

  if (!mysqli_stmt_execute($stmt)) {
    echo "Error updating food table: " . mysqli_stmt_error($stmt);
  }

  // prepare update query statement
  $update_toys_query = "UPDATE toys SET product_name=?, price=?, stock=? WHERE id=? AND product_id=?";
  $stmt = mysqli_prepare($conn, $update_toys_query);
  mysqli_stmt_bind_param($stmt, "sdiis", $product_name, $price, $quantity, $id, $product_id);

  if (!mysqli_stmt_execute($stmt)) {
    echo "Error updating toys table: " . mysqli_stmt_error($stmt);
  }


  // prepare update query statement
  $update_clothes_query = "UPDATE clothes SET product_name=?, price=?, stock=? WHERE id=? AND product_id=?";
  $stmt = mysqli_prepare($conn, $update_clothes_query);
  mysqli_stmt_bind_param($stmt, "sdiis", $product_name, $price, $quantity, $id, $product_id);
  
  if (!mysqli_stmt_execute($stmt)) {
    echo "Error updating clothes table: " . mysqli_stmt_error($stmt);
  }


}


// Close the database connection
$conn->close();
?>
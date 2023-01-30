<?php
  //connect to the database
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  $conn = mysqli_connect("localhost:3307", "root", "", "db_login");

  //get the cart id from the post data
  if(isset($_POST['cart_id'])){
    $cart_id = $_POST['cart_id'];
  }else{
    die("Error: Cart ID is not set in POST data.");
  }

  //remove the item from the cart in the database
  $query = "DELETE FROM cart WHERE id = '$cart_id'";
  $result = mysqli_query($conn, $query);
  
  //check if the query was successful
  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }

  //redisplay the updated cart
  include 'displayCart.php';
?>

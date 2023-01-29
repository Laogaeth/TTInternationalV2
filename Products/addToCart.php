<?php
  //connect to the database
  $conn = mysqli_connect("hostname", "username", "password", "database_name");
  
  //get the product_id and user_id from the POST request
  $product_id = $_POST['product_id'];
  $user_id = $_POST['user_id'];
  $user_id = $_SESSION['user_id'];

  //insert the data into the cart table
  $query = "INSERT INTO cart (product_id, user_id) VALUES ('$product_id', '$user_id')";
  $result = mysqli_query($conn, $query);
  
  //check if the query was successful
  if($result){
    echo "Product added to cart!";
  } else {
    echo "Error adding product to cart. Error: " . mysqli_error($conn);
  }
?>

<?php
session_start();
//connect to the database
  $conn = mysqli_connect("localhost:3307", "root", "", "db_login");
  
  //get the product_id and user_id from the POST request
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $price = $_POST['price'];
  $user_id = $_SESSION['user_id'];
  $quantity = $_POST['quantity'];

  //For some god forsaken reason I cannot write a decent query that doesnt brake it all.
    $query = "INSERT INTO cart (product_id, user_id,quantity) VALUES ('$product_id', '$user_id','$quantity')";  
    $result = mysqli_query($conn, $query);
  
  //check if the query was successful
  if($result){
    header("Location: cartPage.php?user_id=$user_id");
  } else {
    echo "Error adding product to cart. Error: " . mysqli_error($conn);
  }
?>


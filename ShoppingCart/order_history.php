<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

if(isset($_POST['checkout'])){
  // Check if the "user_id" key is defined in the $_POST array
  if(!array_key_exists("user_id", $_POST)) {
    die("Error: 'user_id' key is not defined in the form data.");
  }

  // Check if the "products" key is defined in the $_POST array
  if(!array_key_exists("products", $_POST)) {
    die("Error: 'products' key is not defined in the form data.");
  }

  // Get the user_id and products information from the form data
  $user_id = $_POST['user_id'];
  $products = unserialize($_POST['products']);

  // Calculate the total payment and total quantity
  $total_payment = 0;
  $total_quantity = 0;
  foreach($products as $product){
    $total_payment += ($product['price'] * $product['quantity']);
    $total_quantity += $product['quantity'];
  }

  // Connect to the database
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "db_login";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert data into the order_history table
  $sql = "INSERT INTO order_history (user_id, quantity, payment)
  VALUES ('$user_id', '$total_quantity', '$total_payment')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

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

  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "db_login";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
    // Check stock availability for each product

foreach ($products as $product) {
    $sql = "SELECT stock.quantity, products.name 
        FROM stock 
        JOIN products ON stock.product_id = products.id 
        WHERE stock.id = {$product['id']}";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['quantity'] < $product['quantity']) {
            echo "<script> alert('{$row['name']} stock is insufficient. Only {$row['quantity']} available.');</script>";
            exit();
        }
    } else {
        echo "<script> alert('{$row['name']} stock is not available.');</script>";
        exit();
    }
}

  

  // Insert data into the order_history table
  $sql = "INSERT INTO order_history (user_id, quantity, payment)
  VALUES ('$user_id', '$total_quantity', '$total_payment')";
  
  if (mysqli_query($conn, $sql)) {
    // Subtract the quantity from the "stock" table for each product
    foreach($products as $product){
      $sql = "UPDATE stock SET quantity = quantity - {$product['quantity']} WHERE id = {$product['id']}";
      if (mysqli_query($conn, $sql)) {
        // Success
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    $sql = "DELETE FROM cart WHERE user_id = $user_id";
    if (mysqli_query($conn, $sql)) {
      // Success
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
    header("Location: ./orderSuccess.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

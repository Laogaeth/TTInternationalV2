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
  if (!array_key_exists("category", $_POST)) {
    die("Error: 'products' key is not defined in the form data.");
  }
  $servername = "localhost:3307";
  $username = "root";
  $password = "";
  $dbname = "db_login";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }



  // Get the user_id and products information from the form data
  $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  $products = unserialize($_POST['products']);
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);


  // Calculate the total payment and total quantity
  $total_payment = 0;
  $total_quantity = 0;
  foreach($products as $product){
    $total_payment += ($product['price'] * $product['quantity']);
    $total_quantity += $product['quantity'];
  }



  $sql = "SELECT stock FROM {$category} WHERE id = {$id}";

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0
  ) {
    $row = mysqli_fetch_assoc($result);
    if ($row['stock'] < $product['quantity']) {
      echo "<script> alert('{$product['name']} stock is insufficient. Only {$row['stock']} available.');window.location.href = 'cartPage.php';</script>";
      
      exit();
    }
  } else {
    echo "<script> alert('{$product['name']} is not available.');window.location.href = 'cartPage.php';</script>";
    exit();
  }


  // Insert data into the order_history table
  $sql = "INSERT INTO order_history (user_id, quantity, payment)
  VALUES ('$user_id', '$total_quantity', '$total_payment')";

  if (mysqli_query($conn, $sql)) {
    $order_id = mysqli_insert_id($conn);

    foreach ($products as $product) {
      $sql = "UPDATE {$category} SET stock = stock - {$product['quantity']} WHERE id = {$id}";
      if (mysqli_query($conn, $sql)) {
        // Insert data into the order_details table with the order_id, product_id, and quantity information
        foreach ($products as $product) {
          $product_id = $product['name'];
          $product_name = $product['name'];
          $quantity=$product['quantity'];
          $sql = "INSERT INTO orders_details (order_id, product_name,quantity) VALUES ('$order_id', '$product_name','$quantity')";
          if (mysqli_query($conn, $sql)) {
            // Success
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
        // Clear the cart by removing all products from the cart table for this user
        $sql = "DELETE FROM cart WHERE user_id = {$user_id}";
        if (mysqli_query($conn, $sql)) {
          // Success
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    header("Location: ./orderSuccess.php");
    exit();
      }
    }
  }
}
?>


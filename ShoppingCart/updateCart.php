<?php
  $servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "db_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $cart_id => $quantity) {
        $query = "UPDATE cart SET quantity = '$quantity' WHERE id = '$cart_id'";
        mysqli_query($conn, $query);
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

  
?>

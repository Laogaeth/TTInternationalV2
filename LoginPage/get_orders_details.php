<?php
// Set up database connection
$db_host = 'localhost:3307';
$db_user = 'root';
$db_password = '';
$db_name = 'db_login';

$db = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check for errors in database connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Retrieve order details for the provided order_id
$order_id = $_GET['order_id'];
$order_details_query = "SELECT product_name, quantity FROM orders_details WHERE order_id = '$order_id'";
$order_details_result = mysqli_query($db, $order_details_query);

// Build response object
$response = array();

if (!$order_details_result) {
  // If query fails, return error message
  $response['status'] = 'error';
  $response['message'] = 'Failed to retrieve order details from database';
} else {
  // If query succeeds, build array of order details and return it
  $order_details = array();
  while ($row = mysqli_fetch_assoc($order_details_result)) {
    $order_details[] = $row;
  }
  $response['status'] = 'success';
  $response['order_details'] = $order_details;
}

// Convert response object to JSON and send it to client
header('Content-Type: application/json');
echo json_encode($response);

// Close database connection
mysqli_close($db);
?>
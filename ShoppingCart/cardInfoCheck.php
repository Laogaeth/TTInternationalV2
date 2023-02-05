<?php 


$hasCreditCard = false;

// Check if user has a credit card stored in the database
if (isset($_SESSION['user_id'])) {
  // Connect to the database
  $db = mysqli_connect('localhost:3307', 'root', '', 'db_login');


$user_id = $_SESSION["user_id"];
$query = "SELECT user_id FROM credit_card WHERE user_id = $user_id AND card_number IS NOT NULL";
$result = mysqli_query($db, $query);

  mysqli_close($db);
}

?>

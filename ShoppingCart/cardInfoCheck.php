<?php


// Connect to the database
$db = mysqli_connect('localhost:3307', 'root', '', 'db_login');

$hasCreditCard = true;

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION["user_id"];
  $query = "SELECT user_id FROM credit_card WHERE user_id = $user_id AND card_number IS NOT NULL";
  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) > 0) {
    $hasCreditCard = false;
  }

  mysqli_close($db);
}

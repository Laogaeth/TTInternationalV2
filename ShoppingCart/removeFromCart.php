<?php
session_start();
  //connect to the database
  error_reporting(E_ALL);
  ini_set('display_errors', 1);


  $conn = mysqli_connect("localhost:3307", "root", "", "db_login");
  $user_id = '';


//get the user's ID from the session or query string
if (isset($_GET['user_id'])) {
$user_id = intval($_GET['user_id']);
} else if (isset($_SESSION['user_id'])) {
$user_id = intval($_SESSION['user_id']);
}

if (isset($user_id)) {
$query = "DELETE FROM cart WHERE user_id = ?";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

//check if the query was successful
if (!$result) {
die("Query failed: " . mysqli_error($conn));
}
} else {
echo "User ID:";
echo "Query failed:";

}

?>

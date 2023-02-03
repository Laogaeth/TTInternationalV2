<?php
//connect to the database
$conn = mysqli_connect("localhost:3307", "root", "", "db_login");

//get the user_id from the POST request
$user_id = intval($_POST['user_id']);

//prepare the SQL query
$query = "DELETE FROM cart WHERE user_id = ?";

//prepare the statement
$stmt = mysqli_prepare($conn, $query);

//bind the parameters to the statement
mysqli_stmt_bind_param($stmt, "i", $user_id);

//execute the statement
mysqli_stmt_execute($stmt);

//close the connection
mysqli_close($conn);

?>


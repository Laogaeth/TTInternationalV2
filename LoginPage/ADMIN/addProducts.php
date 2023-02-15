<?php
$conn = mysqli_connect("localhost:3307", "root", "", "db_login");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$productName = mysqli_real_escape_string($conn, $_POST['product_name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$stock = mysqli_real_escape_string($conn, $_POST['stock']);
$imagePath = mysqli_real_escape_string($conn, $_POST['image_path']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$table = '';

switch ($category) {
  case 1:
    $table = 'hygiene';
    break;
  case 2:
    $table = 'food';
    break;
  case 3:
    $table = 'toys';
    break;
  case 4:
    $table = 'clothes';
    break;
}

$sql = "INSERT INTO $table (product_name, price, stock, image_path)
VALUES ('$productName', '$price', '$stock', '$imagePath')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
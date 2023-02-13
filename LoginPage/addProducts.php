<?php
$conn = mysqli_connect("localhost:3307", "root", "", "db_login");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$productName = $_POST['product_name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$imagePath = $_POST['image_path'];
$category = $_POST['category'];

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
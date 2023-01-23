<?php
$conn = new mysqli ("localhost:3307", "root", "", "db_login");

//this query will retrieve prices data from db
$query = "SELECT product_name, price FROM hygiene UNION SELECT product_name, price 
FROM toys UNION SELECT product_name, price FROM food UNION SELECT product_name, price FROM clothes";
$result = $conn -> query($query);

$prices = array();
 while($row = $result->fetch_assoc()){
     $prices[$row['product_name']] = $row['price'];
 }

 echo json_encode($prices);

?>
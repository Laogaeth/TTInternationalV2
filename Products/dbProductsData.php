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

$json = array();

if(isset($category)){
    switch ($category) {
   case "Hygiene":
    $sql = "SELECT hygiene.product_id, hygiene.product_name, hygiene.price, hygiene.image_path
            FROM hygiene
            WHERE products.category = 'Hygiene'";
    break;
case "Food":
    $sql = "SELECT food.product_id, food.product_name, food.price, food.image_path
            FROM food
            WHERE products.category = 'Food'";
    break;
case "Toys":
    $sql = "SELECT toys.product_id, toys.product_name, toys.price, toys.image_path
            FROM toys
            WHERE products.category = 'Toys'";
    break;
case "Clothes":
    $sql = "SELECT clothes.product_id, clothes.product_name, clothes.price, clothes.image_path
            FROM clothes
            WHERE products.category = 'Clothes'";
    break;

}

}else{
    $sql = "SELECT products.*, hygiene.product_id, hygiene.product_name, hygiene.price, hygiene.image_path FROM products 
LEFT JOIN hygiene ON products.id = hygiene.product_id
WHERE products.category = 'Hygiene'
UNION
SELECT products.*, food.product_id, food.product_name, food.price, food.image_path FROM products 
LEFT JOIN food ON products.id = food.product_id
WHERE products.category = 'Food'
UNION
SELECT products.*, toys.product_id, toys.product_name, toys.price, toys.image_path FROM products 
LEFT JOIN toys ON products.id = toys.product_id
WHERE products.category = 'Toys'
UNION
SELECT products.*, clothes.product_id, clothes.product_name, clothes.price, clothes.image_path FROM products 
LEFT JOIN clothes ON products.id = clothes.product_id
WHERE products.category = 'Clothes'";

}


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $json[] = $row;
    }
} 

$conn->close();

echo json_encode($json);
?>

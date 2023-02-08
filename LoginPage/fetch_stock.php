<?php

// Connect to the database
$conn = mysqli_connect('localhost:3307', 'root', '', 'db_login');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from different tables
$hygiene_data = mysqli_query($conn, "SELECT product_name, price, product_id FROM hygiene");
$toys_data = mysqli_query($conn, "SELECT product_name, price, product_id FROM toys");
$clothes_data = mysqli_query($conn, "SELECT product_name, price, product_id FROM clothes");
$food_data = mysqli_query($conn, "SELECT product_name, price, product_id FROM food");
$quantity_data = mysqli_query($conn, "SELECT item_id, quantity FROM stock");

// Combine all data into a single array
$all_data = array();
$hygiene_data_array = array();
$toys_data_array = array();
$clothes_data_array = array();
$food_data_array = array();

while ($row = mysqli_fetch_array($hygiene_data)) {
    $hygiene_data_array[] = array(
        'product_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'price' => $row['price'],
    );
}

while ($row = mysqli_fetch_array($toys_data)) {
    $toys_data_array[] = array(
        'product_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'price' => $row['price'],
    );
}

while ($row = mysqli_fetch_array($clothes_data)) {
    $clothes_data_array[] = array(
        'product_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'price' => $row['price'],
    );
}

while ($row = mysqli_fetch_array($food_data)) {
    $food_data_array[] = array(
        'product_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'price' => $row['price'],
    );
}

$all_data = array_merge($hygiene_data_array, $toys_data_array, $clothes_data_array, $food_data_array);

$quantity_data_array = array();
while ($row = mysqli_fetch_array($quantity_data)) {
$quantity_data_array[$row['item_id']] = $row['quantity'];
}

// Add quantity information to all_data array
foreach ($all_data as &$data) {
$product_id = $data['product_id'];
if (isset($quantity_data_array[$product_id])) {
$data['quantity'] = $quantity_data_array[$product_id];
} else {
$data['quantity'] = 0;
}
}

// Close the connection
mysqli_close($conn);

// Return the combined data array

echo json_encode(array_values($all_data));

?>
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

while ($row = mysqli_fetch_array($hygiene_data)) {
    $all_data[$row['product_id']] = array(
        'product_name' => $row['product_name'],
        'price' => $row['price'],
    );
}

while ($row = mysqli_fetch_array($toys_data)) {
    $all_data[$row['product_id']] = array(
        'product_name' => $row['product_name'],
        'price' => $row['price'],
    );
}

while ($row = mysqli_fetch_array($clothes_data)) {
    $all_data[$row['product_id']] = array(
        'product_name' => $row['product_name'],
        'price' => $row['price'],
    );
}

while ($row = mysqli_fetch_array($food_data)) {
    $all_data[$row['product_id']] = array(
        'product_name' => $row['product_name'],
        'price' => $row['price'],
    );
}

while ($row = mysqli_fetch_array($quantity_data)) {
    if (isset($all_data[$row['item_id']])) {
        $all_data[$row['item_id']]['quantity'] = $row['quantity'];
    }
}
echo json_encode(array_values($all_data));



// Close the database connection
mysqli_close($conn);

?>
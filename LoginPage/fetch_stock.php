<?php

// Connect to the database
$conn = mysqli_connect('localhost:3307', 'root', '', 'db_login');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from different tables
$hygiene_data = mysqli_query($conn, "SELECT product_name, price, product_id FROM hygiene");
$toys_data = mysqli_query($conn, "SELECT product_name, price,    product_id FROM toys");
$clothes_data = mysqli_query($conn, "SELECT product_name, price, product_id FROM clothes");
$food_data = mysqli_query($conn, "SELECT product_name, price,    product_id FROM food");
$stock_data = mysqli_query($conn, "SELECT item_table, hygiene_item_id, food_item_id, toys_item_id, clothes_item_id, quantity FROM stock");

// Combine all data into a single array
$all_data = array();
$hygiene_data_array = array();
$toys_data_array = array();
$clothes_data_array = array();
$food_data_array = array();

while ($row = mysqli_fetch_array($hygiene_data)) {
    $hygiene_data_array[] = array(
        'item_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'price' => $row['price'],
        'item_table' => 'hygiene',
    );
}

while ($row = mysqli_fetch_array($toys_data)) {
    $toys_data_array[] = array(
        'item_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'price' => $row['price'],
        'item_table' => 'toys',
    );
}

while ($row = mysqli_fetch_array($clothes_data)) {
    $clothes_data_array[] = array(
        'item_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'price' => $row['price'],
        'item_table' => 'clothes',
    );
}

while ($row = mysqli_fetch_array($food_data)) {
    $food_data_array[] = array(
        'item_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'price' => $row['price'],
        'item_table' => 'food',
    );
}

$all_data = array_merge($hygiene_data_array, $toys_data_array, $clothes_data_array, $food_data_array);

$stock_data_array = array();
while ($row = mysqli_fetch_array($stock_data)) {
    $item_id = $row['item_table'];
    $quantity = $row['quantity'];
    $stock_data_array[$item_id] = $quantity;
}
foreach ($all_data as &$data) {
$item_id = $data['item_table'];
$table_name = '';
switch($item_id) {
case in_array($item_id, array_column($hygiene_data_array, 'item_id')):
$table_name = 'hygiene';
break;
case in_array($item_id, array_column($toys_data_array, 'item_id')):
$table_name = 'toys';
break;
case in_array($item_id, array_column($clothes_data_array, 'item_id')):
$table_name = 'clothes';
break;
case in_array($item_id, array_column($food_data_array, 'item_id')):
$table_name = 'food';
break;
default:
$table_name = '';
break;
}
if (!empty($table_name)) {
$quantity_value = $quantity_data_array[$table_name][$item_id] ??= 0;
$data['quantity'] = $quantity_value;
}
}

// Close database connection
mysqli_close($conn);
echo json_encode(array_values($all_data));
// Return all_data array
return $all_data;
?>
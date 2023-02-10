<?php

// Connect to the database
$conn = mysqli_connect('localhost:3307', 'root', '', 'db_login');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch data from a table
function fetchData($conn, $table) {
    // Query the table
    $data = mysqli_query($conn, "SELECT id, product_name, product_id, price, stock FROM $table");

    // Fetch the data into an array
    $data_array = array();
    while ($row = mysqli_fetch_array($data)) {
        $data_array[] = array(
            'id' => $row['id'],
            'product_name' => $row['product_name'],
            'product_id' => $row['product_id'],
            'price' => $row['price'],
            'quantity' => $row['stock'],
        );
    }

    return $data_array;
}

// Fetch data from each table and store in separate arrays
$hygiene_data_array = fetchData($conn, 'hygiene');
$toys_data_array = fetchData($conn, 'toys');
$clothes_data_array = fetchData($conn, 'clothes');
$food_data_array = fetchData($conn, 'food');

// Combine all the arrays into one array
$all_data = array_merge($hygiene_data_array, $toys_data_array, $clothes_data_array, $food_data_array);

// Output the data as JSON
echo json_encode(array_values($all_data));

// Close the database connection
mysqli_close($conn);

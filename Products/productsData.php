<?php
    $products = array(
        array("name" => "Product 1", "stock" => 10),
        array("name" => "Product 2", "stock" => 5),
        array("name" => "Product 3", "stock" => 15)
    );

    $prices_url = "prices.php"; // URL of the prices script
    $prices_data = file_get_contents($prices_url); // Get the prices data
    $prices = json_decode($prices_data, true); // Decode the JSON data

    // Loop through the products and display the name and stock
    foreach ($products as $product) {
        echo $product['name'] . " - Stock: " . $product['stock'] . "<br>";
        echo "Price :" . $prices[$product['name']] . "<br>";
    }
?>


<?php
//connect to the database
$db = mysqli_connect("localhost:3307", "root", "", "db_login");

//retrieve data from the 'products' table
$query = "SELECT products.category, products.id, food.product_name, toys.product_name, hygiene.product_name, clothes.product_name, stock.quantity FROM products
LEFT JOIN food ON products.id = food.product_id
LEFT JOIN toys ON products.id = toys.product_id
LEFT JOIN hygiene ON products.id = hygiene.product_id
LEFT JOIN clothes ON products.id = clothes.product_id
LEFT JOIN stock ON products.id = stock.item_id AND stock.item_table = 'food' OR products.id = stock.item_id AND stock.item_table = 'toys' OR products.id = stock.item_id AND stock.item_table = 'hygiene' OR products.id = stock.item_id AND stock.item_table = 'clothes'";
$result = mysqli_query($db, $query);

//create an array to store the product data
$products = array();

//loop through the result set and add each product to the array
while($row = mysqli_fetch_assoc($result)) {
    $product_name = "";
    if($row["item_table"] == "food"){
        $product_name = $row["food.product_name"];
    }elseif($row["item_table"] == "toys"){
        $product_name = $row["toys.product_name"];
    }elseif($row["item_table"] == "hygiene"){
        $product_name = $row["hygiene.product_name"];
    }elseif($row["item_table"] == "clothes"){
        $product_name = $row["clothes.product_name"];
    }
    $products[] = array("id" => $row["id"], "category" => $row["category"], "name" => $product_name, "stock" => $row["quantity"]);
}

//encode the array as a json string
$json = json_encode($products);

//print the json string
echo $json;


?>

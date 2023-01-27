<?php
//connect to the database
$db = mysqli_connect("localhost:3307", "root", "", "db_login");

//retrieve data from the 'products' table
$query = "SELECT products.category, products.id, food.product_name as product_name, food.price as price, 
toys.product_name as toys_product_name, toys.price as toys_price, 
hygiene.product_name as product_name, hygiene.price as price, 
clothes.product_name as product_name, clothes.price as price, 
stock.quantity FROM products
LEFT JOIN food ON products.id = food.product_id
LEFT JOIN toys ON products.id = toys.product_id
LEFT JOIN hygiene ON products.id = hygiene.product_id
LEFT JOIN clothes ON products.id = clothes.product_id
LEFT JOIN stock ON products.id = stock.item_id";

$result = mysqli_query($db, $query);

//create an array to store the product data
$products = array();

//loop through the result set and add each product to the array
while($row = mysqli_fetch_assoc($result)) {
    $product_name = "";
    $product_price = "";
    if($row["category"] == "food"){
        $product_name = $row["product_name"];
        $product_price = $row["price"];
    }elseif($row["category"] == "toys"){
        $product_name = $row["product_name"];
        $product_price = $row["price"];
    }elseif($row["category"] == "hygiene"){
        $product_name = $row["product_name"];
        $product_price = $row["price"];
    }elseif($row["category"] == "clothes"){
        $product_name = $row["product_name"];
        $product_price = $row["price"];
    }
    $products[] = array("id" => $row["id"], "category" => $row["category"], "name" => $product_name, "price" => $product_price, "stock" => $row["quantity"]);
}

//encode the array as a json string
$json = json_encode($products);

//print the json string
echo $json;



?>

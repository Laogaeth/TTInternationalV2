<?php
session_start();

//connect to the database
$conn = mysqli_connect("localhost:3307", "root", "", "db_login");

//check if the form has been submitted
if(isset($_POST['submit'])){
  //get the user's ID from the session
  $user_id = $_SESSION['user_id'];

  //loop through each item in the cart
  foreach ($_POST['quantity'] as $cart_id => $quantity) {

    //get the product_id, product_name and price of the item in the cart
    $query = "SELECT cart.id as cart_id, products.id,
    CASE
    WHEN products.category = 'food' THEN food.product_name
    WHEN products.category = 'toys' THEN toys.product_name
    WHEN products.category = 'clothes' THEN clothes.product_name
    WHEN products.category = 'hygiene' THEN hygiene.product_name
    END AS product_name,
    CASE
    WHEN products.category = 'food' THEN food.price
    WHEN products.category = 'toys' THEN toys.price
    WHEN products.category = 'clothes' THEN clothes.price
    WHEN products.category = 'hygiene' THEN hygiene.price
    END AS price
    FROM cart
    INNER JOIN products
    ON cart.product_id = products.id
    LEFT JOIN food ON products.id = food.id
    LEFT JOIN toys ON products.id = toys.id
    LEFT JOIN clothes ON products.id = clothes.id
    LEFT JOIN hygiene ON products.id = hygiene.id
    WHERE cart.id = '$cart_id'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    //calculate the total price of the item
    $price = $row['price'] * $quantity;

    //insert the data into the "order_history" table
    $query = "INSERT INTO order_history (user_id, product_id, product_name, quantity, price) 
    VALUES ('$user_id', '".$row['id']."', '".$row['product_name']."', '$quantity', '$price')";

    $result = mysqli_query($conn, $query);

    //check if the query was successful
    if (!$result) {
      die("Error inserting data into the order_history table: " . mysqli_error($conn));
    }

    //update the stock table
    $query = "UPDATE stock SET quantity = quantity - '$quantity' WHERE product_id = '".$row['id']."'";
    $result = mysqli_query($conn, $query);

    //check if the query was successful
if (!$result) {
die("Error updating the stock table: " . mysqli_error($conn));
}
}
// redirect to the order success page
header("Location: ./orderSuccess.php");
} else {
// show error message if the form has not been submitted
echo "Error: form has not been submitted";
}

// close the database connection
mysqli_close($conn);

?>
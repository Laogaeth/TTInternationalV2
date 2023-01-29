<?php
    // Connect to the database
    $conn = mysqli_connect("localhost:3307", "root", "", "db_login");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the user_id from the post data
    $user_id = $_POST['user_id'];

    // Retrieve the cart items for the given user_id from the cart table
    $query = "SELECT product_id, product_name, price FROM cart JOIN products ON cart.product_id = products.id WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);

    // Create an array to store the cart items
    $cart_items = array();

    // Loop through the result set and add each item to the cart_items array
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_items[] = $row;
    }

    // Close the connection
    mysqli_close($conn);

    // Return the cart items as a JSON object
    echo json_encode($cart_items);
?>

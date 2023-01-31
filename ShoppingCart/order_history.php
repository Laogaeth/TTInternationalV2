<?php
if(isset($_POST['submit_order'])){
  $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  $total_price = mysqli_real_escape_string($conn, $_POST['total_price']);
  
  $query = "INSERT INTO order_history (user_id, product_name, quantity, payment) VALUES";
  while ($row = mysqli_fetch_assoc($result)) {
    $product_name = mysqli_real_escape_string($conn, $row['product_name']);
    $quantity = mysqli_real_escape_string($conn, $row['quantity']);
    $query .= "('$user_id', '$product_name', '$quantity', '$total_price'),";
  }
  $query = rtrim($query, ',');
  
  $result = mysqli_query($conn, $query);
  
  if($result){
    echo "Order submitted successfully!";
  }else{
    echo "Order submission failed. Error: ".mysqli_error($conn);
  }
}
?>
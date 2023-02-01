<?php
session_start();
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}else{
    $user_id = $_SESSION['user_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Pet care">
  <meta name="author" content="Pedro Pereira">
  <link rel="icon" type="image/x-icon" href="../Images/brain.png">

  <title>Whiskers & Bandits</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" href="../ShoppingCart/cartCss.css" >
  <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
  <script src="./cart.js"></script>


  <script>

</script>


 
</head>

 <body>
 
 <div class="wrapper row">
  
 <div class="col navbar">
      <button  class=" btn col btn__menu__arrow sticky"><img src="../icons/right-arrow.png" alt="arrow" class="nav--arrow"></button>

    <div class="menu__nav">


      <?php if (isset($_SESSION["user_name"])):?>
        <div class="nav--user--area">
      <img src="../Images/welcomeCat.png" alt="" class="navbar--cat">
     <p class="navbar--cat--text"> Welcome <?php echo $_SESSION["user_name"];?> </p>
        </div>
     
      <?php endif; ?>
      
      <a class="menu--icon" href="../MainPage/MainPage.php">               <i class="fas fa-2x fa-home"></i>              <p class="menu--nav--text">Home           </p></a>
    <?php if (isset($_SESSION["user_name"])):?>
      <a class="menu--icon" href="../LoginPage/session.php">     <i class="fa-solid fa-2x fa-user"></i>         <p class="menu--nav--text">User           </p></a>
  <?php else: ?>
     <a class="menu--icon" href="../LoginPage/LoginPage.php">    <i class="fa-solid fa-2x fa-user"></i>         <p class="menu--nav--text">User           </p></a>
  <?php endif; ?>
      <a class="menu--icon" href="../Products/productsPage.php"> <i class="fa-brands fa-2x fa-shopify"></i>     <p class="menu--nav--text">Products       </p></a>    
      <a class="menu--icon" href="../ContactsPage/Contacts.php"><i class="fa-solid fa-2x fa-address-book"></i> <p class="menu--nav--text">Contacts       </p></a>
      <a class="menu--icon" href="./cartPage.php"> <i class="fa-solid fa-2x fa-cart-shopping"></i><p class="menu--nav--text">Shopping Cart  </p></a>
      
      <?php if (isset($_SESSION["user_name"])):?>
       <a class="menu--icon menu--icon--logout" href="../loginPage/logout.php"> <i class="fa-solid fa-2x fa-sign-out-alt"></i><p class="menu--nav--text">Logout</p></a>
    <?php endif; ?>
      </div>
  </div>


 <main class="col-11 main--glass--effect section--color" >

    <h1 class="text-center checkout--text">Checkout</h1>
      

              <div class="col-12">
          <h2 class="text-center mb-4">Shopping Cart</h2>
              </div>
    

    <?php

      $conn = mysqli_connect("localhost:3307", "root", "", "db_login");

      //get the user's ID from the session or query string
      if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
      }else{
        if(isset($_SESSION['user_id'])){
          $user_id = $_SESSION['user_id'];
        }
      }

     //retrieve the items in the cart associated with that user
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
      END AS price,
      cart.quantity
      FROM cart
      INNER JOIN products
      ON cart.product_id = products.id
      LEFT JOIN food ON products.id = food.id
      LEFT JOIN toys ON products.id = toys.id
      LEFT JOIN clothes ON products.id = clothes.id
      LEFT JOIN hygiene ON products.id = hygiene.id
      WHERE cart.user_id = '$user_id'";


    $result = mysqli_query($conn, $query);
    
    //check if the query was successful
    if (!$result) {
      die("Query failed: " . mysqli_error($conn));
    }

    //check if there are any items in the cart
    if(mysqli_num_rows($result) > 0){
      //display the items in a table
    echo "<form action='updateCart.php' method='post'>";
    echo "<table class='table--cart'>";
    echo "<tr>";
    echo "<th class='th--left'>Product Name</th>";
    echo "<th >Price</th>";
    echo "<th class='th--right'>Quantity</th>";
    echo "</tr>";
    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['product_name']."</td>";
    echo "<td>".$row['price'].' '."€"."</td>";
    echo "<td><input type='number' class='form-control input--field--number' name='quantity[".$row['cart_id']."]' value='".$row['quantity']."' min='1' max='20'>
    <button class='cart--remove--button' data-cart-id='".$row['cart_id']."'><i class='fa-solid fa-x'></i></button></td>";
    echo "</tr>";
    $total += $row['price'] * $row['quantity'];
    $products[] = array(
      'id' => $row['id'],
      'quantity' => $row['quantity'],
      'price' => $row['price']
    );

  }
    echo "<tr>";
    echo "<td><b class='cart--total'>Your Total:</b></td>";
    echo "<td><b>".$total.' '."€"."</b></td>";
    echo "<td><button type='submit' name='update_cart' class='btn update--cart'>Update</button></td>";
    echo "</tr>";
    echo "</table>";
    echo "<div class='container--cart'>";
    echo "</div>";
    echo "</form>";

    }else{
      echo "<div class='cart--empty'>";
      echo "<h2>No items found in cart.</h2>";
      echo "</div>";
    }

    //Stores data in order history table @ db
     echo "<form action='order_history.php' method='POST'>";
echo "<input type='hidden' name='user_id' value='".$user_id."'>";
echo "<input type='hidden' name='products' value='".serialize($products)."'>";
echo "<button type='submit' name='checkout' class='btn checkout--button'>Proceed to checkout</button>";
echo "</form>";


    ?>



      <div class="container">
        <?php

          if(!isset($_SESSION['user_id'])){
          echo "<div class='container--form row'>";
          echo "<h1>Oops! You need to be logged in first!</h1>";
          echo "<img src='./images/raccoon.png' alt='Raccoon' class='error--raccoon'>";
          echo "<hr style='border:0 solid white'>";
          echo "<a href='../LoginPage/loginPage.php'><button type='submit' name='btnSubmit' class='sbmBtn'>Login</button></a>";
          echo "<a href='../RegistrationPage/registPage.html'><button type='submit' name='btnSubmit' class='sbmBtn'>Register</button></a>";
          echo "</div>";
          exit();
        }
            $user_id = $_SESSION['user_id'];
      
            //connect to the database
            $db = mysqli_connect("localhost:3307", "root", "", "db_login");
          //retrieve user information from the 'user' table
          $query1 = "SELECT name, email FROM user WHERE id = '$user_id'";
          $result1 = mysqli_query($db, $query1);
          $user_data = mysqli_fetch_assoc($result1);
          //retrieve user address from the 'personal_info' table
          $query2 = "SELECT address FROM personal_info WHERE user_id = '$user_id'";
          $result2 = mysqli_query($db, $query2);
          $address_data = mysqli_fetch_assoc($result2);
          ?>
        </div>
      
      
      
      
      
    </main>
     </div>

     
     <div class="container-fluid" id="Footer">
      <h4 class="socialstitle">TTI®</h4>
      
      <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
      
     <!--redundante// 4.1.3 for button -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_start();
error_reporting(0);
require '../ShoppingCart/cardInfoCheck.php';


if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
} else {
  $user_id = $_SESSION['user_id'];
}
?>

<?php
////////////////////////////////////Important note, this is not how you are supposed to do this. I want to look into a cryptography 
////////////////////////////////////library for PHP to encrypt the credit card information. This is just a temporary solution.////////////////////////////////////

if (isset($_POST['submit'])) {

  // Get the credit card information from the form
  $cardNumber = $_POST['card-number'];
  $expiryDate = $_POST['expiry-date'];
  $cvv = $_POST['cvv'];

  // validate and sanitize the input
  $cardNumber = filter_var($_POST['card-number'], FILTER_SANITIZE_NUMBER_INT);
  $expiryDate = filter_var($_POST['expiry-date'], FILTER_SANITIZE_NUMBER_INT);
  $cvv = filter_var($_POST['cvv'], FILTER_SANITIZE_NUMBER_INT);

  // encrypt the credit card information
  $encryptedCardNumber = password_hash($cardNumber, PASSWORD_DEFAULT);
  $encryptedExpiryDate = password_hash($expiryDate, PASSWORD_DEFAULT);
  $encryptedCvv = password_hash($cvv, PASSWORD_DEFAULT);

  // Connect to the database
  $db = mysqli_connect("localhost:3307", "root", "", "db_login");

  // Check if the connection was successful
  if (!$db) {
    die("Error connecting to database: " . mysqli_connect_error());
  }

  // Prepare the SQL statement to prevent SQL injection
  $stmt = mysqli_prepare($db, "INSERT INTO credit_card (user_id, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, 'ssss', $_SESSION['user_id'], $encryptedCardNumber, $encryptedExpiryDate, $encryptedCvv);

  // Execute the SQL statement and check if it was successful
  if (mysqli_stmt_execute($stmt)) {
    // Success

  } else {
    // Error
    echo "Error storing credit card information: " . mysqli_stmt_error($stmt);
  }

  // Close the database connection and statement
  mysqli_stmt_close($stmt);
  mysqli_close($db);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" href="../ShoppingCart/cartCss.css">
  <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
  <script src="./cart.js"></script>






</head>

<body>
  <div class="menu__nav">
  <div class=" navbar">


    <?php if (isset($_SESSION["user_name"])) : ?>


    <?php endif; ?>

    <a class="menu--icon" href="../MainPage/MainPage.php"> <i class="fas  fa-home"></i> </a>
    <?php if (isset($_SESSION["user_name"])) : ?>
      <a class="menu--icon" href="../LoginPage/session.php"> <i class="fa-solid  fa-user"></i></a>

    <?php else : ?>
      <a class="menu--icon" href="../LoginPage/LoginPage.php"> <i class="fa-solid  fa-user"></i> </a>
    <?php endif; ?>
    <a class="menu--icon" href="../Products/productsPage.php"> <i class="fa-brands  fa-shopify"></i> </a>
    <a class="menu--icon" href="../ContactsPage/Contacts.php"><i class="fa-solid  fa-address-book"></i> </a>

    <?php if ($hasCreditCard) : ?>
      <a class="menu--icon" href=".creditCard.php"> <i class="fa-solid  fa-box"></i></a>
    <?php else : ?>
      <a class="menu--icon" href="./cartPage.php"> <i class="fa-solid  fa-box"></i></a>
    <?php endif; ?>



  </div>
  </div>
  <div class="wrapper row">

    <main class="col-12 main--glass--effect section--color">

      <h1 class="text-center checkout--text">Shopping Cart</h1>


      <?php


      $conn = mysqli_connect("localhost:3307", "root", "", "db_login");
      $user_id = '';

      //get the user's ID from the session or query string
      if (isset($_GET['user_id'])) {
        $user_id = intval(filter_var($_GET['user_id'], FILTER_SANITIZE_NUMBER_INT));
      } else if (isset($_SESSION['user_id'])) {
        $user_id = intval(filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT));
      }
      if (isset($_SESSION['user_id'])) {
        $query = "SELECT cart.id as cart_id, cart.product_name, cart.quantity,
COALESCE(hygiene.price, toys.price, food.price, clothes.price) as price,
CASE
WHEN hygiene.product_name IS NOT NULL THEN 'hygiene'
WHEN toys.product_name IS NOT NULL THEN 'toys'
WHEN food.product_name IS NOT NULL THEN 'food'
WHEN clothes.product_name IS NOT NULL THEN 'clothes'
ELSE 'unknown'
END AS category,
CASE
WHEN hygiene.product_name IS NOT NULL THEN hygiene.id
WHEN toys.product_name IS NOT NULL THEN toys.id
WHEN food.product_name IS NOT NULL THEN food.id
WHEN clothes.product_name IS NOT NULL THEN clothes.id
END AS item_id
FROM cart
LEFT JOIN hygiene
ON cart.product_name = hygiene.product_name
LEFT JOIN toys
ON cart.product_name = toys.product_name
LEFT JOIN food
ON cart.product_name = food.product_name
LEFT JOIN clothes
ON cart.product_name = clothes.product_name
WHERE cart.user_id = ?
";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        if (!mysqli_stmt_execute($stmt)) {
          die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $result = mysqli_stmt_get_result($stmt);

        //check if the query was successful
        if (!$result) {
          die("Query failed: " . mysqli_error($conn));
        }

        //check if there are any items in the cart
        if (mysqli_num_rows($result) > 0) {
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
            echo "<td>" . htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8'). "€" . "</td>";
            echo "<td><input type='number' class='form-control input--field--number' name='quantity[" . $row['cart_id'] . "]' value='" . $row['quantity'] . "' min='1' max='99'>
      <button class='cart--remove--button' data-cart-id='" . $row['cart_id'] . "'><i class='fa-solid fa-x'></i></button></td>";
            echo "</tr>";
            $total += $row['price'] * $row['quantity'];
            $category = $row['category'];
            $id = $row['item_id'];
            $products[] = array(
              'quantity' => $row['quantity'],
              'price' => $row['price'],
              'name' => $row['product_name'],


            );
          }
          echo "<tr>";
          echo "<td><b class='cart--total'>Your Total:</b</td>";

          echo "<td><b>" . $total . ' ' . "€" . "</b></td>";
          echo "<td><button type='submit' name='update_cart' class='btn update--cart'>Update</button></td>";
          echo "</tr>";
          echo "</table>";
          echo "<div class='container--cart'>";
          echo "</div>";
          echo "</form>";
        } else {
          echo "<div class='cart--empty'>";
          echo "<h2>No items found in cart.</h2>";
          echo "</div>";
        }

        //Stores data in order history table @ db, only shows up if there are items in the cart
        if (!empty($products)) {
          echo "<form action='order_history.php' method='POST' class='text-center'>";
          echo "<input type='hidden' name='user_id' value='" . $user_id . "'>";
          echo "<input type='hidden' name='products' value='" . serialize($products) . "'>";
          echo "<input type='hidden' name='category' value='" . $category . "'>";
          echo "<input type='hidden' name='id' value='" . $id . "'>";
          echo "<button type='submit' id='checkout' name='checkout' class='btn sbmBtn checkout--btn shadow--xs' >Finalize purchase</button>";
          echo "</form>";
        }
      }
      ?>



      <div class="container">
        <?php

        if (!isset($_SESSION['user_id'])) {
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


    <script>
      $(document).ready(function() {
        $("#checkout").click(function() {
          let user_id = <?php echo $user_id; ?>;
          $.ajax({
            url: "./removeFromDB.php",
            method: "POST",
            data: {
              user_id: user
            },
            success: function(data) {
              alert("Cart has been cleared");
            }
          });
        });
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
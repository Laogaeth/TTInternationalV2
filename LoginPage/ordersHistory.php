<?php
session_start();
// error_reporting(0);
require '../ShoppingCart/cardInfoCheck.php';

if (isset($_SESSION["user_id"])) {
  $mysqli = require __DIR__ . "/../RegistrationPage/database.php";
  $sql = "SELECT * FROM user
            WHERE id = {$_SESSION['user_id']}";
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Trauma Team, Life Insurance">
  <meta name="author" content="Pedro Pereira">
  <link rel="icon" type="image/x-icon" href="../Images/brain.png">
  <title>User Area</title>
  <!--fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
  <!--fonts-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
  <!--My css & JS-->
  <link rel="stylesheet" href="../LoginPage/LoginCSS.css">

  <style>
    main {
      height: 100%;
    }

    .adminButton {
      padding: 1em 1em;
      border-radius: 5px;
      background: #3a3a3a;
      border: none;
      transition: background 500ms ease;
      float: right;
      margin-top: -20px;
      margin-right: 10px;
      margin-bottom: 10px
    }
  </style>

</head>


<body>
  <div class="menu__nav">
    <div class=" navbar">


      <?php if (isset($_SESSION["user_name"])) : ?>


      <?php endif; ?>

      <a class="menu--icon" href="./MainPage.php"> <i class="fas  fa-home"></i> </a>
      <?php if (isset($_SESSION["user_name"])) : ?>
        <a class="menu--icon" href="../LoginPage/session.php"> <i class="fa-solid  fa-user"></i></a>

      <?php else : ?>
        <a class="menu--icon" href="../LoginPage/LoginPage.php"> <i class="fa-solid  fa-user"></i> </a>
      <?php endif; ?>
      <a class="menu--icon" href="../Products/productsPage.php"> <i class="fa-brands  fa-shopify"></i> </a>
      <a class="menu--icon" href="../ContactsPage/Contacts.php"><i class="fa-solid  fa-address-book"></i> </a>

      <?php if ($hasCreditCard) : ?>
        <a class="menu--icon" href="../ShoppingCart/creditCard.php"> <i class="fa-solid  fa-box"></i></a>
      <?php else : ?>
        <a class="menu--icon" href="../ShoppingCart/cartPage.php"> <i class="fa-solid  fa-box"></i></a>
      <?php endif; ?>



    </div>
  </div>
  <div class="wrapper row">
    <main class="col-12 main--glass--effect">



      <div class="row container--userarea main--glass--effect">

        <div class="col-sm-5">


          <?php if (isset($user)) : ?>
          <?php else : ?>
            <p><a href="./LoginPage.php">You must be logged in to acess. Click here.</a></p>

          <?php endif; ?>

          <?php if (isset($user)) : ?>

        </div>

        <div class="row">
          <div class="col-sm-8">

            <img src="../RegistrationPage/images/panda.png" alt="Hello Panda" class="helloPanda">

            <h5>Here are all of your orders!</h5>
          </div>

          <div class="col user--settings user--return--icon"> <a href="./session.php"> <i class="fas fa-2x fa-long-arrow-alt-left"></i>
              <p>Return</p>
            </a></div>
        </div>


      </div>
    <?php endif; ?>
    <div class="container container--client">
      <?php

      // Connect to the database
      $db = mysqli_connect('localhost:3307', 'root', '', 'db_login');

      // Check if the user is logged in
      if (isset($_SESSION['user_id'])) {
        // Get the user_id of the logged-in user
        $user_id = mysqli_real_escape_string($db, $_SESSION['user_id']);

        // Retrieve order history data for the logged-in user 
        $order_history_query = "SELECT id,quantity, payment FROM order_history WHERE user_id = '$user_id'";
        $order_history_result = mysqli_query($db, $order_history_query);
        echo "<div><h5>Your Orders:</h5></div>";
        echo "<div class='filters--search--span'><input type'text' id='search--orders' placeholder='search by id' class='shadow--xs filters--search--bar'></div>";
        echo "<br>";
        echo "<table class='table--cart'>";
        echo "<tr>";
        echo "<th clas='table--header' >Order ID</th>";
        echo "<th clas='table--header' >Items</th>";
        echo "<th clas='table--header' >Total</th>";
        echo "</tr>";

        while ($order_history = mysqli_fetch_assoc($order_history_result)) {
          $id = htmlspecialchars($order_history['id']);
          $quantity = htmlspecialchars($order_history['quantity']);
          $payment = htmlspecialchars($order_history['payment']);
          echo "<tr>";
          echo "<td>" . $order_history['id'] . "</td>";
          echo "<td>" . $order_history['quantity'] . "</td>";
          echo "<td>" . $order_history['payment'] . '€' . "</td>";
          echo "</tr>";
        }

        echo "</table>";
      }
      mysqli_close($db);
      ?>


      </section>
    </main>

  </div>

  <div id="Footer">
    <h4 class="socialstitle">TTI®</h4>

    <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
  </div>
  <script src="../LoginPage/loginJavascript.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
require '../ShoppingCart/cardInfoCheck.php';

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
  <title>Whiskers & Bandits</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../ContactsPage/ContactsCSS.css">

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
      <a class="menu--icon" href="./Contacts.php"><i class="fa-solid  fa-address-book"></i> </a>

      <?php if ($hasCreditCard) : ?>
        <a class="menu--icon" href="../ShoppingCart/creditCard.php"> <i class="fa-solid  fa-box"></i></a>
      <?php else : ?>
        <a class="menu--icon" href="../ShoppingCart/cartPage.php"> <i class="fa-solid  fa-box"></i></a>
      <?php endif; ?>



    </div>
  </div>
  <div class="wrapper row">


    <main class="col-12 main--glass--effect">

      <!--Form -->
      <div class="container-fluid">

        <div class="container--form">
          <form name="formulario" method="post" action="#" onsubmit="return validateForm()">

            <h1>Leave us a message</h1>
            <br>
            <p>First Name</p>
            <input type="text" name="name" required>
            <br>
            <p>Last Name</p>
            <input type="text" name="last" required>
            <br>
            <p>Email Adress</p>
            <input type="email" name="email." required>
            <br>
            <p>Phone Number</p>
            <input type="text" name="phone" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
            <br>
            <p>Message</p>
            <textarea required></textarea>
            <br>
            <button type="submit" class="sbmBtn">Contact Us</button>
          </form>

        </div>

      </div>
    </main>
  </div>

  <!--footer-->

  <div class="container-fluid" id="Footer">
    <h4 class="socialstitle">TTI®</h4>

    <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
  </div>



  <script src="../ContactsPage/JavascriptContacts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
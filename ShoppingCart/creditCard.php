<?php
session_start();

error_reporting(0);
if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
} else {
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

      <h1 class="text-center checkout--text">Verify Payment Info</h1>

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
      <form action="cartPage.php" method="POST">

        <div class="container--form row">
          <div class="form-group col-sm-6">
            <label for="name">Name</label>
            <input type="text" id="name" value="<?php echo $user_data['name']; ?>" readonly>
          </div>
          <div class="form-group col-sm-6">
            <label for="email">Email</label>
            <input type="email" id="email" value="<?php echo $user_data['email']; ?>" readonly>
          </div>
          <div class="form-group col-12">
            <label for="address">Street Adress</label>
            <input type="text" id="address" value="<?php echo $address_data['address']; ?>" readonly>
          </div>
          <div class="form-group col-12">
            <label for="card-number">Card Number</label>
            <input type="text" id="card-number" maxlength="14" placeholder="Enter your card number" required>
          </div>
          <div class="form-group col-sm-6">
            <label for="expiry-date">Expiry Date</label>
            <input type="text" id="expiry-date" maxlength="4" placeholder="MM/YY" required>
          </div>
          <div class="form-group col-sm-6">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" maxlength="2" placeholder="Enter the CVV" required>
          </div>
          <input type="hidden" name="encryption" value="1">
          <button type="submit" class="sbmBtn credit--card--btn" name="submit">Proceed to checkout</button>
      </form>





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
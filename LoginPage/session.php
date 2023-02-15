<?php
session_start();
if (isset($_SESSION["user_id"])) {
  $mysqli = require __DIR__ . "/../RegistrationPage/database.php";
  $sql = "SELECT * FROM user
            WHERE id = {$_SESSION['user_id']}";
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
}
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
      padding: 0.5em 0.5em;
      border-radius: 5px;
      background: #3a3a3a;
      border: none;
      transition: background 500ms ease;
      float: left;
      margin-right: 10px;
      margin-bottom: 10px
    }
  </style>

</head>


<body>

  <div class="wrapper row">

    <div class="col navbar">
      <button class=" btn col btn__menu__arrow sticky"><img src="../icons/right-arrow.png" alt="arrow" class="nav--arrow"></button>

      <div class="menu__nav">


        <?php if (isset($_SESSION["user_name"])) : ?>
          <div class="nav--user--area">
            <img src="../Images/welcomeCat.png" alt="" class="navbar--cat">
            <h4>Welcome <b><?= htmlspecialchars($user["name"]) ?></b> to your user environment.</h4>
          </div>

        <?php endif; ?>

        <a class="menu--icon" href="../MainPage/MainPage.php"> <i class="fas fa-2x fa-home"></i>
          <p class="menu--nav--text">Home </p>
        </a>
        <?php if (isset($_SESSION["user_name"])) : ?>
          <a class="menu--icon" href="../LoginPage/session.php"> <i class="fa-solid fa-2x fa-user"></i>
            <p class="menu--nav--text">User </p>
          </a>
        <?php else : ?>
          <a class="menu--icon" href="../LoginPage/LoginPage.php"> <i class="fa-solid fa-2x fa-user"></i>
            <p class="menu--nav--text">User </p>
          </a>
        <?php endif; ?>
        <a class="menu--icon" href="../Products/productsPage.php"> <i class="fa-brands fa-2x fa-shopify"></i>
          <p class="menu--nav--text">Products </p>
        </a>
        <a class="menu--icon" href="../ContactsPage/Contacts.php"><i class="fa-solid fa-2x fa-address-book"></i>
          <p class="menu--nav--text">Contacts </p>
        </a>
        <?php if ($hasCreditCard) : ?>
          <a class="menu--icon" href="../ShoppingCart/creditCard.php"> <i class="fa-solid fa-2x fa-box"></i>
            <p class="menu--nav--text">Orders </p>
          </a>
        <?php else : ?>
          <a class="menu--icon" href="../ShoppingCart/cartPage.php"> <i class="fa-solid fa-2x fa-box"></i>
            <p class="menu--nav--text">Orders</p>
          </a>
        <?php endif; ?>

        <?php if (isset($_SESSION["user_name"])) : ?>
          <a class="menu--icon menu--icon--logout" href="../loginPage/logout.php"> <i class="fa-solid fa-2x fa-sign-out-alt"></i>
            <p class="menu--nav--text">Logout</p>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <main class="col-12 main--glass--effect">



      <div class="row container--userarea main--glass--effect">

        <div class="col-sm">

          <img src="../RegistrationPage/images/panda.png" alt="Hello Panda" class="helloPanda">
          <?php if (isset($user)) : ?>
            <h4>Welcome <b> <?= htmlspecialchars($user["name"]) ?></b> to your user enviroment.</h4>
            <!-- <p> <a class="logout" href="./logout.php">Log Out</a> </p> -->
          <?php else : ?>
            <p><a href="./LoginPage.php">You must be logged in to acess. Click here.</a></p>

          <?php endif; ?>

          <?php
          $db = mysqli_connect('localhost:3307', 'root', '', 'db_login');
          if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            // ask the database to get the user information
            $query = "SELECT * FROM user WHERE id = " . mysqli_real_escape_string($db, $user_id);
            $result = mysqli_query($db, $query);

            //Check if id ==1 (admin)
            if (mysqli_num_rows($result) == 1) {
              $user = mysqli_fetch_assoc($result);
              if ($user['id'] == 1) {
                //show the div for admin domain
                echo "<button class='adminButton'>
                             <a href='../LoginPage/ADMIN/ADMIN.php'>Go to admin page</a>
                            </button>";
              }
            }
          }
          ?>
        </div>

      </div>


      <?php if (isset($user)) : ?>

        <div class="row user--settings icons--menu">
          <div class="col-sm card shadow--xs  user--icons--menu"> <a href="./ordersHistory.php"> <img class="user--icons--images" src="./images/orders.png" alt="">
              <p>Orders</p>
            </a></div>
          <div class="col-sm card shadow--xs  user--icons--menu"> <img class="user--icons--images" src="./images/support.png" alt="">
            <p>Help & Support</p>
          </div>
          <div class="col-sm card shadow--xs  user--icons--menu"> <a href="./userSettings.php"> <img class="user--icons--images" src="./images/settings.png" alt="">
              <p>Settings</p>
            </a></div>
          <div class="col-sm card shadow--xs  user--icons--menu"> <a href="./logout.php" class="logout"><img class="user--icons--images" src="./images/logout.png" alt="">
              <p>Logout</p>
            </a></div>
        </div>
      <?php endif; ?>


      </section>
    </main>

  </div>
  <script src="../LoginPage/loginJavascript.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
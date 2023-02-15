<?php
session_start();
ini_set('display_errors', 0);

require '../../ShoppingCart/cardInfoCheck.php';

if (isset($_SESSION["user_id"])) {
  $mysqli = require  "../../RegistrationPage/database.php";
  $sql = "SELECT * FROM user
            WHERE id = {$_SESSION['user_id']}";
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
}
?>
<!--User verification, if not admin get's yeeted-->
<?php
$db = new mysqli("localhost:3307", "root", "", "db_login");

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

//nab users ID from the session & query their ID from db
$user_id = $_SESSION['user_id'];
$sql = "SELECT id FROM user WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();


if (!$result) {
  die("Query failed: " . $db->error);
}

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {


    if ($row['id'] != 1) {
      header("Location: ../restricted.php");
    }
  }
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
  <link rel="stylesheet" href="../../LoginPage/LoginCSS.css">

  <style>
    .adminButton {
      padding: 1em 1em;
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
      <button class=" btn col btn__menu__arrow sticky"><img src="../../icons/right-arrow.png" alt="arrow" class="nav--arrow"></button>

      <div class="menu__nav">


        <?php if (isset($_SESSION["user_name"])) : ?>
          <div class="nav--user--area">
            <img src="../../Images/welcomeCat.png" alt="" class="navbar--cat">
            <p class="navbar--cat--text"> Welcome <?php echo $_SESSION["user_name"]; ?> </p>
          </div>

        <?php endif; ?>

        <a class="menu--icon" href="../../MainPage/MainPage.php"> <i class="fas fa-2x fa-home"></i>
          <p class="menu--nav--text">Home </p>
        </a>
        <?php if (isset($_SESSION["user_name"])) : ?>
          <a class="menu--icon" href="../../LoginPage/session.php"> <i class="fa-solid fa-2x fa-user"></i>
            <p class="menu--nav--text">User </p>
          </a>
        <?php else : ?>
          <a class="menu--icon" href="../../LoginPage/LoginPage.php"> <i class="fa-solid fa-2x fa-user"></i>
            <p class="menu--nav--text">User </p>
          </a>
        <?php endif; ?>
        <a class="menu--icon" href="../../Products/productsPage.php"> <i class="fa-brands fa-2x fa-shopify"></i>
          <p class="menu--nav--text">Products </p>
        </a>
        <a class="menu--icon" href="../../ContactsPage/Contacts.php"><i class="fa-solid fa-2x fa-address-book"></i>
          <p class="menu--nav--text">Contacts </p>
        </a>
        <?php if ($hasCreditCard) : ?>
          <a class="menu--icon" href="../../ShoppingCart/creditCard.php"> <i class="fa-solid fa-2x fa-box"></i>
            <p class="menu--nav--text">Orders </p>
          </a>
        <?php else : ?>
          <a class="menu--icon" href="../../ShoppingCart/cartPage.php"> <i class="fa-solid fa-2x fa-box"></i>
            <p class="menu--nav--text">Orders</p>
          </a>
        <?php endif; ?>

        <?php if (isset($_SESSION["user_name"])) : ?>
          <a class="menu--icon menu--icon--logout" href="../../loginPage/logout.php"> <i class="fa-solid fa-2x fa-sign-out-alt"></i>
            <p class="menu--nav--text">Logout</p>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <main class="col-12 main--glass--effect">



      <div class="row container--userarea main--glass--effect">

        <div class="col-sm-9">

          <img src="../../RegistrationPage/images/panda.png" alt="Hello Panda" class="helloPanda">
          <?php if (isset($user)) : ?>
            <h4>Welcome <b> <?= htmlspecialchars($user["name"]) ?></b> to your user enviroment.</h4>
            <!-- <p> <a class="logout" href="./logout.php">Log Out</a> </p> -->
          <?php else : ?>
            <p><a href=".././LoginPage.php">You must be logged in to acess. Click here.</a></p>

          <?php endif; ?>
        </div>
        <?php if (isset($user)) : ?>
          <div class="col user--settings user--return--icon"> <a href=".././session.php"> <i class="fas fa-2x fa-long-arrow-alt-left"></i>
              <p>Return</p>
            </a></div>
        <?php endif; ?>
      </div>


      <?php if (isset($user)) : ?>

        <div class="row user--settings icons--menu">
          <div class="col-sm card shadow--xs  user--icons--menu"> <a href="./shopOrders.php"> <img class="user--icons--images" src=".././images/ordersAdmin.png" alt="">
              <p>Shop Orders</p>
            </a></div>
          <div class="col-sm card shadow--xs  user--icons--menu"> <img class="user--icons--images" src=".././images/support.png" alt="">
            <p>Tickets</p>
          </div>
          <div class="col-sm card shadow--xs  user--icons--menu"> <a href="../ADMIN/allUsersInfo.php"> <img class="user--icons--images" src=".././images/adminSettings.png" alt="">
              <p>Users Settings</p>
            </a></div>
          <div class="col-sm card shadow--xs  user--icons--menu"> <a href=".././logout.php" class="logout"><img class="user--icons--images" src=".././images/logout.png" alt="">
              <p>Logout</p>
            </a></div>
        </div>
      <?php endif; ?>



      </section>
    </main>

  </div>
  <script src="../../LoginPage/loginJavascript.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
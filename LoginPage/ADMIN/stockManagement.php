<?php
session_start();
error_reporting(0);
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
$sql = "SELECT id FROM user WHERE id = $user_id";

$result = $db->query($sql);

if (!$result) {
  die("Query failed: " . $db->error);
}

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {


    if ($row['id'] != 1) {
      header("Location: restricted.php");
      exit;
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
    main {
      height: 100%;
    }

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
            <p><a href=".././LoginPage.php">You must be logged in to acess. Click here.</a></p>

          <?php endif; ?>

          <?php if (isset($user)) : ?>

        </div>

        <div class="row">
          <div class="col-sm-8">

            <img src="../../RegistrationPage/images/panda.png" alt="Hello Panda" class="helloPanda">

            <h5>Store wide orders</h5>
          </div>

          <div class="col user--settings user--return--icon"> <a href="../../LoginPage/ADMIN/ADMIN.php"> <i class="fas fa-2x fa-long-arrow-alt-left"></i>
              <p>Return</p>
            </a></div>
        </div>


      </div>
    <?php endif; ?>

    <div class="container--userarea userarea--table--add col-12">
      <!-- well , hello there, this might seem stupidly long but trust me, looks nice in the browser -->
      <form id="form--add--products" action="addProducts.php" method="POST">
        <h5>Add stock!</h5>
        <table class='admin--stock--table'>
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Category</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <input type="text" id="product_name" name="product-name" required>
              </td>
              <td>
                <select id="category" class="dropdown--btn" name="category" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2">
                <input type="number" id="price" name="price" required>
              </td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>Stock</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2">
                <input type="number" id="stock" name="stock" required>
              </td>
            </tr>
          </tbody>
          <thead>
            <tr>
              <th>Image Path</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="2">
                <input type="text" id="image_path" name="image_path" required>
              </td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" id="selected_category" name="selected_category">

        <input type="submit" value="Submit">
      </form>

    </div>


    <div class="container--userarea">


      <h5>Edit:</h5>
      <span class="filters--search--span"><input type="text" placeholder="search bar" id="searchTerm" class="shadow--xs filters--search--bar"></span>

      <table class='admin--stock--table' id="stock-table">
        <tr>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Action</th>
        </tr>



      </table>

    </div>





    </section>
    </main>

  </div>
  <script src="../../LoginPage/loginJavascript.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
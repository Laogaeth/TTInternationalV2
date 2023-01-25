<?php
session_start();

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $mysqli = require __DIR__."../../RegistrationPage/database.php";
  $sql = sprintf("SELECT * FROM user WHERE email = '%s'",
                  $mysqli->real_escape_string($_POST["email"]));
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();

  if ($user) {
    if (password_verify($_POST["password"], $user["password_hash"])) {
      session_start();
      session_regenerate_id(); //to prevent session fixation attacks

      $_SESSION["user_id"] = $user["id"]; //store user id in session superglobal, files stored in server
      $_SESSION["user_name"] = $user["name"]; 
      header("Location: ./session.php");
      exit;
    }
  }
  $is_invalid = true;
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
  <title>Login</title>
  <!--fonts-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
  <!--My css & JS-->
<link rel="stylesheet" href="../LoginPage/LoginCSS.css">


</head>


<body>
 <div class="wrapper row">
    <!-- Navbar Menu -->
  
 <div class="col navbar">
      <button  class=" btn col btn__menu__arrow sticky"><img src="../icons/right-arrow.png" alt="arrow" class="nav--arrow"></button>

    <div class="menu__nav">


      <?php if (isset($_SESSION["user_name"])):?>
        <div class="nav--user--area">
      <img src="../Images/welcomeCat.png" alt="" class="navbar--cat">
     <p class="navbar--cat--text"> Welcome <?php echo $_SESSION["user_name"];?> </p>
        </div>
     
      <?php endif; ?>
      
      <a class="menu--icon" href="./MainPage/MainPage.php">     <i class="fas fa-2x fa-home"></i>              <p class="menu--nav--text">Home           </p></a>
  <?php if (isset($_SESSION["user_name"])):?>
      <a class="menu--icon" href="../LoginPage/session.php">    <i class="fa-solid fa-2x fa-user"></i>         <p class="menu--nav--text">User           </p></a>
  <?php else: ?>
     <a class="menu--icon" href=".LoginPage.php">               <i class="fa-solid fa-2x fa-user"></i>         <p class="menu--nav--text">User           </p></a>
  <?php endif; ?>
      <a class="menu--icon" href="../Products/productsPage.php"><i class="fa-brands fa-2x fa-shopify"></i>     <p class="menu--nav--text">Products       </p></a>    
      <a class="menu--icon" href="../ContactsPage/Contacts.php"><i class="fa-solid fa-2x fa-address-book"></i> <p class="menu--nav--text">Contacts       </p></a>
      <a class="menu--icon" href="../ShoppingCart/cartPage.php"><i class="fa-solid fa-2x fa-cart-shopping"></i><p class="menu--nav--text">Shopping Cart  </p></a>
      
      <?php if (isset($_SESSION["user_name"])):?>
       <a class="menu--icon menu--icon--logout" href="../loginPage/logout.php"> <i class="fa-solid fa-2x fa-sign-out-alt"></i><p class="menu--nav--text">Logout</p></a>
    <?php endif; ?>
      </div>
</div>
     
<main class="col-11 main--glass--effect">
  <section>

 <form method="post">
  <div class="imgcontainer">
    <img src="../Images/redPanda.png" alt="Avatar" class="avatar">
      
  </div>

  <div class="container">
  <!-- If login info is invalid display this: -->
    <?php if($is_invalid): ?>
     <div>  <h2><em>  Invalid Login </em></h2> </div>
      <?php endif; ?>
  
    <label for="email"><b>email</b></label>
    <input type="text" placeholder="Enter Email" id="email" name="email" required
                                              value="<?= htmlspecialchars($_POST["email"] ?? "" )?>"><br> <!--to remember email whenever it gives an error login in-->
    
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required> <br>
    <br>

    <button class="sbmBtn" type="submit">Login</button>
    <a class="registration" href="../RegistrationPage/registPage.html">Not registered yet? Click here</a>
    
  </div>
</form> 

  </section>
 
</main>
</div>
 <div class="container-fluid" id="Footer">
  <h4 class="socialstitle">TTI®</h4>

  <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
 </div>


<script src="../LoginPage/loginJavascript.js"></script>
 <!--redundante// 4.1.3 for button -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</body>
</html>
<?php
session_start();
if (isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/../RegistrationPage/database.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION['user_id']}";
            $result = $mysqli -> query($sql);
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
  main{
    height: 100%;
  }
    .adminButton{
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
      <a class="menu--icon" href="../ShoppingCart/cartPage.php"> <i class="fa-solid fa-2x fa-cart-shopping"></i><p class="menu--nav--text">Shopping Cart  </p></a>
      
      <?php if (isset($_SESSION["user_name"])):?>
       <a class="menu--icon menu--icon--logout" href="../loginPage/logout.php"> <i class="fa-solid fa-2x fa-sign-out-alt"></i><p class="menu--nav--text">Logout</p></a>
    <?php endif; ?>
      </div>
  </div>

  <main class="col-11 main--glass--effect">

  <section class="row">

  <div class="col-11 container--userarea main--glass--effect">
    <img src="../RegistrationPage/images/panda.png" alt="Hello Panda" class="helloPanda">
     <?php if (isset($user)): ?>
        <h1>Welcome <b> <?=htmlspecialchars( $user["name"])?></b> to your user enviroment.</h1>
        <?php else: ?>
               <p><a href="./LoginPage.php">You must be logged in to acess. Click here.</a></p>
               <?php endif; ?>
               
               <?php
                $db = mysqli_connect('localhost:3307', 'root', '', 'db_login');
                if (isset($_SESSION['user_id'])) {
                  $user_id = $_SESSION['user_id'];
                  // ask the database to get the user information
                  $query = "SELECT * FROM user WHERE id = $user_id";
                  $result = mysqli_query($db, $query);
                
                  //Check if id ==1 (admin)
                  if (mysqli_num_rows($result) == 1) {
                    $user = mysqli_fetch_assoc($result);
                    if ($user['id'] == 1) {
                      //show the div for admin domain
                      echo "<button class='adminButton'>
                             <a href='../LoginPage/ADMIN.php'>Go to admin page</a>
                            </button>";
                    }
                  }
                }
                ?>
               <p> <a class="logout" href="./logout.php">Log Out</a> </p>

               </div>
</section>

<!--User Info & update-->

<?php
$db = mysqli_connect('localhost:3307', 'root', '', 'db_login');

if (isset($_SESSION['user_id'])) {
  $username = $_SESSION['user_id'];

  // Retrieve user and personal_info data
  $user_query = "SELECT * FROM user WHERE id = '$username'";
  $user_result = mysqli_query($db, $user_query);
  $user = mysqli_fetch_assoc($user_result);

  $personal_info_query = "SELECT * FROM personal_info WHERE user_id = '$username'";
  $personal_info_result = mysqli_query($db, $personal_info_query);
  $personal_info = mysqli_fetch_assoc($personal_info_result);

  echo "<div>";
  echo "<section class='container col-sm-6 container--client'>";
  echo "Client: " . $user['client'] . "<br>";
  echo "<br>";
  echo "Name: " . $user['name'] . "<br>";
  echo "<br>";
  echo "Email: " . $user['email'] . "<br>";
  echo "<br>";
  echo "Phone Number: " . $personal_info['phone_number'] . "<br>";
  echo "<br>";
  echo "Address: " . $personal_info['address'] . "<br>";
  echo "</div>";

  if (isset($_POST['update_user'])) {
  $client = $_POST['client'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $address = $_POST['address'];
    // Update user data
  $update_user_query = "UPDATE user SET client = '$client', name = '$name', email = '$email' WHERE id = '$username'";
  mysqli_query($db, $update_user_query);
    
  // Update personal_info data
  $update_personal_info_query = "UPDATE personal_info SET phone_number = '$phone_number', address = '$address' WHERE user_id = '$username'";
  mysqli_query($db, $update_personal_info_query);
    
  $_SESSION['username']['client'] = $client;
  $_SESSION['username']['name'] = $name;
  $_SESSION['username']['email'] = $email;
    
  header("Location: ../LoginPage/session.php");
  }

  // Display the personal info update form
  echo "<div class='col-sm-6 container container--client'>";
  echo "<form method='post' action='../LoginPage/session.php'>";
  echo "<h6>Update personal info</h6>";
  echo "Client: <input type='text' name='client' value='" . $user['client'] . "'required><br>";
  echo "Name: <input type='text' name='name' value='" . $user['name'] . "'required><br>";
  echo "Email: <input type='email' name='email' value='" . $user['email'] . "'required><br>";
  echo "Phone Number: <input type='text' name='phone_number'pattern='[0-9]{0,9}' value='" . $personal_info['phone_number'] . "'required><br>";
  echo "Address: <input type='text' name='address' value='" . $personal_info['address'] . "'required><br>";
  echo "<input type='submit' class='sbmBtn' name='update_user' value='Update'>";
  echo "</form>";
  echo "</div> ";
  }
  ?>

</section>
</main>    

</div>
  <script src="../LoginPage/loginJavascript.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
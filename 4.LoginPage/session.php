<?php
session_start();
if (isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/../5.RegistrationPage/database.php";
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
<link rel="stylesheet" href="../4.LoginPage/LoginCSS.css">
 
 <style>
  body{
    height: 100vh;
  }
    main{
      background: #ff480068;
      max-width: 1600px;
      margin: auto;
      
    }

    a{
      font-family: 'Share Tech Mono', monospace;
      color: #fff;
    }
    a:visited{
      color: #fff;
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

    <!-- Navbar Menu -->
  <div class="sticky" id="menu">
    <nav class="navbar navbar-expand-lg ">
      <a class="navbar-brand" href="./MainPage.php">HOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="../4.LoginPage/LoginPage.php">User Hub</a>
          <a class="nav-item nav-link" href="../6.PortfolioPage/PortfolioPage.php">Products</a>
          <a class="nav-item nav-link" href="../3.ContactsPage/Contacts.html">Contacts</a>
          <a class="nav-item nav-link" href="../3.ContactsPage/Contacts.html">Shopping cart <img  class="icon--shoppingCart" src="../icons/shoppingCart.png" alt=""></a>
        </div>
      </div>
    </nav>
  </div>

<main class="main--glass--effect">

  <section>

  <div class="container--userarea main--glass--effect">
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
                             <a href='../4.LoginPage/ADMIN.php'>Go to admin page</a>
                            </button>";
                    }
                  }
                }
                ?>
               <p> <a class="logout" href="./logout.php">Log Out</a> </p>

               </div>
</section>

<!--User Info & update-->

<section>
<?php
$db = mysqli_connect('localhost:3307', 'root', '', 'db_login');

if (isset($_SESSION['user_id'])) {
  $username = $_SESSION['user_id'];

  $user_query = "SELECT * FROM user WHERE id = '$username'";
  $user_result = mysqli_query($db, $user_query);
  $user = mysqli_fetch_assoc($user_result);

  echo "<div";
  echo "<section class='container container--client'>";
  echo "Client: " . $user['client'] . "<br>";
  echo "Name: " . $user['name'] . "<br>";
  echo "Email: " . $user['email'] . "<br>";
  echo "</div> <hr>";

  if (isset($_POST['update_user'])) {
    $client = $_POST['client'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $update_query = "UPDATE user SET client = '$client', name = '$name', email = '$email' WHERE id = '$username'";
    mysqli_query($db, $update_query);

    $_SESSION['username']['client'] = $client;
    $_SESSION['username']['name'] = $name;
    $_SESSION['username']['email'] = $email;

    header("Location: ../4.LoginPage/session.php");
  }

  // Display the personal info update form

  echo "<form method='post' action='../4.LoginPage/session.php'>";
  echo "<h6>Update personal info</h6>";
  echo "Client: <input type='text' name='client' value='" . $user['client'] . "'required><br>";
  echo "Name: <input type='text' name='name' value='" . $user['name'] . "'required><br>";
  echo "Email: <input type='email' name='email' value='" . $user['email'] . "'required><br>";
  echo "<input type='submit' class='sbmBtn' name='update_user' value='Update'>";
  echo "</form>";
  echo "</section>";
}
?>
<form method="post" class="container container--client">
    <?php

    // Connect to the database
    $conn = mysqli_connect('localhost:3307', 'root', '', 'db_login');
    // Get the current user's ID
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['submit']))
    {
        if($_POST['submit'] == "Update")
        {
            // Get the new consultation and date from the form
            $new_consultation = mysqli_real_escape_string($conn, $_POST['new_consultation']);
            $new_date = $_POST['new_date'];
            // Update the consultation and date for the current user
            $query = "UPDATE user SET consultation = '$new_consultation', consultation_date = '$new_date' WHERE id = $user_id";
            mysqli_query($conn, $query);
            echo "Your consultation has been updated.";
        }
        else if($_POST['submit'] == "Delete")
        {
            // Delete the consultation and date for the current user
            $query = "UPDATE user SET consultation = NULL, date = NULL WHERE id = $user_id";
            mysqli_query($conn, $query);
            echo "Your consultation has been deleted.";
        }
        else if($_POST['submit'] == "Add")
        {
            // Get the new consultation and date from the form
            $new_consultation = mysqli_real_escape_string($conn, $_POST['new_consultation']);
            $new_date = $_POST['new_date'];
            // Insert the new consultation and date for the current user
            $query = "INSERT INTO user (consultation, consultation_date) VALUES ('$new_consultation', '$new_date') WHERE id = $user_id";
            mysqli_query($conn, $query);
            echo "Your new consultation has been added.";
        }
    }
    // Retrieve the consultation and date for the current user
    $query = "SELECT consultation, consultation_date FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $consultation = $row['consultation'];
    $date = $row['consultation_date'];
    ?>
    <label for="consultation">Your consultation is:</label>
    <textarea id="consultation" name="new_consultation" rows="4" cols="50"><?php echo $consultation ?></textarea>
    <br>
    <label for="date">Date:</label>
    <input type="date" id="date" name="new_date" value="<?php echo $date ?>">
    <br>
    <input type="submit" name="submit" value="Submit" class="sbmBtn">
    <input type="submit" name="submit" value="Delete">
</form>



  </section>
</main>    
               
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
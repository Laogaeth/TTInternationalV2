<?php
session_start();
if (isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/../5.RegistrationPage/database.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION['user_id']}";
            $result = $mysqli -> query($sql);
            $user = $result->fetch_assoc();
}

//admin button
$db = mysqli_connect('localhost', 'root', '', 'db_login');
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
      background:linear-gradient(rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.60)), url(../Images/userBackground.jpg);
    }
    a{
      font-family: 'Share Tech Mono', monospace;
      text-decoration: none;
      color: #79F2BA;
    }
    .adminButton{
      padding: 1em 1em;
      margin: 100px;
      margin-top: 20%;
      border-radius: 5px;
      background: #3a3a3a;      
      border: none;
      transition: background 500ms ease;
    }
    section{
      margin: auto;
    }
  
  </style>

</head>


<body>

    <!-- Navbar Menu -->
  <div class="sticky" id="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../1.MainPage/MainPage.php">HOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="../4.LoginPage/LoginPage.php">User Hub</a>
          <a class="nav-item nav-link" href="../6.PortfolioPage/PortfolioPage.php">Portfolio</a> 
          <a class="nav-item nav-link" href="../2.OrçamentoPage/OrçamentoPage.html" >Custom Pricing</a> 
          <a class="nav-item nav-link" href="../3.ContactsPage/Contacts.html">Contacts</a>
        </div>
      </div>
    </nav>
  </div>

  <section>

  <div class="container--userarea">
     <?php if (isset($user)): ?>
        <h1>Welcome <b> <?=htmlspecialchars( $user["name"])?></b> to your user enviroment.</h1>
        <?php else: ?>
               <p><a href="./LoginPage.php">You must be logged in to acess. Click here.</a></p>
               <?php endif; ?>
               <p> <a class="logout" href="./logout.php">Log Out</a> </p>
               <script src="../3.ContactsPage/JavascriptContacts.js"></script>
               </div>
</section>

<!--User Info & update-->

<section>
<?php
$db = mysqli_connect('localhost', 'root', '', 'db_login');

if (isset($_SESSION['user_id'])) {
  $username = $_SESSION['user_id'];

  $user_query = "SELECT * FROM user WHERE id = '$username'";
  $user_result = mysqli_query($db, $user_query);
  $user = mysqli_fetch_assoc($user_result);

  echo "<div";
  echo "<section class='container'>";
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
  echo "<input type='submit' name='update_user' value='Update'>";
  echo "</form>";
  echo "</section>";
}
?>
</section>
           
               
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
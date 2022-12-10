
<?php
$is_invalid= false;

if($_SERVER["REQUEST_METHOD"]==="POST"){

  $mysqli = require __DIR__."./../5.RegistrationPage/database.php";
  $sql = sprintf("SELECT * FROM user
                  WHERE email = '%s'",
                  $mysqli->real_escape_string($_POST["email"]));
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
  
  if($user){
    if (password_verify($_POST["password"], $user["password_hash"])){

      session_start();
      session_regenerate_id();  //to prevent session fixation attacks
      $_SESSION["user_id"] = $user["id"]; //store user id in session superglobal, files stored in server

      header("Location: ./session.php");
      exit;

    }
  }
 $is_invalid= true;
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
  <title>Night City</title>
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
     
<main>
  <section>
 <form method="post">
  <div class="imgcontainer">


    <img src="../Images/brain.png" alt="Avatar" class="avatar">
      
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
    <a class="registration" href="../5.RegistrationPage/registPage.html">Not registered yet? Click here</a>
    
  </div>
</form> 

  </section>







 <div id="Footer">
  <h4 class="socialstitle">TTI®</h4>

  <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
 </div>

 <!--redundante// 4.1.3 for button -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</main>
</body>
</html>
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
  <link rel="stylesheet" href="../6.PortfolioPage/PortfolioCSS.css">
  
</head>

 <body>
   <!-- onload="timerAlert()" -->
 
  <!--Nav Menu-->
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
 

 <!--Portfolio-->

 <h4>Our credentials</h4>



 <section class="oddSec">
    <div class="row">
  <?php
$conn = mysqli_connect('localhost', 'root', '', 'db_login');
$query = "SELECT * FROM projects WHERE id = 1";
$results = mysqli_query($conn, $query);

// Create html to show content
echo "<div class='col-sm-4'>";
while ($project = mysqli_fetch_assoc($results)) {
    echo "<h3><b>{$project['name']}</b></h3>";
    echo "<hr>";
    echo "<p>{$project['tech']}</p>";
    echo "<p>Time frame: {$project['time']}</p>";
    
}
echo "</div>";
?>
    <div class="col-sm-8">
    <img class="portView" src="./images/1.jpg" alt="">
    </div>

</section>

 <section>

    <div class="row">
  
        <div class="col-sm-8">
    <img class="portView" src="./images/2.jpg" alt="">
    </div>

     <?php
$conn = mysqli_connect('localhost', 'root', '', 'db_login');
$query = "SELECT * FROM projects WHERE id = 2";
$results = mysqli_query($conn, $query);
echo "<div class='col-sm-4'>";
while ($project = mysqli_fetch_assoc($results)) {
    echo "<h3><b>{$project['name']}</b></h3>";
    echo "<hr>";
    echo "<p>{$project['tech']}</p>";
    echo "<p>Time frame: {$project['time']}</p>";
}
echo "</div>";
?>
    </div>


</section>

 <section class="oddSec">
    <div class="row">
     <?php
$conn = mysqli_connect('localhost', 'root', '', 'db_login');
$query = "SELECT * FROM projects WHERE id = 3";
$results = mysqli_query($conn, $query);
echo "<div class='col-sm-4'>";
while ($project = mysqli_fetch_assoc($results)) {
    echo "<h3><b>{$project['name']}</b></h3>";
    echo "<hr>";
    echo "<p>{$project['tech']}</p>";
    echo "<p>Time frame: {$project['time']}</p>";
}
echo "</div>";
?>
     <div class="col-sm-8">
    <img class="portView" src="./images/3.jpeg" alt="">
    </div>
    </div>
</section>

 <section>
    <div class="row">
    
    <div class="col-sm-8">
    <img class="portView" src="./images/4.png" alt="">
    </div>
     <?php
$conn = mysqli_connect('localhost', 'root', '', 'db_login');
$query = "SELECT * FROM projects WHERE id = 4";
$results = mysqli_query($conn, $query);
echo "<div class='col-sm-4'>";
while ($project = mysqli_fetch_assoc($results)) {
    echo "<h3><b>{$project['name']}</b></h3>";
    echo "<hr>";
    echo "<p>{$project['tech']}</p>";
    echo "<p>Time frame: {$project['time']}</p>";
}
echo "</div>";
?>
    </div>
</section>

 <section class="oddSec">
    <div class="row">
     <?php
$conn = mysqli_connect('localhost', 'root', '', 'db_login');
$query = "SELECT * FROM projects WHERE id = 5";
$results = mysqli_query($conn, $query);
echo "<div class='col-sm-4'>";
while ($project = mysqli_fetch_assoc($results)) {
    echo "<h3><b>{$project['name']}</b></h3>";
    echo "<hr>";
    echo "<p>{$project['tech']}</p>";
    echo "<p>Time frame: {$project['time']}</p>";
}
echo "</div>";
?>
     <div class="col-sm-8">
    <img class="portView" src="./images/5.jpg" alt="">
    </div>
    </div>
</section>

 <section>
    <h4>No matter how dire, failure is not an option.</h4>
    <div class="row">
    <img src="./images/5.png" alt="">
    </div>
    </div>
</section>




 <div id="Footer">
  <h1 class="socialstitle">TTI®</h1>

  <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
 </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
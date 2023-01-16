
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
<link rel="stylesheet" href="../4.LoginPage/LoginCSS.css">
<style>
.admin{
    margin: auto;
    margin-top:100px;
    background: rgba(34, 33, 33, 0.95);
    border-radius: 20px;
    color: white;
    max-width: 90%;
}
.admin td{
  padding: 10px;
}
.container{
    margin-top: 10%;
}
main{
    background:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.2)), url(../Images/adminBack.webp);
    
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
  <main>
<!-- admin area-->
<table class="admin" border ='0' cellpadding='6' cellspacing='6' width="600px">  
<tr>  
<hr>
<td><b>ID</b></td>
<td><b>Name</b></td>  
<td><b>Tech Used</b></td>  
<td><b>Time frame</b></td>  
</tr>


<?php

// Connect to the database
$db = mysqli_connect('localhost:3307', 'root', '', 'db_login');

// Query the database to get the projects
$query = "SELECT * FROM projects";
$result = mysqli_query($db, $query);

// Loop through the projects and display their information
while ($project = mysqli_fetch_assoc($result)) {

    echo 
    "<tr>  
<td>".$project['id']."</td>  
<td>".$project['name']."</td>  
<td>".$project['tech']."</td>  
<td>".$project['time']."</td>  
</tr>"; 
}

?>
</table>

<!---------------------------To add the data--------------------------->

<div class="container">
<form action="adminForm.php" method="post">
    <h2 style="color: #79F2BA;">Add Projects</h2>
    <hr>
    <label for="name">name:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="tech">tech:</label>
    <input type="text" name="tech" id="tech" required></input>
    <br>

    <label for="time">time frame:</label>
    <input type="text" name="time" id="time" required>
    <br>
    <input type="submit"></input>
</form>
<br><br><br>
<hr>

<!-------------------------- To edit the data --------------------------->
<form action="updateForm.php" method="post">
  <h2 style="color: yellow;" >Update tables</h2>
    <label>ID: <input type="text" name="id"     required /></label>
    <label>Name: <input type="text" name="name" required /></label>
    <label>Tech: <input type="text" name="tech" required /></label>
    <label>Time: <input type="text" name="time" required /></label>

    <input type="submit" name="submitUpdate" value="Submit" />
</form>
<br><br><br>
<hr>

<!---------------------------To delete the data--------------------------->
<form action="deleteForm.php" method="post">
  <h2 style="color: red;">Delete project</h2>
    <label>ID: <input type="text" name="id" required /></label>
    <input type="submit" name="submit" value="Submit"  />
</form>
</div>

<hr class="admin--divider">



<!--NEWS Tab-->

<!---------------------------Add data to database--------------------------->

<div class="container">
<?php
$db = new mysqli("localhost:3307", "root", "", "db_login");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT id, name, resumo FROM news";

$result = $db->query($sql);

if (!$result) {
    die("Query failed: " . $db->error);
}
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo "ID: " . $row["id"] .'<br>'. " | Name: " . $row["name"].'<br><br>';
    }
}
?>
<hr class="admin--divider">

<h2 style="color: #79F2BA;">Add data</h2>
<form method="POST" action="../4.LoginPage/newsADD.php">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="resumo">Resumo:</label><br>
  <textarea id="resumo" name="resumo"></textarea><br><br>
  <input type="submit" value="Submit">
</form> 



<hr class="admin--divider">




<!---------------------------Edit Database data--------------------------->


<h2 style="color:yellow;">Edit existing data</h2>
<form method="POST" action="../4.LoginPage/newsEDIT.php">
  <label for="id">ID:</label><br>
  <input type="text" name="id" >
  
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="resumo">Resumo:</label><br>
  <textarea id="resumo" name="resumo"></textarea><br><br>
  <input type="submit" value="Submit">
</form> 


<hr class="admin--divider">





<!---------------------------Delete Database data--------------------------->




<h2 style="color: red;">Delete data</h2>
<form method="POST" action="../4.LoginPage/newsDELETE.php">
   <label for="id">ID:</label><br>
  <input type="text" name="id">
  <input type="submit" value="Delete">
</form> 




</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>

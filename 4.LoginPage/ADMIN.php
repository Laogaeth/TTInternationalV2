
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
.admin{
    margin: auto;
    margin-top:20%;
    background-color: black;
    color: white;
    width: 99%;
}
.container{
    margin-top: 10%;
}
</style>


</head>


<body>

    <!-- Navbar Menu -->
  <div class="sticky" id="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../1.MainPage/MainPage.html">HOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="../4.LoginPage/LoginPage.php">User Hub</a> 
          <a class="nav-item nav-link" href="../2.OrçamentoPage/OrçamentoPage.html" >Custom Pricing</a> 
          <a class="nav-item nav-link" href="../3.ContactsPage/Contacts.html">Contacts</a>
        </div>
      </div>
    </nav>
  </div>
<!-- admin area-->
<table class="admin" border ='0' cellpadding='4' cellspacing='4'>  
<tr>  
<td><b>ID</b></td>
<td><b>Name</b></td>  
<td><b>Tech Used</b></td>  
<td><b>Time frame</b></td>  
</tr>


<?php

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'db_login');

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

<div class="container">
<form action="adminForm.php" method="post">
    <h6>Add Projects</h6>
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

<!-- Form to edit the data -->
<form action="updateForm.php" method="post">
  <h6>Update tables</h6>
    <label>ID: <input type="text" name="id"     required /></label>
    <label>Name: <input type="text" name="name" required /></label>
    <label>Tech: <input type="text" name="tech" required /></label>
    <label>Time: <input type="text" name="time" required /></label>

    <input type="submit" name="submitUpdate" value="Submit" />
</form>
<br><br><br>
<hr>

<!--Form to delete data-->
<form action="deleteForm.php" method="post">
  <h6>Delete project</h6>
    <label>ID: <input type="text" name="id" required /></label>
    <input type="submit" name="submit" value="Submit"  />
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
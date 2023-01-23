<?php
$host = "localhost:3307";
$username = "root";
$password = "";
$db = "db_login";
$conn = mysqli_connect($host, $username, $password, $db);
 if (isset($_POST["submit"])) {
    // Get the form data
     $id = $_POST["id"];

     //Delete the row from the table
     $query = "DELETE FROM projects WHERE id = $id";
     $result = mysqli_query($conn, $query);
}
   if (mysqli_query($conn, $query)) {
        echo "<h1>Project Deleted successfully!</h1>";
        header('Location: ../LoginPage/ADMIN.php');

    }else{
        echo "Error: " . mysqli_error($conn);
    }

// Close the MySQL connection
 mysqli_close($conn);
?> 

<!-- 
<html lang="en">
    <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Trauma Team, Life Insurance">
  <meta name="author" content="Pedro Pereira">
  <link rel="icon" type="image/x-icon" href="../Images/brain.png">
        <style>
            body{
            background-color: rgba(34, 33, 33, 0.95);
            text-align: center;
            width: 99%;
            color: white;
            }
            button{
                padding:1em 1em;
                font-size: 1.3em;
                border-radius: 10%;
                border: none;
                background-color:rgb(17, 17,17, 0.95);
                color: white;


            }
            h1{
            margin: auto;
            font-size: 4em;
            color: white;
            padding-top: 50% ;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
        </style>
    </head>
    <body>
        <a href="../4.LoginPage/ADMIN.php"><button>Return</button></a>
    </body>
</html>
 -->

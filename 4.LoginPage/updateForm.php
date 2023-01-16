<?php
$host = "localhost:3307";
$username = "root";
$password = "";
$db = "db_login";
$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form was submitted
if (isset($_POST["submitUpdate"])) {
    // Get the form data
    $id = $_POST["id"];
    $name = $_POST["name"];
    $tech = $_POST["tech"];
    $time = $_POST["time"];

    // Update the data in the database
    $query = "UPDATE projects SET name = '$name', tech = '$tech',time= '$time' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    // run query
    if (mysqli_query($conn, $query)) {
        echo "<h1>Project Updated successfully!</h1>";
        header('Location: ../4.LoginPage/ADMIN.php');

    }else{
        echo "Error: " . mysqli_error($conn);
    }


    mysqli_close($conn);
}
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
</html> -->

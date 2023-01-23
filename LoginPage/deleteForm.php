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


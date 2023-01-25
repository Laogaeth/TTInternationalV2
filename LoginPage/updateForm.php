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
        header('Location: ../LoginPage/ADMIN.php');

    }else{
        echo "Error: " . mysqli_error($conn);
    }


    mysqli_close($conn);
}
?>

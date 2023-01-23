<!--add to db-->

<?php
$name = $_POST['name'];
$tech = $_POST['tech'];
$time = $_POST['time'];
$conn = mysqli_connect('localhost', 'root', '', 'db_login');
if (!$conn) {
    die("Error connecting: " . mysqli_connect_error());
}

$sql = "INSERT INTO projects (name, tech, time) VALUES
 ('$name', '$tech','$time')";
if (mysqli_query($conn, $sql)) {
    echo "<h1>Project added successfully!</h1>";
    header('Location: ../LoginPage/ADMIN.php');

}else{
    echo "Error: " . mysqli_error($conn);
}

?>

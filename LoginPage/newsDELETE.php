

<?php
$db = new mysqli("localhost:3307","root","","db_login");
// Check for any errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//Check if the form was submitted
if (isset($_POST['id'])) {
    // Sanitize the input
    $id = $db->real_escape_string($_POST['id']);

    //Build the SQL query
    $sql = "DELETE FROM news WHERE id = $id";

    //Execute the query
    $result = $db->query($sql);

    //Check for any errors
    if (!$result) {
        die("Query failed: " . $db->error);
    }
    header("Location: ../LoginPage/ADMIN.php"); 
    exit;
}


?>
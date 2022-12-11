<?php
// Connect to the database
$db = new mysqli("localhost", "root", "", "db_login");

// Check for any errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the form was submitted
if (isset($_POST["name"]) && isset($_POST["resumo"])) {
    // Escape the input values to prevent SQL injection
    $name = $db->real_escape_string($_POST["name"]);
    $resumo = $db->real_escape_string($_POST["resumo"]);

    // Build the SQL query
    $sql = "INSERT INTO news (name, resumo) VALUES ('$name', '$resumo')";

    // Execute the query and check for errors
    if (!$db->query($sql)) {
        die("Query failed: " . $db->error);
    }
}

// Redirect the user to the main page
header("Location: ../4.LoginPage/ADMIN.php");
exit;

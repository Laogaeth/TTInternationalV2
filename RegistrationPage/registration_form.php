<?php
if(empty($_POST["client"])){
  die("Please fill out the full name field");
}
if(empty($_POST["name"])){
  die("Please fill out the username field");
}
if (empty($_POST["birthday"])) {
  die("Please fill out the birthday field");
}
if(! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
  die ("Please enter a valid email");
}
if(empty($_POST["phone"])){
  die("Please fill out the phone number field");
}
if(empty($_POST["address"])){
  die("Please fill out the address field");
}
if(strlen($_POST["password"])<8){
  die("Password must be atleast 8 characters");
}
if(!preg_match("/[a-z]/i",$_POST["password"])){
  die("Password contain atleast one letter");
}

if(!preg_match("/[0-9]/",$_POST["password"])){
  die("Password contain atleast one number");
}

if($_POST["password"]!== $_POST["password_confirmation"]){
  die("Passwords must match");
}
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "../database.php";

// Avoiding SQL injection attack
$sql = "INSERT INTO user (client, name, email, password_hash) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();

// If this return value is false, there's a problem with the SQL and the script should stop
if (!$stmt->prepare($sql)) { 
    die("SQL error: " . $mysqli->error);
} 

$stmt->bind_param("ssss", $_POST["client"], $_POST["name"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
    // Getting the last inserted ID for the user table
    $user_id = $mysqli->insert_id;

    // Inserting data into personal_info table
    $sql = "INSERT INTO personal_info (user_id, phone_number, address,birthday) VALUES (?, ?, ?,?)";
    $stmt = $mysqli->stmt_init();
    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }
    $stmt->bind_param("isss", $user_id, $_POST["phone"], $_POST["address"], $_POST["birthday"]);
    if ($stmt->execute()) {
        header("Location: SignupSucess.html"); // Makes the user go to the page
        exit;
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}


?>

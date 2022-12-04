<?php
if(empty($_POST["name"])){
  die("Please fill out the Name field");
}
if(! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
  die ("Please enter a valid email");
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
$password_hash= password_hash($_POST["password"],PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "./database.php";



//Avoiding aql injection attack//
$sql = "INSERT INTO user (name, email,password_hash)
VALUES(?,?,?)"; //?=PlaH
$stmt= $mysqli -> stmt_init();

// if this return value = false =theres a problem with sql & stop the script
if(! $stmt->prepare($sql)){ 
  die("SQL error: ".$mysqli->error);
} 

$stmt-> bind_param("sss",
            $_POST["name"],
            $_POST["email"],
            $password_hash);

  if($stmt -> execute()){
    header("Location: SignupSucess.html");   //makes the user go to the page
    exit;
    
  }else {
    if($mysqli ->errno ===1062){
      die("Email already taken");
    } else{
        die($mysqli-> error. " ". $mysqli->errno); //description of the error ie. = duplicate key entry
  }

}


?>

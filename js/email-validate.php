<?php

$mysqli = require __DIR__ ."./../5.RegistrationPage/database.php";
$sql = sprintf("SELECT * FROM user
                WHERE email= '%s'",
                $mysqli->real_escape_string($_GET["email"]));
                    //if email adress exists > verifies num of rows, if 0 = email available
                $result= $mysqli -> query ($sql);
                $is_available = $result -> num_rows === 0;
                
                    //output result as json
                header("Content-Type: application/json");
                echo json_encode(["available" => $is_available]);
?>
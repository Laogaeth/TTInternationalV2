<?php
$host= "localhost:3307";
$dbname= "db_login";
$username= "root";
$password= "";

$mysqli= new mysqli($host,$username,$password,$dbname);

if ($mysqli->connect_errno){
    die("Connection error: ".$mysqli->connect_error);
}

return $mysqli;
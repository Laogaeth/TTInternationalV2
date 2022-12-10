<?php

$db = new mysqli("localhost", "root", "", "db_login");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["resumo"])) {
  $id = $db->real_escape_string($_POST["id"]);
  $name = $db->real_escape_string($_POST["name"]);
  $resumo = $db->real_escape_string($_POST["resumo"]);

  $sql = "UPDATE news SET name = '$name', resumo = '$resumo' WHERE id = $id";

  $result = $db->query($sql);

  if (!$result) {
    die("Query failed: " . $db->error);
  }
      header("Location: ../4.LoginPage/ADMIN.php"); 

  exit;
}

?>
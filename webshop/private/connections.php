<?php
  $servername = "localhost";
  $username = "webshopDB";
  $password = "qwerty";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=webshopDB", $username, $password);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
  }
?>

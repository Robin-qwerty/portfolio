<?php
  $servername = "localhost";
  $username = "mybuddydb";
  $password = "qwerty";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=mybuddydb", $username, $password);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
  }
?>

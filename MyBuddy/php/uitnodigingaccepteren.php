<?php
  include'../private/connections.php';
  session_start();

  $sql = 'UPDATE leden SET uitnodiging = 1 WHERE id = :id';
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_GET['page']);
  $sth->execute();

  header('location: ../index.php?page=groep');
?>

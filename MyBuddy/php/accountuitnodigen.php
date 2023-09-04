<?php
  include'../private/connections.php';
  session_start();

  $sql = "INSERT INTO leden (groep, user, owner, uitnodiging)
  VALUES (:groep, :user, '0', '0')";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':groep', $_SESSION['groepsid']);
  $sth->bindParam(':user', $_GET['page']);
  $sth->execute();

  header('location: ../index.php?page=groep');
?>

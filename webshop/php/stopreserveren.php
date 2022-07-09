<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  session_start();
  include'../private/connections.php';

  $sql = "UPDATE TBUsers SET gereseveerd = :gereseveerd, beschikbaar = :beschikbaar WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':gereseveerd', $_SESSION['null']);
  $sth->bindParam(':beschikbaar', $_SESSION['null']);
  $sth->bindParam(':id', $_SESSION['user']);
  $sth->execute();

  header('location: ../index.php?page=user');

  $_SESSION['null'] == '';

?>

<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  session_start();
  include'../private/connections.php';

  $sql = "SELECT titel FROM TBBoeken WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_GET['page']);
  $sth->execute();

  if ($rsBoek = $sth->fetch(PDO::FETCH_ASSOC)) {
    $sql = "UPDATE TBUsers SET gereseveerd = :titel WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':titel', $rsBoek['titel']);
    $sth->bindParam(':id', $_SESSION['user']);
    $sth->execute();

    header('location: ../index.php?page=user');
  }
?>

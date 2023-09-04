<?php
  include'../private/connections.php';
  session_start();

  $sql = "SELECT * FROM producten WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_GET['page']);
  $sth->execute();

  while ($winkelmandje = $sth->fetch(PDO::FETCH_OBJ)) {
    if ($winkelmandje->voorraad == 0) {
      $_SESSION['melding'] = "error, niet genoeg voorraad";
      header('location: ../index.php?page=winkelmandje');
    } else {
      $sql = "SELECT * FROM winkelmandje WHERE FK_userid = :FK_userid";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':FK_userid', $_SESSION['user']);
      $sth->execute();

      if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        $sql = "UPDATE winkelmandje SET amount = amount+1 WHERE FK_productid = :FK_productid";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':FK_productid', $_GET['page']);
        $sth->execute();
      }

      $_SESSION['voorraad'] = $winkelmandje->voorraad - 1;

      $sql = "UPDATE producten SET voorraad = :voorraad WHERE id = :id";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':voorraad', $_SESSION['voorraad']);
      $sth->bindParam(':id', $_GET['page']);
      $sth->execute();
      header('location: ../index.php?page=winkelmandje');
    }
  }
?>

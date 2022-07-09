<?php
  include'../private/connections.php';
  session_start();

  $sql = "SELECT * FROM producten WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_SESSION['product']);
  $sth->execute();

  while ($winkelmandje = $sth->fetch(PDO::FETCH_OBJ)) {

    $sql = "SELECT * FROM winkelmandje WHERE FK_productid = :FK_productid";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':FK_productid', $_SESSION['product']);
    $sth->execute();

    if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      $sql = "UPDATE winkelmandje SET amount = amount+1 WHERE FK_productid = :FK_productid";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':FK_productid', $_SESSION['product']);
      $sth->execute();
    } else {
      $sql = "INSERT INTO winkelmandje (FK_userid, FK_productid, product, prijs, amount) VALUES (:FK_userid, :FK_productid, :product, :prijs, '1')";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':FK_userid', $_SESSION['user']);
      $sth->bindParam(':FK_productid', $winkelmandje->id);
      $sth->bindParam(':product', $winkelmandje->name);
      $sth->bindParam(':prijs', $winkelmandje->prijs);
      $sth->execute();
    }

    $_SESSION['voorraad'] = $winkelmandje->voorraad - 1;

    $sql = "UPDATE producten SET voorraad = :voorraad WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':voorraad', $_SESSION['voorraad']);
    $sth->bindParam(':id', $_SESSION['product']);
    $sth->execute();
    header('location: ../index.php?page=winkelmandje');
  }
?>

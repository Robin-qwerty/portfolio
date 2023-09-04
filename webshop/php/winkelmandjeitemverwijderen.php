<?php
  include'../private/connections.php';
  session_start();
  try {
    $sql = "SELECT amount FROM winkelmandje WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_GET['page']);
    $sth->execute();

    if ($row = $sth->fetch(PDO::FETCH_OBJ)) {

      $_SESSION['voorraad2'] = $row->amount;

      $sql = "UPDATE producten SET voorraad = voorraad+:voorraad WHERE id = :id";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':voorraad', $_SESSION['voorraad2']);
      $sth->bindParam(':id', $_SESSION['product']);
      $sth->execute();

      $sql = "DELETE FROM winkelmandje WHERE id = :id";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':id', $_GET['page']);
      $sth->execute();
    }

    header('location: ../index.php?page=winkelmandje');
  } catch (\Exception $e) {
    header('location: ../index.php?page=error');
  }
?>

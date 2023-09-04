<?php
  session_start();
  include'../private/connections.php';

  //try {
    $sql = "UPDATE producten SET name = :name, catagorie = :catagorie, prijs = :prijs, voorraad = :voorraad, beschrijving = :beschrijving WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':name', $_POST['name']);
    $sth->bindParam(':catagorie', $_POST['catagorie']);
    $sth->bindParam(':prijs', $_POST['prijs']);
    $sth->bindParam(':voorraad', $_POST['voorraad']);
    $sth->bindParam(':beschrijving', $_POST['beschrijving']);
    $sth->bindParam(':id', $_SESSION['product']);
    $sth->execute();

    header('location: ../index.php?page=admin');
  /*} catch (\Exception $e) {
    header('location: ../include/error.inc.php');
  }*/
?>

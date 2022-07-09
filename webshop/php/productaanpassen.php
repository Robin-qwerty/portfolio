<?php
  include'../private/connections.php';
  session_start();

  try {
    if ($_POST['name'] == '' || $_POST['prijs'] == '' || $_POST['voorraad'] == '' || $_POST['beschrijving'] == '' || $_POST['catagorie'] == '') {
      $_SESSION['melding'] = "error, zorg er voor dat je alles invult";
      header("location: ../index.php?page=productaanpassen");
    } else {
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
    }
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, zorg er voor dat je alles goed invult";
    header("location: ../index.php?page=productaanpassen");
  }
?>

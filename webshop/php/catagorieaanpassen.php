<?php
  session_start();
  include'../private/connections.php';

  try {
    $sql = "UPDATE catagorie SET name = :name, beschrijving = :beschrijving WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':name', $_POST['name']);
    $sth->bindParam(':beschrijving', $_POST['beschrijving']);
    $sth->bindParam(':id', $_SESSION['catagorie']);
    $sth->execute();

    header('location: ../index.php?page=admin');
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, zorg er voor dat je alles goed invult";
    header("location: ../index.php?page=catagorieaanpassen");  }
?>

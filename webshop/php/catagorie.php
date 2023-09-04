<?php
  include'../private/connections.php';
  session_start();

  try {
    if ($_POST['name'] == '' || $_POST['beschrijving'] == '') {
      $_SESSION['melding'] = "error, zorg er voor dat je alles invult";
      header("location: ../index.php?page=catagorietoevoegen");
    } else {
      $sql = "INSERT INTO catagorie (name, beschrijving)
      VALUES (:name, :beschrijving)";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':name', $_POST['name']);
      $sth->bindParam(':beschrijving', $_POST['beschrijving']);
      $sth->execute();

      header('location: ../index.php?page=admin');
    }
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, zorg er voor dat je alles goed invult";
    header("location: ../index.php?page=catagorietoevoegen");
  }
?>

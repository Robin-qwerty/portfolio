<?php
  include'../private/connections.php';
  session_start();

  try {
    if ($_POST['naam'] == '' || $_POST['beschrijving'] == '') {
      $_SESSION['melding'] = "error, zorg er voor dat je alles invult";
      header("location: ../index.php?page=groepen_toevoegen");
    } elseif (str_contains($_POST['naam'], '<') || str_contains($_POST['beschrijving'], '<') ||
              str_contains($_POST['naam'], '>') || str_contains($_POST['beschrijving'], '>') ||
              str_contains($_POST['naam'], '$') || str_contains($_POST['beschrijving'], '$') ||
              str_contains($_POST['naam'], '"') || str_contains($_POST['beschrijving'], '"')) {
      $_SESSION['melding'] = "error, illegaal character gebruikt (<, >, $)";
      header("location: ../index.php?page=groepen_aanpassen");
    } else {
      $sql = "UPDATE groepen SET naam = :naam, beschrijving = :beschrijving WHERE groep_id = :groep_id";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':naam', $_POST['naam']);
      $sth->bindParam(':beschrijving', $_POST['beschrijving']);
      $sth->bindParam(':groep_id', $_SESSION['groepsid']);
      $sth->execute();

      if ($_SESSION['user'] == 'admin') {
        header('location: ../index.php?page=admin');
      } else {
        header('location: ../index.php?page=groep');
      }
    }
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, zorg er voor dat je alles goed invult";
    header("location: ../index.php?page=groepen_aanpassen");
  }
?>

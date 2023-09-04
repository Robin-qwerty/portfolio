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
      header("location: ../index.php?page=groepen_toevoegen");
    } else {
      $sql = "INSERT INTO groepen (naam, beschrijving, groepsbalans, data) VALUES (:naam, :beschrijving, '0.00', :data)";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':naam', $_POST['naam']);
      $sth->bindParam(':beschrijving', $_POST['beschrijving']);
      $sth->bindParam(':data', $_SESSION['data']);
      $sth->execute();

      $sql = "SELECT groep_id FROM groepen WHERE naam = :naam";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':naam', $_POST['naam']);
      $sth->execute();

      if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $sql = "INSERT INTO leden (groep, user, owner, uitnodiging) VALUES (:groep, :user, '1', '1')";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':groep', $row['groep_id']);
        $sth->bindParam(':user', $_SESSION['user']);
        $sth->execute();
        $_SESSION['groepsid'] = $row['groep_id'];
      } else {
        echo "string";
      }

      if ($_SESSION['user'] == 'admin') {
        header('location: ../index.php?page=admin');
      } else {
        header('location: groepenre.php?page='.$_SESSION['groepsid'].'');
      }
    }
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, zorg er voor dat je alles goed invult";
    header("location: ../index.php?page=groepen_toevoegen");
  }
?>

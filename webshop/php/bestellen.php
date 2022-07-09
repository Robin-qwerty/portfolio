<?php
  session_start();
  include'../private/connections.php';

  try {
    if ($_POST['naam'] == '' || $_POST['achternaam'] == '' || $_POST['woonplaats'] == '' || $_POST['straat'] == '' || $_POST['huisnummer'] == '' || $_POST['postcode'] == '' || $_POST['geboortendatum'] == '') {
      $_SESSION['melding'] = "error zorg er voor dat je alles goed invult";
      header("location: ../index.php?page=bestellen");
    } elseif ($_POST['woonplaats'] <= 3) {
      $_SESSION['melding'] = "error, geen geldige woonplaats";
      header("location: ../index.php?page=bestellen");
    } elseif ($_POST['huisnummer'] <= 0 || $_POST['huisnummer'] >= 999) {
      $_SESSION['melding'] = "error, geen geldige huisnummer";
      header("location: ../index.php?page=bestellen");
    }
    else {
      $_SESSION['sendtoaddres'] = $_POST['woonplaats'] . ', ' . $_POST['straat'] . ' ' . $_POST['huisnummer'] . ', ' . $_POST['postcode'];

      $sql = "INSERT INTO bestelingen (FK_userid, totprijs, FK_kortingscode, totamount, data, sendtoaddres, betaaldmet)
      VALUES (:FK_userid, :totprijs, :FK_kortingscode, :totamount, :data, :sendtoaddres, :betaaldmet)";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':FK_userid', $_SESSION['user']);
      $sth->bindParam(':totprijs', $_SESSION['totaalprijs']);
      $sth->bindParam(':FK_kortingscode', $_SESSION['kortingscode']);
      $sth->bindParam(':totamount', $_SESSION['totamount']);
      $sth->bindParam(':data', $_SESSION['data']);
      $sth->bindParam(':sendtoaddres', $_SESSION['sendtoaddres']);
      $sth->bindParam(':betaaldmet', $_POST['betaalmethode']);
      $sth->execute();

      $sql = "DELETE FROM winkelmandje WHERE FK_userid = :FK_userid";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':FK_userid', $_SESSION['user']);
      $sth->execute();

      header('location: ../index.php?page=done');
      }
  } catch (\Exception $e) {
    header('location: ../index.php?page=error');
  }
?>

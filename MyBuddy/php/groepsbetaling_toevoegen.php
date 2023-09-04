<?php
  include'../private/connections.php';
  session_start();

  try {
    if ($_POST['bedrag'] == '' ) {
      $_SESSION['melding'] = "error, zorg er voor dat je alles invult";
      header("location: ../index.php?page=groepsbetaling_toevoegen");
    } else {
      $sql = "SELECT COUNT(id) AS leden FROM leden WHERE groep = :groep";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':groep', $_SESSION['groepsid']);
      $sth->execute();

      if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        $aantal_leden = $row->leden;

        $sql = "SELECT id FROM leden WHERE groep = :groep";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':groep', $_SESSION['groepsid']);
        $sth->execute();

        while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
          $bedrag = $_POST['bedrag'] / $aantal_leden;

          $sql = "INSERT INTO groepsbetalingen (van_lid, bedrag, betaald) VALUES (:van_lid, :bedrag, 'no')";
          $sth1 = $conn->prepare($sql);
          $sth1->bindParam(':van_lid', $row->id);
          $sth1->bindParam(':bedrag', $bedrag);
          $sth1->execute();
        }
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

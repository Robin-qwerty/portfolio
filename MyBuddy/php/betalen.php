<?php
  include'../private/connections.php';
  session_start();

  try {
    $sql = 'SELECT users.user_id, users.balans, leden.id, leden.groep, groepsbetalingen.bedrag, groepsbetalingen.id FROM users INNER JOIN leden ON leden.user = :user_id INNER JOIN groepsbetalingen ON groepsbetalingen.van_lid = leden.id WHERE users.user_id = :user_id AND groepsbetalingen.id = :id';
    $sth = $conn->prepare($sql);
    $sth->bindParam(':user_id', $_SESSION['user']);
    $sth->bindParam(':id', $_GET['page']);
    $sth->execute();

    if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      if ($row->bedrag > $row->balans) {
        $_SESSION['melding'] = "error, je hebt niet genoeg geld om dit te kunnen betalen!";
        header("location: ../index.php?page=user");
      } else {
        $sql = 'UPDATE users SET balans = balans-:bedrag WHERE user_id = :user_id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':bedrag', $row->bedrag);
        $sth->bindParam(':user_id', $_SESSION['user']);
        $sth->execute();

        $sql = 'UPDATE groepen SET groepsbalans = groepsbalans+:bedrag WHERE groep_id = :groepsid';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':bedrag', $row->bedrag);
        $sth->bindParam(':groepsid', $row->groep);
        $sth->execute();

        $sql = 'UPDATE groepsbetalingen SET betaald = "yes" WHERE id = :id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $row->id);
        $sth->execute();
      }
    }

    if ($_SESSION['user'] == 'admin') {
      header('location: ../index.php?page=admin');
    } else {
      header('location: ../index.php?page=user');
    }
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, zorg er voor dat je alles goed invult";
    header("location: ../index.php?page=groepen_toevoegen");
  }
?>

<?php
  include'../private/connections.php';
  session_start();

  $sql = 'SELECT users.user_id, users.balans, groepsbetalingen.bedrag, groepsbetalingen.betaald, groepsbetalingen.van_lid, groepsbetalingen.id FROM users INNER JOIN leden ON leden.user = users.user_id INNER JOIN groepsbetalingen ON groepsbetalingen.van_lid = leden.id WHERE groepsbetalingen.id = :id';
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_GET['page']);
  $sth->execute();

  if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    if ($row->betaald == 'yes') {
      $sql = 'UPDATE users SET balans = balans+:bedrag WHERE user_id = :user_id';
      $sth = $conn->prepare($sql);
      $sth->bindParam(':bedrag', $row->bedrag);
      $sth->bindParam(':user_id', $row->user_id);
      $sth->execute();
      $sql = 'UPDATE groepen SET groepsbalans = groepsbalans-:bedrag WHERE groep_id = :groepsid';
      $sth = $conn->prepare($sql);
      $sth->bindParam(':bedrag', $row->bedrag);
      $sth->bindParam(':groepsid', $_SESSION['groepsid']);
      $sth->execute();
    }
    $sql = 'DELETE FROM groepsbetalingen WHERE id = :id';
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $row->id);
    $sth->execute();
  }

  if ($_SESSION['user'] == 'admin') {
    header('location: ../index.php?page=admin');
  } else {
    header('location: ../index.php?page=groep');
  }
?>

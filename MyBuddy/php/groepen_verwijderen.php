<?php
  session_start();
  include'../private/connections.php';

  try {
    $sql = 'DELETE FROM groepen WHERE groep_id = :groep_id';
    $sth = $conn->prepare($sql);
    $sth->bindParam(':groep_id', $_GET['page']);
    $sth->execute();

    if ($_SESSION['user'] == 'admin') {
      header('location: ../index.php?page=admin');
    } else {
      header('location: ../index.php?page=groepen');
    }
  } catch (\Exception $e) {
    header('location: ../index.php?page=error');
  }

?>

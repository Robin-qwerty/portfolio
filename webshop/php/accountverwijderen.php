<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  session_start();

  include'../private/connections.php';

  try {
      $sql = "DELETE FROM users WHERE id = :id";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':id', $_GET['page']);
      $sth->execute();
      if ($_SESSION['user'] == 'admin') {
        header('location: ../index.php?page=admin');
      } else {
        session_destroy();
        header('location: ../index.php');
      }
    } catch (\Exception $e) {
      header('location: ../index.php?page=error');
    }

?>

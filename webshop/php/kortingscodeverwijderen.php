<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  include'../private/connections.php';

  try {
    $sql = "DELETE FROM kortingscode WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_GET['page']);
    $sth->execute();

    header('location: ../index.php?page=admin');
  } catch (\Exception $e) {
    header('location: ../index.php?page=error');
  }

?>

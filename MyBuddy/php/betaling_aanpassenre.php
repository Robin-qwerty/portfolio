<?php
  session_start();

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $_SESSION['betaling'] = $_GET['page'];
  }

  header('location: ../index.php?page=betaling_aanpassen');
?>

<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  header('location: ../index.php?page=catagorieaanpassen');
  session_start();
  $_SESSION['catagorie'] = $page;
?>

<?php
  session_start();

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  $_SESSION['data'] = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset = "UTF-8">
      <title>home - Robin</title>
      <link href="css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
      <link href='https://fonts.googleapis.com/css?family=Chelsea Market' rel='stylesheet'>
  </head>
  <body>
    <?php
      include 'include/navbar.inc.php';

      if (isset($_GET['page'])) {
        include 'include/'.$page.'.inc.php';
      } else {
        include 'include/home.inc.php';
      }
    ?>
    <footer>
    </footer>
  </body>
</html>

<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  include'private/connections.php';
  session_start();

  $_SESSION['data'] = date('Y-m-d');

?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset = "UTF-8">
      <title>home - My Buddy</title>
      <link href="css/style.css" rel="stylesheet">
      <script src="script.js" defer></script>
  </head>
  <body>
    <div class="main">
    <?php include 'include/navbar.inc.php'; ?>
    </div>

    <div id="home">
      <?php include 'include/topbar.inc.php';
        //echo "<pre>", print_r($_SESSION),"</pre>";
      ?>
    </div>

    <?php
      if (isset($_GET['page'])) {
        include 'include/'.$page.'.inc.php';
      } else {
        include 'include/home.inc.php';
      }
    ?>

    <div>
      <footer>
        <p>website made by Robin</p>
      </footer>
    </div>
  </body>
</html>

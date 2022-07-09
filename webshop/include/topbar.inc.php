<div id="left2">
  <h1><span style="color:black;font-weight:bold">V</span><span style="color:#999999;font-weight:bold">&</span><span style="color:black;font-weight:bold">D</span></h1>
</div>
<div id="right2">
  <?php
    if (isset($_SESSION['user']) && ($_SESSION['user']) == 'admin') {
      echo '<h3><span style="color:black;font-weight:bold">je bent ingelogd als admin</span> <a href="index.php?page=admin" class="button">admin page</a></h3>';
    }  elseif (isset($_SESSION['user'])) {
      echo '<h3><span style="color:black;font-weight:bold">je bent ingelogd als user</span> <a href="index.php?page=winkelmandje" class="button">winkelmandje</a></h3>';
    }  else {
      echo '<h3><span style="color:black;font-weight:bold">je bent niet ingelogd</span> <a href="index.php?page=inloggen" class="button">inloggen?</a></h3>';
    }
  ?>
</div>

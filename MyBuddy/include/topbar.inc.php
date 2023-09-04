<div id="left2">
<div id="name"><h1><a href="index.php?page=home" class="projectc">MyBuddy</a></h1></div>
</div>
<div id="right2">
  <?php
    if (isset($_SESSION['user']) && ($_SESSION['user']) == 'admin') {
      echo '<h3><span style="color:black;font-weight:bold">je bent ingelogd als admin</span> <a href="index.php?page=admin" class="button">admin page</a></h3>';
    }  elseif (isset($_SESSION['user'])) {
      echo '<h3><span style="color:black;font-weight:bold">je bent ingelogd als user</span> <a href="index.php?page=user" class="button">account bekijken</a></h3>';
    }  else {
      echo '<h3><span style="color:black;font-weight:bold">je bent niet ingelogd</span> <a href="index.php?page=inloggen" class="button">inloggen?</a></h3>';
    }
  ?>
</div>

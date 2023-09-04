<div class="sidenav">
  <div id="name"><h1><a href="index.php?page=home" class="projectc">MyBuddy</a></h1></div>
  <a href="index.php?page=home">Home</a>
  <a href="index.php?page=groepen">groepen</a>

<?php
  if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
    echo '<a href="index.php?page=admin">admin page</a>';
  } elseif (isset($_SESSION['user'])) {
    echo '<a href="index.php?page=user">account</a>';
  } else {
  }
?>

<?php
  if (isset($_SESSION['user'])) {
    echo '<a href="php/uitloggen.php">uitloggen</a>';
  } else {
    echo '<a href="index.php?page=inloggen">inloggen</a>';
  }
?>

  <div id="media">
    <p>Our social media:</p>
    <a href="https://youtube.com/" target="_blank"><img src="media/youtube.png" alt="youtube" style="width:42px;height:42px;"></a>
    <a href="https://instagram.com/" target="_blank"><img src="media/insta.png" alt="youtube" style="width:42px;height:42px;"></a>
    <a href="https://facebook.com/" target="_blank"><img src="media/facebook.png" alt="youtube" style="width:42px;height:42px;"></a>
  </div>
</div>

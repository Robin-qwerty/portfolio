<?php
  if (isset($_SESSION['melding'])) {
    echo '<h2 style="color: red;"><b>'.$_SESSION['melding'].'</b></h2>';
    unset($_SESSION['melding']);
  }
?>

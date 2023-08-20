<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home - Robin</title>
    <link href="style/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.0-beta.3/dist/iconify-icon.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Chelsea Market' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@2000&display=swap" rel="stylesheet"> -->
  </head>
  <body>

    <?php
    $home = 'index.php?page=home';

    include 'include/navbar.inc.php';

    try {
      if (isset($page)) {
        if ($page == 'footer' || $page == 'navbar') {
          echo '<meta http-equiv="refresh" content="0; url='.$home.'" />';
        } else {
          include 'include/'.$page.'.inc.php';
        }
      } else {
        include 'include/home.inc.php';
      }
    } catch (\Exception $e) {
      echo '<meta http-equiv="refresh" content="0; url='.$home.'" />';
    }

    if (isset($page) && $page != 'home') {
      include 'include/footer.inc.php';
    }
    ?>

  </body>
</html>

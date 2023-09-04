<?php
  ob_start(); // start output buffering

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
    <link href='https://fonts.googleapis.com/css?family=Chelsea Market' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.0-beta.3/dist/iconify-icon.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="script/language.js"></script>
  <head>
  <body>

    <?php
    $home = 'index.php?page=home';

    include 'include/navbar.inc.php';

    try {
      if (isset($page)) {
        if ($page == 'navbar') {
          header('location: index.php?page=home');
          exit;
        } elseif ($page == 'footer') {
          header('location: index.php?page=contact');
          exit;
        } else {
          $filename = 'include/' . $page . '.inc.php';
          if (!file_exists($filename)) {
            throw new Exception('File not found');
          }
          include $filename;
        }
      } else {
        include 'include/home.inc.php';
      }
    } catch (\Exception $e) {
      header('location: index.php?page=home');
      exit;
    }

    if (isset($page) && $page != 'home') {
      include 'include/footer.inc.php';
    }
    ?>

    <?php ob_end_flush(); // end output buffering and send output ?>
  </body>
</html>

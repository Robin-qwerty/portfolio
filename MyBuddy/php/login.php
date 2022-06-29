<?php
session_start();

include'../private/connections.php';

try {
  if (str_contains($_POST['email'], '<') || str_contains($_POST['password'], '<') ||
      str_contains($_POST['email'], '>') || str_contains($_POST['password'], '>') ||
      str_contains($_POST['email'], '$') || str_contains($_POST['password'], '$') ||
      str_contains($_POST['email'], '"') || str_contains($_POST['password'], '"')) {
    $_SESSION['melding'] = "error, illegaal character gebruikt (<, >, $)";
    header("location: ../index.php?page=groepen_toevoegen");
  } else {
    $sql = "SELECT user_id, roll FROM users WHERE email = :username AND password = :password";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':username', $_POST['email']);
    $sth->bindParam(':password', $_POST['password']);
    $sth->execute();

    if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {
      if ($rsUser['roll'] == 'admin') {
        $_SESSION['user'] = $rsUser['roll'];
        header('location: ../index.php?page=admin');
      } else {
        $_SESSION['user'] = $rsUser['user_id'];
        header('location: ../index.php?page=user');
      }
    } else {
      header('location: ../index.php?page=inloggen');
      $_SESSION['melding'] = 'Geen geldige inlog, probeer het opnieuw!';
    }
  }
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, er iets mis gegaan, probeer het later opnieuw";
    header("location: ../index.php?page=inloggen");
  }
?>

<?php
session_start();

include'../private/connections.php';

try {
  $sql = "SELECT id,roll FROM users WHERE email = :username AND password = :password";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':username', $_POST['email']);
  $sth->bindParam(':password', $_POST['password']);
  $sth->execute();

  if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {
    if ($rsUser['roll'] == 'admin') {
      $_SESSION['user'] = $rsUser['roll'];
      header('location: ../index.php?page=admin');
    } else {
      $_SESSION['user'] = $rsUser['id'];
      header('location: ../index.php?page=user');
    }
  } else {
    header('location: ../index.php?page=inloggen');
    $_SESSION['melding'] = 'Geen geldige inlog, probeer het opnieuw!';
  }
} catch (\Exception $e) {
  header('location: ../index.php?page=error');
}

?>

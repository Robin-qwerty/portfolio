<?php
  session_start();
  include'../private/connections.php';


  try {
    if ($_POST['name'] == '' || $_POST['achternaam'] == '' || $_POST['bankrekeningnummer'] == '' || $_POST['email'] == '' || $_POST['psw'] == '') {
      $_SESSION['melding'] = "error, zorg er voor dat je alles goed invult";
      header("location: ../index.php?page=aanmelden");
    } elseif (str_contains($_POST['name'], '<') || str_contains($_POST['achternaam'], '<') || str_contains($_POST['bankrekeningnummer'], '<') || str_contains($_POST['email'], '<') || str_contains($_POST['psw'], '<') ||
              str_contains($_POST['name'], '>') || str_contains($_POST['achternaam'], '>') || str_contains($_POST['bankrekeningnummer'], '>') || str_contains($_POST['email'], '>') || str_contains($_POST['psw'], '>') ||
              str_contains($_POST['name'], '$') || str_contains($_POST['achternaam'], '$') || str_contains($_POST['bankrekeningnummer'], '$') || str_contains($_POST['email'], '$') || str_contains($_POST['psw'], '$') ||
              str_contains($_POST['name'], '"') || str_contains($_POST['achternaam'], '"') || str_contains($_POST['bankrekeningnummer'], '"') || str_contains($_POST['email'], '"') || str_contains($_POST['psw'], '"') ) {
      $_SESSION['melding'] = "error, illegaal character gebruikt (<, >, $)";
      header("location: ../index.php?page=aanmelden");
    } elseif ($_POST['email'] == 'admin') {
      $_SESSION['melding'] = "error, email mag niet admin zijn";
      header("location: ../index.php?page=aanmelden");
    }
    else {
      $sql = "INSERT INTO users (roll, name, tussenvoegsel, achternaam, bankrekeningnummer, email, password, balans)
      VALUES (:roll, :name, :tussenvoegsel, :achternaam, :bankrekeningnummer, :username, :password, '0.00')";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':roll', $_POST['email']);
      $sth->bindParam(':username', $_POST['email']);
      $sth->bindParam(':password', $_POST['psw']);
      $sth->bindParam(':name', $_POST['name']);
      $sth->bindParam(':tussenvoegsel', $_POST['tussenvoegsel']);
      $sth->bindParam(':achternaam', $_POST['achternaam']);
      $sth->bindParam(':bankrekeningnummer', $_POST['bankrekeningnummer']);
      $sth->execute();
      if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
        header('location: ../index.php?page=admin');
      } else {
        $sql = "SELECT user_id FROM users WHERE email = :username";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':username', $_POST['email']);
        $sth->execute();
        if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {
          $_SESSION['user'] = $rsUser['user_id'];
          header('location: ../index.php?page=user');
        }
      }
    }
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, zorg er voor dat de dingen die je invult niet te lang zijn";
    header("location: ../index.php?page=aanmelden");
  }
?>

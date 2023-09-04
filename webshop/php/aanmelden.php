<?php
  session_start();
  include'../private/connections.php';


  // try {
    if ($_POST['naam'] == '' || $_POST['achternaam'] == '' || $_POST['woonplaats'] == '' || $_POST['straat'] == '' || $_POST['huisnummer'] == '' || $_POST['postcode'] == '' || $_POST['geboortendatum'] == '' || $_POST['email'] == '' || $_POST['psw'] == '') {
      $_SESSION['melding'] = "error zorg er voor dat je alles goed invult";
      header("location: ../index.php?page=aanmelden");
    } elseif (str_contains($_POST['naam'], '<') || str_contains($_POST['achternaam'], '<') || str_contains($_POST['woonplaats'], '<') || str_contains($_POST['straat'], '<') || str_contains($_POST['huisnummer'], '<') || str_contains($_POST['postcode'], '<') || str_contains($_POST['email'], '<') || str_contains($_POST['psw'], '<') ||
              str_contains($_POST['naam'], '>') || str_contains($_POST['achternaam'], '>') || str_contains($_POST['woonplaats'], '>') || str_contains($_POST['straat'], '>') || str_contains($_POST['huisnummer'], '>') || str_contains($_POST['postcode'], '>') || str_contains($_POST['email'], '>') || str_contains($_POST['psw'], '>') ||
              str_contains($_POST['naam'], '$') || str_contains($_POST['achternaam'], '$') || str_contains($_POST['woonplaats'], '$') || str_contains($_POST['straat'], '$') || str_contains($_POST['huisnummer'], '$') || str_contains($_POST['postcode'], '$') || str_contains($_POST['email'], '$') || str_contains($_POST['psw'], '$') ||
              str_contains($_POST['naam'], '"') || str_contains($_POST['achternaam'], '"') || str_contains($_POST['woonplaats'], '"') || str_contains($_POST['straat'], '$') || str_contains($_POST['huisnummer'], '$') || str_contains($_POST['postcode'], '$') || str_contains($_POST['email'], '"') || str_contains($_POST['psw'], '"') ) {
      $_SESSION['melding'] = "error, illegaal character gebruikt (<, >, $)";
      header("location: ../index.php?page=aanmelden");
    }elseif ($_POST['geboortendatum'] ='') {
      $_SESSION['melding'] = "error, geen geldige geboortendatum";
      header("location: ../index.php?page=aanmelden");
    } 
    // elseif ($_POST['huisnummer'] <= 1 || $_POST['huisnummer'] >= 999) {
    //   $_SESSION['melding'] = "error, geen geldige huisnummer";
    //   header("location: ../index.php?page=aanmelden");
    // }
    else {
      $sql = "INSERT INTO users (roll, naam, tussenvoegsel, achternaam, woonplaats, straat, huisnummer, postcode, email, password)
      VALUES (:roll, :naam, :tussenvoegsel, :achternaam, :woonplaats, :straat, :huisnummer, :postcode, :username, :password)";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':roll', $_POST['email']);
      $sth->bindParam(':username', $_POST['email']);
      $sth->bindParam(':password', $_POST['psw']);
      $sth->bindParam(':naam', $_POST['naam']);
      $sth->bindParam(':tussenvoegsel', $_POST['tussenvoegsel']);
      $sth->bindParam(':achternaam', $_POST['achternaam']);
      $sth->bindParam(':woonplaats', $_POST['woonplaats']);
      $sth->bindParam(':straat', $_POST['straat']);
      $sth->bindParam(':huisnummer', $_POST['huisnummer']);
      $sth->bindParam(':postcode', $_POST['postcode']);
      $sth->execute();
      if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
        header('location: ../index.php?page=admin');
      } else {
        $sql = "SELECT id FROM users WHERE email = :username";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':username', $_POST['email']);
        $sth->execute();
        if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {
          $_SESSION['user'] = $rsUser['id'];
          header('location: ../index.php?page=user');
        }
      }
    }
  // } catch (\Exception $e) {
  //   header('location: ../index.php?page=error');
  // }
?>

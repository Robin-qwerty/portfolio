<?php
  include'../private/connections.php';
  session_start();

  if ($_POST['bedrag'] == '' ) {
    $_SESSION['melding'] = "error, zorg er voor dat je alles invult";
    header("location: ../index.php?page=balans_toevoegen");
  } else {
    $sql = "SELECT balans FROM users WHERE user_id = :user_id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':user_id', $_SESSION['user']);
    $sth->execute();

    if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      $_SESSION['balans'] = $_POST['bedrag'] + $row->balans;
      if ($_SESSION['balans'] >= '100000000') {
        $_SESSION['melding'] = "error, het bedrag dat je hebt ingevuld + je balans mag niet grooter zijn dan 100000000";
        header("location: ../index.php?page=balans_toevoegen");
      } else {
        $sql = "UPDATE users SET balans = :bedrag WHERE user_id = :user_id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':user_id', $_SESSION['user']);
        $sth->bindParam(':bedrag', $_SESSION['balans']);
        $sth->execute();

        if ($_SESSION['user'] == 'admin') {
          header('location: ../index.php?page=admin');
        } else {
          header('location: ../index.php?page=user');
        }
      }
    }
  }
?>

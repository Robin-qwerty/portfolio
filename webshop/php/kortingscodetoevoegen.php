<?php
  include'../private/connections.php';
  session_start();

  try {
    if ($_POST['Kortingscode'] == '' || $_POST['waarde'] == '') {
      $_SESSION['melding'] = "error, zorg er voor dat je alles invult";
      header("location: ../index.php?page=kortingscodetoevoegen");
    } else {
      $sql = "INSERT INTO kortingscode (kortingscode, waarde)
      VALUES (:kortingscode, :waarde)";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':kortingscode', $_POST['kortingscode']);
      $sth->bindParam(':waarde', $_POST['waarde']);
      $sth->execute();

      header('location: ../index.php?page=admin');
    }
  } catch (\Exception $e) {
    $_SESSION['melding'] = "error, zorg er voor dat je alles goed invult";
    header("location: ../index.php?page=kortingscodetoevoegen");
  }
?>

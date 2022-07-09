<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  session_start();
  include'../private/connections.php';

  $sql = "SELECT id FROM TBUsers WHERE gereseveerd = :boek";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':boek', $_GET['page']);
  $sth->execute();

  if ($rsGereseveerd = $sth->fetch(PDO::FETCH_ASSOC)) {

    $sql = "SELECT leenboek1,leenboek2,leenboek3,gereseveerd FROM TBUsers WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_SESSION['user']);
    $sth->execute();

      if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {

        if ($_GET['page'] == $rsUser['leenboek1']) {
          $sql = "UPDATE TBUsers SET leenboek1 = :leenboek1, inleverdata1 = :inleverdata1 WHERE id = :id";
          $sth = $conn->prepare($sql);
          $sth->bindParam(':leenboek1', $_SESSION['null']);
          $sth->bindParam(':inleverdata1', $_SESSION['null']);
          $sth->bindParam(':id', $_SESSION['user']);
          $sth->execute();

          $sql = "UPDATE TBUsers SET gereseveerd = :gereseveerd, leenboek1 = :leenboek1, inleverdata1 = :inleverdata1 WHERE id = :id";
          $sth = $conn->prepare($sql);
          $sth->bindParam(':id', $rsGereseveerd['id']);
          $sth->bindParam(':gereseveerd', $_SESSION['null']);
          $sth->bindParam(':leenboek1', $_GET['page']);
          $sth->bindParam(':inleverdata1', $_SESSION['data']);
          $sth->execute();

          header("location: ../index.php?page=user");
        } elseif ($_GET['page'] == $rsUser['leenboek2']) {
          $sql = "UPDATE TBUsers SET leenboek2 = :leenboek2, inleverdata2 = :inleverdata2 WHERE id = :id";
          $sth = $conn->prepare($sql);
          $sth->bindParam(':leenboek2', $_SESSION['null']);
          $sth->bindParam(':inleverdata2', $_SESSION['null']);
          $sth->bindParam(':id', $_SESSION['user']);
          $sth->execute();

          $sql = "UPDATE TBUsers SET gereseveerd = :gereseveerd, leenboek2 = :leenboek2, inleverdata2 = :inleverdata2 WHERE id = :id";
          $sth = $conn->prepare($sql);
          $sth->bindParam(':id', $rsGereseveerd['id']);
          $sth->bindParam(':gereseveerd', $_SESSION['null']);
          $sth->bindParam(':leenboek2', $_GET['page']);
          $sth->bindParam(':inleverdata2', $_SESSION['data']);
          $sth->execute();

          header("location: ../index.php?page=user");
        } elseif ($_GET['page'] == $rsUser['leenboek3']) {
          $sql = "UPDATE TBUsers SET leenboek3 = :leenboek3, inleverdata3 = :inleverdata3 WHERE id = :id";
          $sth = $conn->prepare($sql);
          $sth->bindParam(':leenboek3', $_SESSION['null']);
          $sth->bindParam(':inleverdata3', $_SESSION['null']);
          $sth->bindParam(':id', $_SESSION['user']);
          $sth->execute();

          $sql = "UPDATE TBUsers SET gereseveerd = :gereseveerd, leenboek3 = :leenboek3, inleverdata3 = :inleverdata3 WHERE id = :id";
          $sth = $conn->prepare($sql);
          $sth->bindParam(':id', $rsGereseveerd['id']);
          $sth->bindParam(':gereseveerd', $_SESSION['null']);
          $sth->bindParam(':leenboek3', $_GET['page']);
          $sth->bindParam(':inleverdata3', $_SESSION['data']);
          $sth->execute();

          header('location: ../index.php?page=user');
        }
      }
    } else {

    }

?>

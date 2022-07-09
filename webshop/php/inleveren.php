<?php
try {

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
      header('location: heruitlenen.php?page='.$_GET['page'].'');
    } else {
      $sql = "SELECT voorraad FROM TBBoeken WHERE titel = :titel";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':titel', $_GET['page']);
      $sth->execute();

      if ($rsBoek = $sth->fetch(PDO::FETCH_ASSOC)) {

        $_SESSION['voorraad'] = $rsBoek['voorraad'] + 1;


        $sql = "SELECT leenboek1,leenboek2,leenboek3,leenboek4,leenboek5,gereseveerd FROM TBUsers WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_SESSION['user']);
        $sth->execute();

          if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {

            if ($_GET['page'] == $rsUser['leenboek1']) {
              $sql = "UPDATE TBUsers SET leenboek1 = :leenboek1, inleverdata1 = :inleverdata WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':leenboek1', $_SESSION['null']);
              $sth->bindParam(':inleverdata', $_SESSION['null']);
              $sth->bindParam(':id', $_SESSION['user']);
              $sth->execute();

              $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':id', $_SESSION['boek']);
              $sth->bindParam(':voorraad', $_SESSION['voorraad']);
              $sth->execute();

              header("location: ../index.php?page=user");
            } elseif ($_GET['page'] == $rsUser['leenboek2']) {
              $sql = "UPDATE TBUsers SET leenboek2 = :titel, inleverdata2 = :inleverdata WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':titel', $_SESSION['null']);
              $sth->bindParam(':inleverdata', $_SESSION['null']);
              $sth->bindParam(':id', $_SESSION['user']);
              $sth->execute();

              $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':id', $_SESSION['boek']);
              $sth->bindParam(':voorraad', $_SESSION['voorraad']);
              $sth->execute();

              header("location: ../index.php?page=user");
            } elseif ($_GET['page'] == $rsUser['leenboek3']) {
              $sql = "UPDATE TBUsers SET leenboek3 = :titel, inleverdata3 = :inleverdata WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':titel', $_SESSION['null']);
              $sth->bindParam(':inleverdata', $_SESSION['null']);
              $sth->bindParam(':id', $_SESSION['user']);
              $sth->execute();

              $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':id', $_SESSION['boek']);
              $sth->bindParam(':voorraad', $_SESSION['voorraad']);
              $sth->execute();

              header('location: ../index.php?page=user');
            } elseif ($_GET['page'] == $rsUser['leenboek4']) {
              $sql = "UPDATE TBUsers SET leenboek4 = :titel, inleverdata4 = :inleverdata WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':titel', $_SESSION['null']);
              $sth->bindParam(':inleverdata', $_SESSION['null']);
              $sth->bindParam(':id', $_SESSION['user']);
              $sth->execute();

              $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':id', $_SESSION['boek']);
              $sth->bindParam(':voorraad', $_SESSION['voorraad']);
              $sth->execute();

              header('location: ../index.php?page=user');
            } elseif ($_GET['page'] == $rsUser['leenboek5']) {
              $sql = "UPDATE TBUsers SET leenboek5 = :titel, inleverdata5 = :inleverdata WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':titel', $_SESSION['null']);
              $sth->bindParam(':inleverdata', $_SESSION['null']);
              $sth->bindParam(':id', $_SESSION['user']);
              $sth->execute();

              $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
              $sth = $conn->prepare($sql);
              $sth->bindParam(':id', $_SESSION['boek']);
              $sth->bindParam(':voorraad', $_SESSION['voorraad']);
              $sth->execute();

              header('location: ../index.php?page=user');
            } elseif ($rsUser['gereseveerd'] == '') {
              header('location: reserveren.php?page='.$_GET['page'].'');
            } else {
              echo "<h3>error: probeer het later opnieuw!</h3>";
              echo '<a href="../index.php?page=user" class="neon-button">home page</a>';
            }
          }
        } else {
          //header('location: ../index.php?page=error');
        }
    }

  } catch (\Exception $e) {
    header('location: ../include/error.inc.php');
  }
?>

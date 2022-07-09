<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  session_start();
  include'../private/connections.php';

  $sql = "SELECT titel,voorraad FROM TBBoeken WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_GET['page']);
  $sth->execute();

  if ($rsBoek = $sth->fetch(PDO::FETCH_ASSOC)) {

    $_SESSION['voorraad'] = $rsBoek['voorraad'] - 1;

    //echo 'ok: '.$_SESSION['voorraad'].'..';

    $sql = "SELECT leenboek1,leenboek2,leenboek3,leenboek4,leenboek5,gereseveerd FROM TBUsers WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_SESSION['user']);
    $sth->execute();

    if ($rsUser = $sth->fetch(PDO::FETCH_ASSOC)) {
      if ($rsUser['leenboek1'] == '') {
        $sql = "UPDATE TBUsers SET leenboek1 = :titel, inleverdata1 = :inleverdata WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':titel', $rsBoek['titel']);
        $sth->bindParam(':inleverdata', $_SESSION['data']);
        $sth->bindParam(':id', $_SESSION['user']);
        $sth->execute();

        $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_GET['page']);
        $sth->bindParam(':voorraad', $_SESSION['voorraad']);
        $sth->execute();

        header('location: ../index.php?page=user');
      } elseif ($rsUser['leenboek2'] == '') {
        $sql = "UPDATE TBUsers SET leenboek2 = :titel, inleverdata2 = :inleverdata WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':titel', $rsBoek['titel']);
        $sth->bindParam(':inleverdata', $_SESSION['data']);
        $sth->bindParam(':id', $_SESSION['user']);
        $sth->execute();

        $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_GET['page']);
        $sth->bindParam(':voorraad', $_SESSION['voorraad']);
        $sth->execute();

        header('location: ../index.php?page=user');
      } elseif ($rsUser['leenboek3'] == '') {
        $sql = "UPDATE TBUsers SET leenboek3 = :titel, inleverdata3 = :inleverdata WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':titel', $rsBoek['titel']);
        $sth->bindParam(':inleverdata', $_SESSION['data']);
        $sth->bindParam(':id', $_SESSION['user']);
        $sth->execute();

        $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_GET['page']);
        $sth->bindParam(':voorraad', $_SESSION['voorraad']);
        $sth->execute();

        header('location: ../index.php?page=user');
      } elseif ($rsUser['leenboek4'] == '') {
        $sql = "UPDATE TBUsers SET leenboek4 = :titel, inleverdata4 = :inleverdata WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':titel', $rsBoek['titel']);
        $sth->bindParam(':inleverdata', $_SESSION['data']);
        $sth->bindParam(':id', $_SESSION['user']);
        $sth->execute();

        $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_GET['page']);
        $sth->bindParam(':voorraad', $_SESSION['voorraad']);
        $sth->execute();

        header('location: ../index.php?page=user');
      } elseif ($rsUser['leenboek5'] == '') {
        $sql = "UPDATE TBUsers SET leenboek5 = :titel, inleverdata5 = :inleverdata WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':titel', $rsBoek['titel']);
        $sth->bindParam(':inleverdata', $_SESSION['data']);
        $sth->bindParam(':id', $_SESSION['user']);
        $sth->execute();

        $sql = "UPDATE TBBoeken SET voorraad = :voorraad WHERE id = :id";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':id', $_GET['page']);
        $sth->bindParam(':voorraad', $_SESSION['voorraad']);
        $sth->execute();

        header('location: ../index.php?page=user');
      }
      elseif ($rsUser['gereseveerd'] == '') {
        header('location: reserveren.php?page='.$_GET['page'].'');
      } else {
        echo "<h3>error: je hebt geen plek meer om een boek te lenen of te reserveren!</h3>";
        echo '<a href="../index.php?page=user" class="neon-button">home page</a>';
      }
    } else {
      header('location: ../index.php?page=error');
    }
  }


?>

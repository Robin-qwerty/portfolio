<div id="boek_2">
  <table>

  <?php
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
    }

    $sql = "SELECT * FROM users WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_SESSION['user']);
    $sth->execute();

    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      echo '<h1>'.$row->naam.' dit is jouw winkelmandje</h1>';
    }

    include 'php/error.php';

    $sql = "SELECT * FROM winkelmandje WHERE FK_userid = :FK_userid";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':FK_userid', $_SESSION['user']);
    $sth->execute();

    if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      echo '
      <tr>
        <th>product(en)</th>
        <th>prijs(en)</th>
        <th>aantal(en)</th>
      </tr>';
    }

    $sql = "SELECT * FROM winkelmandje WHERE FK_userid = :FK_userid";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':FK_userid', $_SESSION['user']);
    $sth->execute();

    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      if ($row->product == '') {
        echo'<div id="middle"><h1><b>Jouw winkelmandje is nog leeg</b></h1></div>';
      } else {
        echo '
            <tr>
              <td>'.$row->product.'</td>
              <td>'.$row->prijs.'</td>
              <td><a class="aanpassenbutton" href="php/plus.php?page='.$row->FK_productid.'">&#x2b;</a>  '.$row->amount.'  <a class="aanpassenbutton" href="';
            if ($row->amount >= 2) {echo 'php/min.php?page='.$row->FK_productid.'';} else {echo'#';}


        echo'
        ">&#x2212;</a></td>
            <td><a onclick="winkelmandjeitem'.$row->id.'()" class="deletebutton">verwijderen</a>

            <script>
              function winkelmandjeitem'.$row->id.'() {
                var txt;
                if (confirm("Weet je zeker dat je dit product wil verwijderen!?")) {
                  window.location.href = "php/winkelmandjeitemverwijderen.php?page='.$row->id.'";
                }
              }
            </script>
          </tr>
        ';
      }
    }

    $sql = "SELECT * FROM winkelmandje WHERE FK_userid = :FK_userid";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':FK_userid', $_SESSION['user']);
    $sth->execute();

    if ($row = $sth->fetch(PDO::FETCH_OBJ)) {

      $sql = "  SELECT COUNT(FK_userid) AS totproduct FROM winkelmandje WHERE FK_userid = :FK_userid;";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':FK_userid', $_SESSION['user']);
      $sth->execute();

      if ($totproduct = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '
          <tr>
            <td>'.$totproduct->totproduct.'</td>
        ';
      }

      $_SESSION['prijs'] = 0;
      $_SESSION['amount'] = 0;

      $sql = "SELECT * FROM winkelmandje WHERE FK_userid = :FK_userid";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':FK_userid', $_SESSION['user']);
      $sth->execute();

      while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        $_SESSION['prijs'] = $_SESSION['prijs'] + $row->prijs * $row->amount;
        $_SESSION['amount'] = $_SESSION['amount'] + $row->amount;
      }

      $_SESSION['totprijs'] = $_SESSION['prijs'];
      $_SESSION['totaalprijs'] = $_SESSION['totprijs'] + 4.99;
      $_SESSION['totamount'] = $_SESSION['amount'];

      echo'
        <td>€'.$_SESSION['totprijs'].'</td>
        <td>'.$_SESSION['totamount'].'</td>
      <tr>';

      echo '</table><h3><a href="index.php?page=kortingscodeinvullen" class="button">bestellen</a> </h3>';
    } else {
      echo '</table><h4><a href="#" class="button">winkelmandje is nog leeg</a> </h4>';
    }
  ?>
</div>

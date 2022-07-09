<div id="boek_2">
  <?php
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
    }

    $sql = "SELECT * FROM users WHERE id = :id";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':id', $_SESSION['user']);
    $sth->execute();

    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      echo '<h1>'.$row->naam.' dit zijn jouw bestellingen</h1>';
    }

    $sql = "SELECT * FROM bestelingen WHERE FK_userid = :FK_userid";
    $sth = $conn->prepare($sql);
    $sth->bindParam(':FK_userid', $_SESSION['user']);
    $sth->execute();

    if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      echo '
      <h2>Jouw bestellingen</h2>

      <table>
        <tr>
          <th>datum van besteling</th>
          <th>totaal aantal product(en)</th>
          <th>totaal prijs</th>
          <th>kortingscode</th>
          <th>verstuurd naar</th>
          <th>betaald met</th>
        </tr>';

      $sql = "SELECT * FROM bestelingen WHERE FK_userid = :FK_userid";
      $sth = $conn->prepare($sql);
      $sth->bindParam(':FK_userid', $_SESSION['user']);
      $sth->execute();

      while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '
            <tr>
              <td>'.$row->data.'</td>
              <td>'.$row->totamount.'</td>
              <td>€ '.$row->totprijs.'</td>
              <td>'.$row->FK_kortingscode.'</td>
              <td>'.$row->sendtoaddres.'</td>
              <td>'.$row->betaaldmet.'</td>
            </tr>
        ';
      }
      echo '</table>';
    } else {
      echo'<div id="middle"><h2><b>je hebt nog geen bestelingen geplaast</b></h2></div>';
    }
  ?>
</div>

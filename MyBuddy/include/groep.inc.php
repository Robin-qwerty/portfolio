<?php
  echo '
  <div id="boek_1">
    <div id="left">
    <p>';
      $sql = 'SELECT * FROM leden WHERE groep = :groep AND user = :user';
      $sth = $conn->prepare($sql);
      $sth->bindParam(':groep', $_SESSION['groepsid']);
      $sth->bindParam(':user', $_SESSION['user']);
      $sth->execute();

      if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
        $owner = $row->owner;
        if ($row->owner == '1') {
          echo '<a href="index.php?page=groepsbetaling_toevoegen" class="button">groepsbetaling toevoegen</a>
          <a href="index.php?page=groepen_aanpassen" class="button">bewerken</a>
          <a href="index.php?page=ledenuitnodigen" class="button">leden uitnodigen</a>
          <a onclick="groepverwijderen()" class="deletebutton">groep verwijderen</a>

          <script>
            function groepverwijderen() {
              var txt;
              if (confirm("Weet je zeker dat je deze groep wil verwijderen!?")) {
                window.location.href = "php/groepen_verwijderen.php?page='.$_SESSION['groepsid'].'";
              }
            }
          </script>';
        } elseif ($row->owner == '2') {
          echo '<a href="index.php?page=groepsbetaling_toevoegen" class="button">groepsbetaling toevoegen</a>
          <a href="index.php?page=groepen_aanpassen" class="button">bewerken</a>
          <a href="index.php?page=ledenuitnodigen" class="button">leden uitnodigen</a>';
        }
      } elseif ($_SESSION["user"] == 'admin') {
        echo '<a href="index.php?page=groepsbetaling_toevoegen" class="button">groepsbetaling toevoegen</a>
        <a href="index.php?page=groepen_aanpassen" class="button">bewerken</a>
        <a href="index.php?page=ledenuitnodigen" class="button">leden uitnodigen</a>
        <a onclick="groepverwijderen()" class="deletebutton">groep verwijderen</a>

        <script>
          function groepverwijderen() {
            var txt;
            if (confirm("Weet je zeker dat je deze groep wil verwijderen!?")) {
              window.location.href = "php/groepen_verwijderen.php?page='.$_SESSION['groepsid'].'";
            }
          }
        </script>';
      }

      echo '
      <p>
      <hr>
      <h2>groeps betalingen</h2>
      <p>
      <table>
        <tr>
          <th><h3>van user</h3></th>
          <th><h3>bedrag</h3></th>
          <th><h3>betaald</h3></th>
        </tr>';
      $sql = 'SELECT groepsbetalingen.id, groepsbetalingen.bedrag, groepsbetalingen.betaald, users.name FROM groepsbetalingen INNER JOIN leden ON leden.id = groepsbetalingen.van_lid INNER JOIN users ON users.user_id = leden.user WHERE leden.groep = :groep';
      $sth = $conn->prepare($sql);
      $sth->bindParam(':groep', $_SESSION['groepsid']);
      $sth->execute();

        while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
          if ($row->uitnodiging = '1') {
            echo '
              <tr>
                <td>'.$row->name.'</td>
                <td>'.$row->bedrag.'</td>
                <td>'.$row->betaald.'</td>';
                if (isset($owner) && $owner == '1' || isset($owner) && $owner == '2' || $_SESSION['user'] == 'admin') {
                  echo'
                  <td><a href="php/betaling_aanpassenre.php?page='.$row->id.'" class="aanpassenbutton">aanpassen</a>
                  <td><a onclick="betaling_verwijderen'.$row->id.'()" class="deletebutton">verwijderen</a>';
                }
              echo'
              </tr>
              <script>
              function betaling_verwijderen'.$row->id.'() {
                var txt;
                if (confirm("Weet je zeker dat je deze bataling wilt verwijderen!?")) {
                  window.location.href = "php/betaling_verwijderen.php?page='.$row->id.'";
                }
              }
              </script>
            ';
          }
        }
        echo '
            </table>
          </div>
          <p>
          <div id="right">
          <p><h1>';
          echo '
          <p>
          <hr>
          <h2>groeps leden</h2>
          <p>
          <table>
            <tr>
              <th><h3>user</h3></th>
            </tr>';
          $sql = 'SELECT leden.user, leden.owner, users.name, users.tussenvoegsel, users.achternaam FROM leden INNER JOIN users ON users.user_id = leden.user WHERE leden.groep = :groep AND leden.uitnodiging = 1';
          $sth = $conn->prepare($sql);
          $sth->bindParam(':groep', $_SESSION['groepsid']);
          $sth->execute();

            while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
              echo '
                <tr>
                  <td>'.$row->name.' '.$row->tussenvoegsel.' '.$row->achternaam.'</td>';
                  if ($row->owner == 1) {
                    echo'<td>owner</td>';
                  } elseif ($row->owner == 0) {
                    echo'<td>lid</td>';
                  } elseif ($row->owner == 2) {
                    echo'<td>co-owner</td>';
                  }
                echo '
                </tr>
              ';
            }
            echo '
            </table>
          </div>
        </div> 21
          ';
        $sql = 'SELECT groepen.naam, groepen.beschrijving, groepen.groepsbalans, groepen.data, users.name, leden.user, leden.owner FROM ((leden INNER JOIN groepen ON groepen.groep_id = leden.groep) INNER JOIN users ON users.user_id = leden.user) WHERE groepen.groep_id = :groep_id ';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':groep_id', $_SESSION['groepsid']);
        $sth->execute();

        if ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      echo'

    <div id="boek_2">
      <div id="midel2">
        <h1>'.$row->naam.'</h1>
        <h2>groeps balans: € '.$row->groepsbalans.'</h2>
        <p>owner: '.$row->name.'</p>
        <p>beschrijving: '.$row->beschrijving.'</p>
        <p>aangemaakt op: '.$row->data.'</p>
      </div>
    </div>
    ';
  }
?>

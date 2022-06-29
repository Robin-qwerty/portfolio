<div id="boek_2">
  <?
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];
    }

    include'private/connections.php';

    $sql = 'SELECT * FROM users WHERE user_id = :user_id';
    $sth = $conn->prepare($sql);
    $sth->bindParam(':user_id', $_SESSION['user']);
    $sth->execute();


      while ($user = $sth->fetch(PDO::FETCH_OBJ)) {
        echo '<h1>welkom '.$user->name.' '.$user->tussenvoegsel.' '.$user->achternaam.'</h1>
          <hr>

          <h2>persoonlijke gegevens:</h2>
          <p>email: '.$user->email.'</p>
          <p>balans: € '.$user->balans.'<a href="index.php?page=balans_toevoegen" class="toevoegenbutton">+</a></p>
          <p>bankrekening nummer: '.$user->bankrekeningnummer.'</p>

          <h4> <a onclick="myFunction()" class="deletebutton">account verwijderen</a> </h4>

          <script>
            function myFunction() {
              var txt;
              if (confirm("Weet je zeker dat je je account wil verwijderen!?")) {
                window.location.href = "php/accountverwijderen.php?page='.$user->user_id.'";
              }
            }
          </script>
        ';
      }
  ?>
    <hr>
    <h2>inbox</h2>
    <p>
      <table>
        <tr>
          <th><h3>groep</h3></th>
        </tr>
        <?php
          $sql = "SELECT leden.id, leden.groep, leden.uitnodiging, groepen.naam FROM leden INNER JOIN groepen ON leden.groep = groepen.groep_id WHERE leden.user = :user";
          $sth = $conn->prepare($sql);
          $sth->bindParam(':user', $_SESSION['user']);
          $sth->execute();

            while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
              if ($row->uitnodiging == '0') {
                echo'
                    <tr>
                      <td>'.$row->naam.'</td>
                      <td>uitnodiging <a onclick="accepteren'.$row->id.'()" class="button">accepteren</a>

                      <script>
                        function accepteren'.$row->id.'() {
                          var txt;
                          if (confirm("Weet je zeker dat je deze uitnodiging wilt accepteren!?")) {
                            window.location.href = "php/uitnodigingaccepteren.php?page='.$row->id.'";
                          }
                        }
                      </script>

                    </td>
                    <td><a href="php/groepenre.php?page='.$row->groep.'" class="aanpassenbutton">groep bekijken</a></td>
                  </tr>
                ';
              } elseif ($row->uitnodiging == '1') {
                echo'
                    <tr>
                      <td>'.$row->naam.'</td>
                      <td>lid</td>

                    </td>
                    <td><a href="php/groepenre.php?page='.$row->groep.'" class="aanpassenbutton">groep bekijken</a></td>
                  </tr>
                ';
              }
            }
        ?>
      </table>
      <hr>
        <?php include 'php/error.php'; ?>
      <table>
        <tr>
          <th><h3>jouw betalingen</h3></th>
          <th><h3>bedrag</h3></th>
          <th><h3>betaald</h3></th>
        </tr>
        <?php
          $sql = "SELECT groepsbetalingen.id, groepsbetalingen.van_lid, groepsbetalingen.bedrag, groepsbetalingen.betaald, groepen.naam FROM leden INNER JOIN groepsbetalingen ON groepsbetalingen.van_lid = leden.id INNER JOIN groepen ON groepen.groep_id = leden.groep WHERE leden.user = :user";
          $sth = $conn->prepare($sql);
          $sth->bindParam(':user', $_SESSION['user']);
          $sth->execute();

            while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
                echo'
                    <tr>
                      <td>'.$row->naam.'</td>
                      <td>'.$row->bedrag.'</td>
                      <td>'.$row->betaald.'</td>';
                      if ($row->betaald == 'no') {echo'<td><a onclick="accepteren'.$row->id.'()" class="button">betalen</a></td>';}
                      echo'
                      <script>
                        function accepteren'.$row->id.'() {
                          var txt;
                          if (confirm("Weet je zeker dat je deze betaling wilt betalen!?")) {
                            window.location.href = "php/betalen.php?page='.$row->id.'";
                          }
                        }
                      </script>

                    </td>
                  </tr>
                ';
            }
        ?>
      </table>
</div>

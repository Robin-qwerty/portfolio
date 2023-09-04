<div id="boek_2">
  <hr>
  <div id="inbox">
    <h1>leden uitnodigen</h1>

    <table>
      <tr>
        <th><h3>leden beheeren</h3></th>
      </tr>
      <?php
        $sql = 'SELECT users.user_id, users.name, users.tussenvoegsel, users.achternaam, leden.id, leden.owner FROM users INNER JOIN leden ON leden.groep = :groep_id WHERE leden.user = users.user_id';
        $sth = $conn->prepare($sql);
        $sth->bindParam(':groep_id', $_SESSION['groepsid']);
        $sth->execute();


          while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
            echo '
              <tr>
                <td>'.$row->name.' '.$row->tussenvoegsel.' '.$row->achternaam.'</td>';
                if ($row->owner == 0) {echo '<td>lid</td><td><a onclick="coowner'.$row->id.'()" class="toevoegenbutton">co owner maken</a>';}
                elseif ($row->owner == 1) {echo '<td>owner</td>';}
                elseif ($row->owner == 2) {echo '<td>co-owner</td><td><a onclick="lid'.$row->id.'()" class="toevoegenbutton">lid maken</a>';}

                echo'
                <script>
                function coowner'.$row->id.'() {
                  var txt;
                  if (confirm("Weet je zeker dat je dit account co-owner wil maken!?")) {
                    window.location.href = "php/coownermaken.php?page='.$row->id.'";
                  }
                }
                function lid'.$row->id.'() {
                  var txt;
                  if (confirm("Weet je zeker dat je dit account lid wil maken!?")) {
                    window.location.href = "php/lidmaken.php?page='.$row->id.'";
                  }
                }
                </script>
                </td>
              </tr>
            ';
          }
      ?>
    </table>
    <table>
      <tr>
        <th><h3>naam</h3></th>
      </tr>
      <?php
        $pdoQuery = 'SELECT * FROM users';
        $pdoQuery_run = $conn->query($pdoQuery);

        if ($pdoQuery_run) {
          while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
            echo '
              <tr>
                <td>'.$row->name.' '.$row->tussenvoegsel.' '.$row->achternaam.'</td>
                <td><a onclick="uitnodigen'.$row->user_id.'()" class="toevoegenbutton">uitnodigen</a>

                <script>
                function uitnodigen'.$row->user_id.'() {
                  var txt;
                  if (confirm("Weet je zeker dat je dit account wil uitnodigen!?")) {
                    window.location.href = "php/accountuitnodigen.php?page='.$row->user_id.'";
                  }
                }
                </script>
                </td>
              </tr>
            ';
          }
        }
      ?>
    </table>
  </div>
</div>
<hr>

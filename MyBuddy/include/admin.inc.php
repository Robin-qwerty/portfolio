<div id="boek_2">
  <h1>welkom admin</h1>

  <h2>dit zijn alle groepen</h2>
  <hr>
  <p>
  <table>
    <tr>
      <th><h3>id</h3></th>
      <th><h3>naam</h3></th>
      <th><h3>owner</h3></th>
      <th><h3>aantal leden</h3></th>
      <th><h3>beschrijving</h3></th>
      <th><a href="index.php?page=groepen_toevoegen" class="toevoegenbutton">toevoegen</a></th>
    </tr>
    <?php
      $pdoQuery = "SELECT * FROM groepen";
      $pdoQuery_run = $conn->query($pdoQuery);

      if ($pdoQuery_run) {
        while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
          echo '
            <tr>
              <td>'.$row->groep_id.'</td>
              <td>'.$row->naam.'</td>
              <td>'.$row->beschrijving.'</td>
              <td><a onclick="producverwijderen'.$row->groep_id.'()" class="deletebutton">verwijderen</a>

                <script>
                  function producverwijderen'.$row->groep_id.'() {
                    var txt;
                    if (confirm("Weet je zeker dat je dit product wil verwijderen!?")) {
                      window.location.href = "php/producverwijderen.php?page='.$row->groep_id.'";
                    }
                  }
                </script>

              </td>
              <td><a href="php/groepenre.php?page='.$row->groep_id.'" class="aanpassenbutton">bekijken</a></td>
            </tr>
          ';
        }
      } else {
        include 'include/error.inc.php';
      }
/*
    ?>
  </table>

  <p>
  <hr>

<h2>dit zijn alle catagorieen</h2>
<table>
  <tr>
    <th><h3>id</h3></th>
    <th><h3>naam</h3></th>
    <th><h3>beschrijving</h3></th>
    <th><a href="index.php?page=catagorietoevoegen" class="toevoegenbutton">toevoegen</a></th>
  </tr>
  <?php
    $pdoQuery = "SELECT * FROM catagorie";
    $pdoQuery_run = $conn->query($pdoQuery);

    if ($pdoQuery_run) {
      while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
        echo '
          <tr>
            <td>'.$row->id.'</td>
            <td>'.$row->name.'</td>
            <td>'.$row->beschrijving.'</td>
            <td><a href = "php/catagotieen.php?page='.$row->id.'" class="aanpassenbutton">aanpassen</a></td>
            <td><a onclick="catagorieverwijderen'.$row->id.'()" class="deletebutton">verwijderen</a>

            <script>
            function catagorieverwijderen'.$row->id.'() {
              var txt;
              if (confirm("Weet je zeker dat je deze catagorie wil verwijderen!?")) {
                window.location.href = "php/catagorieverwijderen.php?page='.$row->id.'";
              }
            }
            </script>
        ';
      }
    } else {
      include 'include/error.inc.php';
    }
  ?>
</table>
  <p>
  <hr>

  <h2>dit zijn alle users</h2>
  <table>
    <tr>
      <th><h3>userid</h3></th>
      <th><h3>roll</h3></th>
      <th><h3>username</h3></th>
      <th><h3>password</h3></th>
      <th><h3>naam</h3></th>
      <th><h3>tussenvoegsel</h3></th>
      <th><h3>achternaam</h3></th>
      <th><h3>bankrekening nummer</h3></th>
      <th><a href="index.php?page=aanmelden" class="toevoegenbutton">toevoegen</a></th>
    </tr>
    <?php

      $pdoQuery = "SELECT * FROM users";
      $pdoQuery_run = $conn->query($pdoQuery);

      if ($pdoQuery_run) {
        while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
          echo '
            <tr>
              <td>'.$row->user_id.'</td>
              <td>'.$row->roll.'</td>
              <td>'.$row->email.'</td>
              <td>'.$row->password.'</td>
              <td>'.$row->name.'</td>
              <td>'.$row->tussenvoegsel.'</td>
              <td>'.$row->achternaam.'</td>
              <td>'.$row->bankrekeningnummer.'</td>
              <td><a onclick="accountverwijderen'.$row->user_id.'()" class="deletebutton">verwijderen</a>

              <script>
              function accountverwijderen'.$row->user_id.'() {
                var txt;
                if (confirm("Weet je zeker dat je dit account wil verwijderen!?")) {
                  window.location.href = "php/accountverwijderen.php?page='.$row->user_id.'";
                }
              }
              </script>
              </td>
            </tr>
          ';
        }
      } else {
        include 'include/error.inc.php';
      }/*
    ?>
  </table>
    <p>
    <hr>
  <h2>dit zijn alle kortingscodes</h2>
  <table>
    <tr>
      <th><h3>kortingscode id</h3></th>
      <th><h3>code</h3></th>
      <th><h3>waarde</h3></th>
      <th><a href="index.php?page=kortingscodetoevoegen" class="toevoegenbutton">toevoegen</a></th>
    </tr>
    <?php

      $pdoQuery = "SELECT * FROM kortingscode";
      $pdoQuery_run = $conn->query($pdoQuery);

      if ($pdoQuery_run) {
        while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
          echo '
            <tr>
              <td>'.$row->id.'</td>
              <td>'.$row->kortingscode.'</td>
              <td>'.$row->waarde.'</td>
              <td><a onclick="kortingscodeverwijderen'.$row->id.'()" class="deletebutton">verwijderen</a>

              <script>
              function kortingscodeverwijderen'.$row->id.'() {
                var txt;
                if (confirm("Weet je zeker dat je deze kortingscode wil verwijderen!?")) {
                  window.location.href = "php/kortingscodeverwijderen.php?page='.$row->id.'";
                }
              }
              </script>
              </td>
            </tr>
          ';
        }
      } else {
        include 'include/error.inc.php';
      }

    */?>
  </table>
  <p>
  <hr>
</div>

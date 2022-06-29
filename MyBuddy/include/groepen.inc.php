<div id="boek_2">
  <?php
    if (isset($_SESSION['user'])) {
      echo'<h3> zelf een groep maken? <a href="index.php?page=groepen_toevoegen" class="toevoegenbutton">groep maken</a> </h3>';
    } else {
      echo'<h3> zelf een groep maken? dan moet je eerst inloggen <a href="index.php?page=inloggen" class="toevoegenbutton">inloggen</a> </h3>';
    }
    echo'
      </div>
      <div id="mainboeken">';

    $pdoQuery = "SELECT groepen.naam, groepen.beschrijving, groepen.groep_id, users.name, leden.user, leden.owner FROM ((groepen INNER JOIN leden ON leden.groep = groepen.groep_id AND leden.owner = '1') INNER JOIN users ON users.user_id = leden.user)";
    $pdoQuery_run = $conn->query($pdoQuery);

    if ($pdoQuery_run) {
      while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
        echo '
        <div class="card">
          <div class="card-content">
            <h2 class="card-title">'.$row->naam.'</h2>
            <p class="body-card">'.$row->beschrijving.'</p>
            <p class="body-card">groeps owner: '.$row->name.'</p>
            <a href="php/groepenre.php?page='.$row->groep_id.'" class="button">learn more</a>
          </div>
        </div>
        ';
      }
    } else {
      header('location: ../index.php?page=error');
    }
  ?>
</div>

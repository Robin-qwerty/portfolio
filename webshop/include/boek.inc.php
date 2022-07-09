<?php

  include'private/connections.php';

  $sql = "SELECT * FROM TBBoeken WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_SESSION['boek']);
  $sth->execute();

    while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
      echo '
      <div id="boek_1">
        <div id="left">
          <div class="boek1">
            <img src="media/'.$row->afbeelding.'.jpeg" alt="logo" style="width:321px;height:500px;">
          </div>';
            if (isset($_SESSION['user'])) {
              if ($_SESSION["user"] == 'admin') {
                echo '<a href="index.php?page=boekaanpassen" class="button">bewerken</a>';
              } else
                  if ($row->voorraad == 0) {
                    echo '<a href="php/reserveren.php?page='.$row->id.'" class="button">reserveren</a>';
                  } else {
                    echo '<a href="php/lenen.php?page='.$row->id.'" class="button">lenen</a>';
                  }
                } else {
              echo '<a href="index.php?page=boeken" class="button">zoek naar meer boeken</a>';
                }

            if (isset($_SESSION['melding'])) {
              echo '<p style="color: red;">'.$_SESSION['melding'].'</p>';
              unset($_SESSION['melding']);
            }
          echo '
        </div>
      </div>

      <div id="boek_2">
        <div id="midel2">
          <h1>'.$row->titel.'</h1>
          <p>Door: '.$row->schrijfer.'</p>
          <p>Op de achterzijden van het boek:</p>
          <p>'.$row->achterzijdeboek.'</p>
          <p>Geschikt voor ca. 13 jaar</p>
          <p>genre: '.$row->genre.'</p>
          <p>Bevat '.$row->aantalpaginas.' paginas</p>
          <p>ISBN nummer: '.$row->ISBNnummer.'</p>
          <p>taal: '.$row->taal.'</p>
          <p>voorraad: '.$row->voorraad.'</p>
        </div>
      </div>
      ';
    }

?>

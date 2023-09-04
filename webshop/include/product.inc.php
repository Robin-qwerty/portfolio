<?php
  $sql = "SELECT * FROM producten WHERE id = :id";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':id', $_SESSION['product']);
  $sth->execute();

  while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    echo '
    <div id="boek_1">
      <div id="left2">
        <div class="boek1">
          <img src="media/photo.jpeg" alt="logo" style="width:321px;height:227px;">
        </div>';
          if (isset($_SESSION['user'])) {
            if ($_SESSION["user"] == 'admin') {
              echo '<a href="index.php?page=productaanpassen" class="button">bewerken</a>';
            } else
                if ($row->voorraad == 0) {
                  echo '<a href="#" class="button">das peg, voorraad weg!!!</a>';
                } else {
                  echo '<a href="php/winkelmandjetoevoegen.php?page='.$row->id.'" class="button">bestellen</a>';
                }
              } else {
                echo '<a href="index.php?page=inloggen" class="button">login om te kunnen bestellen</a>';
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
        <h1>'.$row->name.'</h1>
        <p>prijs: '.$row->prijs.'</p>
        <p>voorraad: '.$row->voorraad.'</p>
        <p>Een beschrijving:</p>
        <p>'.$row->beschrijving.'</p>
      </div>
    </div>
    ';
  }

?>

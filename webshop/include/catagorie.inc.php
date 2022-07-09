<?php
  $sql = "SELECT * FROM producten WHERE catagorie = :catagorie";
  $sth = $conn->prepare($sql);
  $sth->bindParam(':catagorie', $_SESSION['catagorie']);
  $sth->execute();

  echo '<div id="mainboeken">';

  while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
    echo '
      <div class="card">
        <div class="card-content">
          <h2 class="card-title">'.$row->name.'</h2>
          <p class="body-card">'.$row->beschrijving.'</p>
          <a href="php/productre.php?page='.$row->id.'" class="button">learn more</a>
        </div>
      </div>';
  }

  echo '</div>';
?>

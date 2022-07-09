<div id="mainboeken">
  <?php
    $pdoQuery = "SELECT * FROM producten";
    $pdoQuery_run = $conn->query($pdoQuery);

    if ($pdoQuery_run) {
      while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
        echo '
          <div class="card">
            <div class="card-content">
              <h2 class="card-title">'.$row->name.'</h2>
              <p class="body-card">'.$row->beschrijving.'</p>
              <a href="php/productre.php?page='.$row->id.'" class="button">learn more</a>
            </div>
          </div>
        ';
      }
    } else {
      header('location: ../index.php?page=error');
    }
  ?>
</div>

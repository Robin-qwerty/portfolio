<div class="slideshow-container">
  <img src="media/home_page_photo.png" style="width:100%">
  <div class="text-block">
</div>

</div>
<br>

<div id="boek_2">
  <table>
    <tr>
    <?php
      $pdoQuery = "SELECT name FROM catagorie LIMIT 5";
      $pdoQuery_run = $conn->query($pdoQuery);

      while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
        echo '<th><a href="php/catagoriere.php?page='.$row->name.' " class="button">'.$row->name.'</a></th>';
      }
      ?>
    </tr>
  </table>
</div>

<div id="mainboeken">
  <?php
    $pdoQuery = "SELECT * FROM producten LIMIT 3";
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

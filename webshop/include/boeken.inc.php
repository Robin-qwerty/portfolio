
<div id="home">
    <h1>
      <span style="color:#fff;font-weight:bold">shop</span>
      <a href="index.php.page=tech"><span style="color:black;font-weight:bold">shop tech</span></a> <span style="color:#fff;font-weight:bold">shop shop</span>
      <a href="index.php.page=klerenD"><span style="color:black;font-weight:bold">shop dames kleren</span></a> <span style="color:#fff;font-weight:bold">shop shop</span>
      <a href="index.php.page=klerenH"><span style="color:black;font-weight:bold">shop heren kleren</span></a> <span style="color:#fff;font-weight:bold">shop shop</span>
      <a href="index.php.page=tech"><span style="color:black;font-weight:bold">shop planten</span></a> <span style="color:#fff;font-weight:bold">shop</span>
    </h1>
</div>

<div id="mainboeken">
  <?php
    include'private/connections.php';

    $pdoQuery = "SELECT * FROM TBBoeken";
    $pdoQuery_run = $conn->query($pdoQuery);

    if ($pdoQuery_run) {
      while ($row = $pdoQuery_run->fetch(PDO::FETCH_OBJ)) {
        echo '
          <div class="card'.$row->id.'">
          <style>
            .card'.$row->id.'{
              border-radius: 20px;
              color: var(--clr-neutral-100);
              background-image: url("media/'.$row->afbeelding.'.jpeg");
              background-size: cover;
              padding: 18rem 0 0;
              max-width: 50ch;
              overflow: hidden;
              transition: transform 500ms ease;
            }

            .card'.$row->id.':hover .card-title::after
              transform: scaleX(1);
            }
            .card:hover'.$row->id.' .card-content{
              transform: translateY(0);
            }
            .card'.$row->id.':hover{
              transform: scale(1.05);
            }

          </style>
          <div class="card-content">
          <h2 class="card-title">'.$row->titel.'</h2>
          <p class="body-card">'.$row->achterzijdeboek.'</p>
          <a href="php/boek.php?page='.$row->id.'" class="button">learn more</a>
          </div>
          </div>
        ';
      }
    } else {
      header('location: ../include/error.inc.php');
    }
  ?>
</div>

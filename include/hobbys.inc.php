<div class="hobbys" id="hobbys">
  <h1>My Hobbys</h1>
  <div class="media-scroller snap-inline">
    <div class="media-content" id="fpvdrones">
      <a href="index.php?page=hobbys&hobby=fpvdrones#fpvdrones"><p class="media-title">> FPV Drones <</p></a>
      <img src="media/hobby-fpvdrones.jpg">
      <a href="https://youtube.com/@justrobinfpv" target="_blank" class="media"><iconify-icon icon="logos:youtube"></iconify-icon></a>
    </div>
    <div class="media-content" id="fotografie">
      <a href="index.php?page=hobbys&hobby=fotografie#fotografie"><p class="media-title">> Fotografie <</p></a>
      <img src="media/Fotografie.png">
      <a href="https://www.flickr.com/photos/192365319@N08/" target="_blank" class="media"><iconify-icon icon="logos:flickr"></iconify-icon></a>
    </div>
    <div class="media-content" id="gaming">
      <a href="index.php?page=hobbys&hobby=gaming#gaming"><p class="media-title">> Gaming <</p></a>
      <img src="media/Screenshot from 2022-11-01 13-24-33.png">
    </div>
    <div class="media-content" id="lego">
      <a href="index.php?page=hobbys&hobby=lego#lego"><p class="media-title">> Lego <</p></a>
      <img src="media/legotankMOC.gif">
      <a href="https://ideas.lego.com/profile/4875e091-82e9-44be-97a1-8df23120529d/entries?query=&sort=top" target="_blank" class="media"> <img id="imglogo" src="media/lego-ideas.png"> </a>
    </div>
  </div>
  <?php if(isset($_GET['hobby'])) { ?>
    <div class="hobby-content">
      <?php
        if($_GET['hobby'] == 'fpvdrones') {
      ?>
      <h2>FPV Drones</h2>
      <p>
        Een van mijn grooste hobbys is FPV drones vliegen.
        FPV betekent <b>F</b>irst<b>P</b>erson<b>V</b>iew en je hebt dus een soort vr brill op waardoor je de live feed van de fpv camera op de drone kunt zien
      </p>
      <div class="hobby-photo-content">
        <img src="media/dvr-fpvdrone.gif">
        <img src="media/hobby-fpvdrones.jpg">
        <iframe width="33%" height="450px"
          src="https://www.youtube.com/embed/35qbPDzTZoc?autoplay=1&mute=1">
        </iframe>
      </div>
      <?php
        }elseif($_GET['hobby'] == 'fotografie') {
      ?>
      <h2>Fotografie</h2>
      <p>

      </p>
      <div class="hobby-photo-content">
        <img src="media/51127388654_5a28c7d56f_o (1).jpg">
        <img id="big" src="media/51001933113_8dceb37150_o (1).jpg">
        <img src="media/51008209193_f52135a8ea_o.jpg">
      </div>
      <?php
        }elseif($_GET['hobby'] == 'gaming') {
      ?>
      <h2>Gaming</h2>
      <p>
        War thunder, Minecraft &amp; Krunker
      </p>
      <div class="hobby-photo-content">
        <img src="media/krunker.png">
        <img src="media/warthunder.jpg">
      </div>
      <?php
        }elseif($_GET['hobby'] == 'lego') {
      ?>
      <h2>Lego</h2>
      <p>

      </p>
      <div class="hobby-photo-content">
        <img src="media/lego-gebuow.png">
        <img src="media/mindstorms-auto.jpg">
        <img src="media/LEGO-huis.gif">
      </div>
      <?php
        } else {
          $_GET['hobby'] = 'fpvdrones';
        }
      ?>
    </div>
  <?php } ?>
</div>

<div class="hobbys" id="hobbys">
  <h1 data-lang="nl">Mijn hobby's</h1>
  <h1 data-lang="en">My hobbies</h1>

  <div class="media-scroller snap-inline">
    <div class="media-content" id="fpvdrones">
      <a href="index.php?page=hobbys&hobby=fpvdrones#fpvdrones"><p class="media-title">> FPV Drones <</p></a>
      <img src="media/hobby-fpvdrones.jpg">
      <a href="https://youtube.com/@justrobinfpv" target="_blank" class="media"><b>check me out on > </b><iconify-icon icon="logos:youtube"></iconify-icon></a>
    </div>
    <div class="media-content" id="fotografie">
      <a href="index.php?page=hobbys&hobby=fotografie#fotografie"><p class="media-title" data-lang="nl">> Fotografie <</p><p class="media-title" data-lang="en">> Photography <</p></a>
      <img src="media/Fotografie.png">
      <a href="https://www.flickr.com/photos/192365319@N08/" target="_blank" class="media"><b>check me out on > </b><iconify-icon icon="logos:flickr"></iconify-icon></a>
    </div>
    <div class="media-content" id="gaming">
      <a href="index.php?page=hobbys&hobby=gaming#gaming"><p class="media-title">> Gaming <</p></a>
      <img src="media/Screenshot from 2022-11-01 13-24-33.png">
      <a href="https://steamcommunity.com/profiles/76561199232592072" target="_blank" class="media"><b>check me out on > </b><img id="imglogo" src="media/steam-logo.png"></a>
    </div>
    <div class="media-content" id="lego">
      <a href="index.php?page=hobbys&hobby=lego#lego"><p class="media-title">> Lego <</p></a>
      <img src="media/legotankMOC.gif">
      <a href="https://ideas.lego.com/profile/4875e091-82e9-44be-97a1-8df23120529d/entries?query=&sort=top" target="_blank" class="media"><b>check me out on > </b><img id="imglogo" src="media/lego-ideas.png"></a>
    </div>
  </div>
  <?php if(isset($_GET['hobby'])) { ?>
    <div class="hobby-content">
      <?php
        if($_GET['hobby'] == 'fpvdrones') {
      ?>
      <h2>FPV Drones</h2>
      <p data-lang="nl">
        Een van mijn grooste hobbys is FPV drones vliegen.
        FPV betekent <b>F</b>irst<b>P</b>erson<b>V</b>iew en je hebt dus een soort vr brill op waardoor je de live feed van de fpv camera op de drone kunt zien
      </p>

      <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
      </div>

      <div class="hobby-photo-content">
        <img src="media/dvrfpvdrone.gif">
        <img src="media/hobby-fpvdrones.jpg">
        <iframe width="33%" height="450px"
          src="https://www.youtube.com/embed/35qbPDzTZoc?autoplay=1&mute=1">
        </iframe>
      </div>
      <?php
        }elseif($_GET['hobby'] == 'fotografie') {
      ?>
      <h2>Fotografie</h2>

      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

      <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
      </div>

      <!-- Page content -->
      <div class="w3-content" style="max-width:1500px">
        <!-- Photo Grid -->
        <div class="w3-row" id="myGrid" style="margin-bottom:128px">
          <div class="w3-third">
            <img src="media/51127388654_fdd5d8bfc8_c.jpg" style="width:100%">
            <img src="media/51344143380_0d73804244_c.jpg" style="width:100%">
            <img src="media/51011954631_66eec6efb1_c.jpg" style="width:100%">
            <img src="media/50988269992_d475d0e8a4_c.jpg" style="width:100%">
            <img src="media/51120928514_6104866e5e_c.jpg" style="width:100%">
          </div>

          <div class="w3-third">
            <img src="media/51001933113_940ef45743_c.jpg" style="width:100%">
            <img src="media/51209374727_ff1b819b54_c.jpg" style="width:100%">
            <img src="media/51001933213_c6936c0059_c.jpg" style="width:100%">
            <img src="media/51344143450_efe107bb6a_c.jpg" style="width:100%">
          </div>

          <div class="w3-third">
            <img src="media/51008209193_397db4b646_c.jpg" style="width:100%">
            <img src="media/51127554684_72cfdae02b_c.jpg" style="width:100%">
            <img src="media/50988872907_45cf0e4f2f_c.jpg" style="width:100%">
            <img src="media/51179192015_48c5a050ab_c.jpg" style="width:100%">
          </div>
        </div>
      </div>


      <?php
        }elseif($_GET['hobby'] == 'gaming') {
      ?>
      <h2>Gaming</h2>
      <p data-lang="nl">
        War thunder, Minecraft, Krunker  &amp; call of duty warzone
      </p>

      <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
      </div>

      <div class="hobby-photo-content">
        <img src="media/krunker.png">
        <img src="media/warthunder.jpg">
        <img src="media/Screenshot%20from%202022-11-01%2013-24-33.png">
      </div>
      <?php
        }elseif($_GET['hobby'] == 'lego') {
      ?>
      <h2>Lego</h2>
      <p data-lang="nl">

      </p>

      <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
      </div>

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
    <script src="script/hobby.js"></script>
  <?php } ?>
</div>

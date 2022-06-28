<script src="script/coding.js" defer></script>

<div class="row">
  <div class="left" style="background-color:#ffd2d28a;">
    <a href="index.php?page=coding"><h2 style="text-align: center;">Projecten</h2></a>
    <input type="text" id="mySearch" onkeyup="coding()" placeholder="Search.. (bijv: school)" title="Type in a category">
    <ul id="myMenu">
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.portfolio"><b>portfolio</b></a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.mybuddy"><b>Mybuddy</b> (school)</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.webshop"><b>Webshop</b> (school)</a></li>
    </ul>
  </div>

  <div class="right" style="background-color: #d2ffe38a;;">
    <?php if (isset($_GET['project'])) {include 'include/'.$_GET['project'].'.inc.php';} else{ ?>
      <h2>Coding Projecten</h2>
      <p><b>Programmeertalen die ik leuk vind: </b>HTML, CSS &amp; PHP.</p>
      <p>Een paar van de projecten die ik heb gemaakt.</p>
      <p>Tot nu toe zijn de meeste schoolprojecten.</p>
    <?php }?>
  </div>
</div>

<script src="script/coding.js" defer></script>

<div class="row">
  <div class="left" style="background-color:#bbb;">
    <h2 style="text-align: center;">Projecten</h2>
    <input type="text" id="mySearch" onkeyup="coding()" placeholder="Search.." title="Type in a category">
    <ul id="myMenu">
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.mybuddy">Mybuddy</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.webshop">Webshop</a></li>
    </ul>
  </div>

  <div class="right" style="background-color:#ddd;">
    <?php if (isset($_GET['project'])) {include 'include/'.$_GET['project'].'.inc.php';} else{ ?>
      <h2>Coding Projecten</h2>
      <p><b>Programmeertalen die ik leuk vind: </b>HTML, CSS & PHP.</p>
      <p>Een paar van de projecten die ik heb gemaakt.</p>
      <p>De meeste zijn schoolprojecten (tot nu toe eigenlijk allemaal).</p>
    <?php }?>
  </div>
</div>

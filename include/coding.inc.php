<script src="script/coding.js" defer></script>

<div class="coding" id="coding">
  <div class="left">
    <a href="index.php?page=coding"><h2 style="text-align: center;">Projecten</h2></a>
    <input type="text" id="mySearch" onkeyup="coding()" placeholder="Search.. (bijv: school)" title="Type in a category">
    <ul id="myMenu">
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.codefest-rijnijssel-2023"><b>Codefest 2023</b> everyone can cook</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.laravel"><b>laravel</b> example-app</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.portfolio"><b>portfolio</b> (deze website)</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.mybuddy"><b>Mybuddy</b> (school)</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.webshop"><b>Webshop</b> (school)</a></li>
    </ul>
  </div>

  <div class="right">
    <div class="gitarrow"><iconify-icon icon="fa-regular:hand-point-up" <?php if($page != 'home' && $page != ''){ echo'style="margin-top:3%"';}?>></iconify-icon><strong><p>My github</p></strong></div>
    <?php if (isset($_GET['project'])) {include 'include/'.$_GET['project'].'.inc.php';} else { ?>
      <h2>Coding Projecten</h2>
      <p><b>Programmeertalen die ik leuk vind en veel gebruik: <code>HTML, CSS, PHP  &amp; Javascript</code>.</b></p>
      <p><b>Frameworks die ik gebruikt heb: </b><code><b>Xamarin</b></code> om in C# apps te maken en <code><b>Laravel</b></code> voor php websites.</p>
      <p>Hier kun je een paar van de projecten die ik heb gemaakt bekijken.</p>
      <p>Tot nu toe zijn de meeste schoolprojecten.</p>
    <?php } ?>
  </div>
</div>

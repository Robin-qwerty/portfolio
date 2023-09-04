<?php
  if (isset($_GET['project'])) {
    $filename = 'include/' . $_GET['project'] . '.inc.php';
    if (!file_exists($filename)) {
      $_GET['project'] = '';
    }
  }
?>

<script src="script/coding.js" defer></script>

<div class="coding" id="coding">
  <div class="left">
    <a href="index.php?page=coding">
      <h2 data-lang="nl" style="text-align: center;">Projecten <iconify-icon icon="material-symbols:code-rounded" style="color: #262626;"></iconify-icon></h2>
      <h2 data-lang="en" style="text-align: center;">Projects <iconify-icon icon="material-symbols:code-rounded" style="color: #262626;"></iconify-icon></h2>
    </a>
    <input type="text" id="mySearch" onkeyup="coding()" placeholder="Search.. (bijv: school)" title="Type in a category">
    <ul id="myMenu">
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.beeway"><b>beeway</b> - stage project</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.codefest-rijnijssel-2023"><b>Codefest 2023</b> - everyone can cook</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.laravel"><b>laravel</b> - example-app</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.portfolio"><b>portfolio</b> - (robin.humilis.net)</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.mybuddy"><b>Mybuddy</b> - (school)</a></li>
      <li style="text-align: center;"><a href="index.php?page=coding&project=project.webshop"><b>Webshop</b> - (school)</a></li>
    </ul>
  </div>

  <div class="right">
    <div class="gitarrow"><iconify-icon icon="fa-regular:hand-point-up" <?php if($page != 'home' && $page != ''){ echo'style="margin-top:3%"';}?>></iconify-icon><strong><p>My github</p></strong></div>
    <?php if (isset($_GET['project'])) {include 'include/'.$_GET['project'].'.inc.php';} else { ?>
      <h2 data-lang="nl">Coding Projecten</h2>
      <h2 data-lang="en">Coding Projects</h2>

      <p data-lang="nl"><b>Programmeertalen die ik leuk vind en veel gebruik: <code>HTML, CSS, PHP</code></b> en een beetje <b><code>Javascript</code>.</b></p>
      <p data-lang="en"><b>Programming languages that I like and use a lot: <code>HTML, CSS, PHP  &amp; Javascript</code>.</b></p>

      <p data-lang="nl"><b>Frameworks die ik gebruikt heb: </b><code><b>Xamarin</b></code> om in <code>C#</code> apps te maken en <code><b>Laravel</b></code> voor <code>php</code> websites.</p>
      <p data-lang="en"><b>Frameworks I've used: </b><code><b>Xamarin</b></code> to create apps in C# and <code><b>Laravel</b></code> for PHP websites.</p>

      <p data-lang="nl">Hier kun je een paar van de projecten die ik heb gemaakt bekijken.</p>
      <p data-lang="en">Here you can see some of the projects I've made.</p>

      <p data-lang="nl">Tot nu toe zijn de meeste schoolprojecten.</p>
      <p data-lang="en">So far, most are school projects.</p>
    <?php } ?>
  </div>
</div>

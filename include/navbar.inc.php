<div class="navbar sticky" id="menulist">
  <iconify-icon icon="ei:navicon" class="nav-icon" onclick="togglemenu()"></iconify-icon>
  <a href="<?php if(isset($page) && $page != 'home'){echo'index.php?page=';} else {echo'#';}?>home" class="robin"><h1>Robin Hollaar</h1></a>
  <div id="navbar_left">
    <a id="home1" href="<?php if(isset($page) && $page != 'home'){echo'index.php?page=';} else {echo'#';}?>home"><b>Home</b></a>
    <a id="coding1" href="<?php if(isset($page) && $page != 'home'){echo'index.php?page=';} else {echo'#';}?>coding"><b>Coding</b></a>
    <a id="navlink" href="<?php if(isset($page) && $page != 'home'){echo'index.php?page=';} else {echo'#';}?>werk-school"><b>werk/school</b></a>
    <a id="navlink" href="<?php if(isset($page) && $page != 'home'){echo'index.php?page=';} else {echo'#';}?>hobbys"><b>Hobbys</b></a>
    <a id="navlink" href="#media"><b>contact/media</b></a>
  </div>
  <div id="navbar_right">
    <a id="navlink" href="https://discordapp.com/users/709759520573882478" target="_blank"><iconify-icon icon="carbon:logo-discord"></iconify-icon></a>
    <a id="navlink" href="https://github.com/Robin-qwerty" target="_blank"><iconify-icon icon="cib:github"></iconify-icon></a>
    <a id="navlink" href="https://www.linkedin.com/in/robin-hollaar-b8ab01230/" target="_blank"><iconify-icon icon="brandico:linkedin-rect"></iconify-icon></a>
    <a id="navlink" href="mailto:robin@humilis.net?subject=portfolio" target="_blank"><iconify-icon icon="bx:mail-send"></iconify-icon></a>
  </div>
</div>

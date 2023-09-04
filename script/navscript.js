var menulist = document.getElementById('menulist')

menulist.style.height = '60px';

function togglemenu() {
  if (menulist.style.height == '60px') {
      menulist.style.height = '100%';
  }
  else {
    menulist.style.height = '60px';
  }
}

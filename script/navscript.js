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

// console.log(window.innerWidth);
//
// window.addEventListener("resize", function() {
//   if (window.innerWidth >= '920') {
//     document.getElementById("home1").addEventListener("click", function() {
//       if (menulist.style.height == '60px') {
//           menulist.style.height = '100%';
//       }
//       else {
//         menulist.style.height = '60px';
//       }
//     });
//     console.log("Screen width is at least 920px")
//   } else {
//     console.log("Screen less than 920px")
//   }
// })

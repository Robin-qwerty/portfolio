$(document).ready(function(){ // JavaScript code to handle image clicks
  function openModal() {
    document.getElementById("myModal").style.display = "block";
    var modalImg = document.getElementById("img01");
    modalImg.src = this.src;
  }

  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }

  var images = document.getElementsByTagName("img");
  for (var i = 0; i < images.length; i++) {
    images[i].onclick = openModal;
  }

  var span = document.getElementsByClassName("close")[0];
  span.onclick = closeModal;

  // Toggle grid padding
  function myFunction() {
    var x = document.getElementById("myGrid");
    if (x.className === "w3-row") {
      x.className = "w3-row-padding";
    } else {
      x.className = x.className.replace("w3-row-padding", "w3-row");
    }
  }
});

var countDownDate1 = new Date("Dec 15, 2021 15:37:25").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate1 - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

  document.getElementById("countdown1").innerHTML = days + "d " + hours + "h ";

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown1").innerHTML = "TE LAAT";
  }
}, 1000);

/*---------------------------------------------------------------*/

var countDownDate2 = new Date("Jan 3, 2021 15:37:25").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate2 - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("countdown2").innerHTML = days + "d " + hours + "h ";

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown2").innerHTML = "TE LAAT";
  }
}, 1000);

/*---------------------------------------------------------------*/

var countDownDate3 = new Date("Dec 25, 2021 15:37:25").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate3 - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("countdown3").innerHTML = days + "d " + hours + "h ";

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown3").innerHTML = "TE LAAT";
  }
}, 1000);

/*---------------------------------------------------------------*/

var countDownDate4 = new Date("Dec 23, 2021 15:37:25").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate4 - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("countdown4").innerHTML = days + "d " + hours + "h ";
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown4").innerHTML = "TE LAAT";
  }
}, 1000);

/*---------------------------------------------------------------*/

var countDownDate5 = new Date("Dec 5, 2021 15:37:25").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate5 - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("countdown5").innerHTML = days + "d " + hours + "h ";

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown5").innerHTML = "TE LAAT";
  }
}, 1000);

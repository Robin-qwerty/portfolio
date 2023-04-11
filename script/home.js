const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let interval = null;

function animateTitle(title) {
  let iteration = 0;
  clearInterval(interval);
  interval = setInterval(() => {
    title.innerText = title.dataset.value
      .split("")
      .map((letter, index) => {
        if (index < iteration) {
          return letter;
        }
        return letters[Math.floor(Math.random() * 26)];
      })
      .join("");
    if (iteration >= title.dataset.value.length) {
      clearInterval(interval);
    }
    iteration += 1 / 3;
  }, 50);
}

const title = document.querySelector("#title");

if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
  animateTitle(title);
}

title.addEventListener("mouseover", () => {
  animateTitle(title);
});

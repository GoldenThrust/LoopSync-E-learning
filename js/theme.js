// form are from main js
// localStorage.setItem('theme', 'dark');
const theme = document.getElementById("theme");
const themecss = theme.style;
const rootstyle = document.documentElement.style;
document.addEventListener("mousemove", function themepos(event) {
  let heightpercent = (event.y / window.innerHeight) * 100;
  themecss.top = heightpercent - 1.5 + "%";
  if (event.x > window.innerWidth - 20) {
    themecss.right = "0";
  } else {
    themecss.right = "-50px";
  }
});
theme.addEventListener("mousemove", function () {
  themecss.right = "0";
});
let themesrc = theme.querySelector("img");
var watchtheme = '1';
theme.addEventListener("click", () => {
  if (localStorage.getItem("theme") === "dark") {
    themesrc.setAttribute("src", "./img/sun.svg");
    localStorage.setItem("theme", "light");
    watchtheme = 1;
  } else {
    localStorage.setItem("theme", "dark");
    themesrc.setAttribute("src", "./img/moon.svg");
    watchtheme = 0;
  }
})
setInterval(()=> {
if (localStorage.getItem("theme") === "dark") {
  themesrc.setAttribute("src", "./img/sun.svg");
  themecss.backgroundColor = "azure";
  themecss.boxShadow = "none";
  rootstyle.setProperty("--htmlbg", "azhure");
  rootstyle.setProperty("--anchor", "#1d67f0");
  rootstyle.setProperty("--psearch", "#3cc5ff");
  rootstyle.setProperty("--search", "#1d67f0");
  rootstyle.setProperty("--bg", "#3cc5ff");
  rootstyle.setProperty("--color", "#ddffff");
  // rootstyle.setProperty('--txtcolor', 'red');
  rootstyle.setProperty("--inputbg", "aliceblue");
  rootstyle.setProperty("--green", "none");
  rootstyle.setProperty("--inputsub", "#3cc5ff");
  rootstyle.setProperty("--inputtext", "white");
  rootstyle.setProperty("--drop", "#4545cd");
  for (let i = 0; i < form.length; i++) {
    form[i].style.backgroundColor = "transparent";
    form[i].style.animation = "none";
    form[i].style.boxShadow = "none";
    form[i].style.color = "black";
  }
  for (let i = 0; i < forminput.length - 1; i++) {
    forminput[i].style.borderWidth = "0 0 3px";
    forminput[i].style.borderRadius = "0";
    forminput[i].style.backgroundColor = "transparent";
  }
} else {
  themesrc.setAttribute("src", "./img/moon.svg");
  themecss.backgroundColor = "springgreen";
  themecss.boxShadow = "0 0 10px #00ff7f";
  rootstyle.setProperty("--htmlbg", "#06181f");
  rootstyle.setProperty("--anchor", "#00ff7f");
  rootstyle.setProperty("--psearch", " #3d7566");
  rootstyle.setProperty("--search", " #azhure");
  rootstyle.setProperty("--bg", "#0a111f");
  rootstyle.setProperty("--color", "#00ff7f");
  // rootstyle.setProperty('--txtcolor', 'red');
  rootstyle.setProperty("--inputbg", "#1f4a3d");
  rootstyle.setProperty("--green", "green");
  rootstyle.setProperty("--inputsub", "#208d6b");
  rootstyle.setProperty("--inputtext", "black");
  rootstyle.setProperty("--drop", "#14282c");
  for (let i = 0; i < form.length; i++) {
    form[i].style.backgroundColor = "var(--bg)";
    form[i].style.animation = "bgrotate 1s ease-in-out infinite";
    form[i].style.boxShadow = "0px 0px 10px green";
    form[i].style.color = "white";
  }
  for (let i = 0; i < forminput.length - 1; i++) {
    forminput[i].style.borderWidth = "2px";
    forminput[i].style.borderRadius = " 0 20px 0 20px";
    forminput[i].style.backgroundColor = "#223761";
  }
}
}, 10);

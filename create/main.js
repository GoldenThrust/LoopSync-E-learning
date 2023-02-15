const rootstyle = document.documentElement.style;
setInterval(() => {
  if (localStorage.getItem("theme") === "dark") {
    //light mode
    rootstyle.setProperty("--htmlbg", "azhure");
    rootstyle.setProperty("--inputsub", "#3cc5ff");
    rootstyle.setProperty("--inputtext", "white");
    rootstyle.setProperty("--bg", "#transparent");
    rootstyle.setProperty("--text", "black");
  } else {
    // dark mode
    rootstyle.setProperty("--htmlbg", "#06181f");
    rootstyle.setProperty("--bg", "#0a111f");
    rootstyle.setProperty("--inputsub", "#208d6b");
    rootstyle.setProperty("--inputtext", "black");
    rootstyle.setProperty("--text", "white");
  }
}, 10);
"use strict";
// head title
let title = document.getElementsByClassName("title");
for (let tit of title) {
  tit.setAttribute(
    "content",
    document.getElementsByTagName("title")[0].innerText
  );
}
//head title end here

// dropdown button
const dropdown = document.querySelector(".dropdown");
const cancel = document.querySelector(".cancel");
const category = document.querySelector(".category");
const search = document.querySelector(".search-icon");
const searchcon = document.querySelector(".search-container");
const cancelt = document.querySelector(".cancelt");
function clickdisplay(classblock, classnone, classobject) {
  classblock.addEventListener("click", function () {
    classobject.style.display = "block";
  });
  classnone.addEventListener("click", function () {
    classobject.style.display = "none";
  });
}
clickdisplay(category, cancel, dropdown);
clickdisplay(search, cancelt, searchcon);
// dropdown end here

// loader javascript
document.onreadystatechange = function () {
  if (document.readyState !== "complete") {
    document.querySelector("body").style.visibility = "hidden";
    document.querySelector("#load").style.visibility = "visible";
  } else {
    document.querySelector("#load").style.display = "none";
    document.querySelector("body").style.visibility = "visible";
  }
};
// loader javascript end here

// form javascript
const form = document.querySelector(".log");
const formlabel = form.getElementsByTagName('label');
const forminput = form.getElementsByTagName('input');
const screenvar = window.matchMedia("(max-width: 550px)");
// Call listener function at run time
function formmove(formlabel, forminput, screenvar) {
  for (let i = 0; i < formlabel.length; i++) {
    forminput[i].addEventListener("focusin", function () {
      formlabel[i].style.top = "0";
      formlabel[i].style.color = "springgreen";
    });
    forminput[i].addEventListener("focusout", function () {
      if (forminput[i].value === "") {
        formlabel[i].style.color = "#1f112c";
        formlabel[i].style.top = "38px";
        screenvar.addEventListener("change", function () {
          formlabel[i].style.top = "30px";
        });
        if (screenvar.matches) {
          formlabel[i].style.top = "30px";
        }
      }
      /*TODO - add javascript to make it turn sprinnggreen on hover if password correct */
    });
  }
}
// console.log(formlabel[0].innerText);

formmove(formlabel, forminput, screenvar);

// form javascript end here
// addEventListener('')
// class eventlistener{
//     constructor(eventname, handler) {
//         this.eventname = eventname;
//         this.handler = handler;
//         this.listeners = [];
//         document.addEventListener(this.eventname, this.handler, false);
//         return this;
//     }
//     handleEvent(event) {
//         this.handler(this.eventname, event);
//         event.preventDefault();
//         event.stopPropagation();
//         return false;
//     }
//     addEventListener(eventname, handler) {
//         this.handler = handler;
//         document.addEventListener(eventname, this.handleEvent.bind(this));
//         return this;
//     }
//     removeEventListener(eventname, handler) {
//         this.handler = null;
//         this.eventname = eventname;
//         this.handler = null;
//         document.removeEventListener(eventname, this.handleEvent.bind(this));
//         return this;
//     }
//     dispatchEvent(event) {
//         if (this.handler) {
//             this.handler(this.eventname, event);
//             this.removeEventListener(this.eventname, this.handler);
//             this.addEventListener(this.eventname, this.handler);
//             return this;
//         }
//         return true;
//     }
// }

// dropdown button
const dropdown = document.querySelector(".dropdown");
const cancel = document.querySelector(".cancel");
const category = document.querySelector(".category");
const search = document.querySelector(".search-icon");
const searchcon = document.querySelector(".search-container");
const cancelt = document.querySelector(".cancelt");
var error = document.getElementById("error"); //getting the form error message node
function clickdisplay(classblock, classnone, classobject) {
  //function that make an element display page content by click
  classblock.addEventListener("click", function () {
    classobject.style.display = "block";
  });
  classnone.addEventListener("click", function () {
    classobject.style.display = "none";
  });
}
clickdisplay(category, cancel, dropdown); // category modal for mobile
clickdisplay(search, cancelt, searchcon); // search button for mobile
// dropdown end here
// loader javascript
document.onreadystatechange = function () {
  //Function to make a loader appear before the page finish loading
  if (document.readyState !== "complete") {
    document.querySelector("body").style.visibility = "hidden";
    document.querySelector("#load").style.visibility = "visible";
  } else {
    document.querySelector("#load").style.display = "none";
    document.querySelector("body").style.visibility = "visible";
  }
  //TODO:when instructor or buy take us back to login page. when login go back to the original page
};
// loader javascript end here
// form javascript
const form = document.querySelectorAll(".log");
for (let i = 0; i < form.length; i++) {
  var formlabel = form[i].getElementsByTagName("label");
  var forminput = form[i].getElementsByTagName("input");
}

const screenvar = window.matchMedia("(max-width: 550px)"); // Media query
// Call listener function at run time
function formmove(formlabel, forminput, screenvar) {
  // form function to make label move up and stay up if it input in the same div is not empty
  for (let i = 0; i < formlabel.length; i++) {
    forminput[i].addEventListener("focusin", function () {
      formlabel[i].style.top = "0";
      formlabel[i].style.color = "var(--anchor)";
    });
    forminput[i].addEventListener("focusout", function () {
      if (forminput[i].value === "") {
        formlabel[i].style.color = "#1f112c";
        formlabel[i].style.top = "38px";
        screenvar.addEventListener("resize", function () {
          formlabel[i].style.top = "30px";
        });
        if (screenvar.matches) {
          // check if media query matches
          formlabel[i].style.top = "30px";
        }
      }
      /*TODO - add javascript to make it turn sprinnggreen on hover if password correct */
    });
  }
}
formmove(formlabel, forminput, screenvar); //form function triger
// form javascript end here

const d = document.getElementsByClassName("d"); //login and signin button node
const note = document.getElementsByClassName("note"); //add to cart and other node

function createpayment(){
  // window.location = "create/payment.php";
}
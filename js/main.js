// dropdown button

const dropdown = document.querySelector('.dropdown');
const cancel = document.querySelector('.cancel');
const category = document.querySelector('.category');
const search = document.querySelector('.search-icon');
const searchcon = document.querySelector('.search-container');
const cancelt = document.querySelector('.cancelt');
function clickdisplay(classblock,classnone,classobject) {
    classblock.addEventListener('click', function() {
        classobject.style.display = 'block'
    })
    classnone.addEventListener('click', function() {
        classobject.style.display = 'none'
    })
}
console.log(document.querySelector('#load'))
clickdisplay(category, cancel, dropdown)
clickdisplay(search, cancelt, searchcon);
// dropdown end here

// loader javascript
// document.onreadystatechange = function() {
//     if (document.readyState !== "complete") {
//         document.querySelector("body").style.visibility = "hidden";
//         document.querySelector("#load").style.visibility = "visible";
//     } else {
//         document.querySelector("#load").style.display = "none";
//         document.querySelector("body").style.visibility = "visible";
//     }
// };
// loader javascript end here



// head title
var title = document.getElementsByClassName('title');
for(let tit of title)
{
    tit.setAttribute('content', document.getElementsByTagName('title')[0].innerText)
}


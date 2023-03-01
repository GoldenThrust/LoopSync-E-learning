<!DOCTYPE html>
<html lang="en">
      <?php require('meta.php') ?>
<body>
    <?php require('header.php'); ?>
    <main>
        
    </main>
    <?php require('footer.php');?>
<!-- Send mail to me and the person that insert data -->
<!-- create a search suggestion -->
</body>
</html>



XSS(Cross Site Scripting);
MySQLI Injections;




<?php

// Connect to the database
$conn = mysqli_connect('host', 'username', 'password', 'database_name');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// Prepare an insert statement
$sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "sss", $first_name, $last_name, $email);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($conn);

?>


const form = document.querySelectorAll(".log");
for (let i = 0; i < form.length; i++) {
  var formlabel = form[i].getElementsByTagName("label");
  var forminput = form[i].getElementsByTagName("input");
}
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
theme.addEventListener("click", () => {
  let themesrc = theme.querySelector("img");
  if (themesrc.getAttribute("src") === "./img/moon.svg") {
    themesrc.setAttribute("src", "./img/sun.svg");
    themecss.backgroundColor = "azure";
    themecss.boxShadow = "none";
    rootstyle.setProperty("--htmlbg", "azhure");
    rootstyle.setProperty("--bg", "#3cc5ff");
    rootstyle.setProperty("--color", "grey");
    // rootstyle.setProperty('--txtcolor', 'red');
    rootstyle.setProperty("--inputbg", "aliceblue");
    rootstyle.setProperty("--green", "none");
    rootstyle.setProperty("--inputsub", "#3cc5ff");
    rootstyle.setProperty("--inputtext", "white");
    for (let i = 0; i < form.length; i++) {
      form[i].style.backgroundColor = "transparent";
      form[i].style.animation = "none";
      form[i].style.boxShadow = "none";
      form[i].style.color = "black";
    }
    for (let i = 0; i < forminput.length -1; i++) {
      forminput[i].style.borderWidth = "0 0 3px";
      forminput[i].style.borderRadius = "0";
      forminput[i].style.backgroundColor = "transparent";
    }
  } else {
    themesrc.setAttribute("src", "./img/moon.svg");
    themecss.backgroundColor = "springgreen";
    themecss.boxShadow = "0 0 10px #00ff7f";

    rootstyle.setProperty("--htmlbg", "#06181f");
    rootstyle.setProperty("--bg", "#06181f");
    rootstyle.setProperty("--color", "#00ff7f");
    // rootstyle.setProperty('--txtcolor', 'red');
    rootstyle.setProperty("--inputbg", "#1f4a3d");
    rootstyle.setProperty("--green", "green");
    rootstyle.setProperty("--inputsub", "#208d6b");
    rootstyle.setProperty("--inputtext", "black");
    for (let i = 0; i < form.length; i++) {
      form[i].style.backgroundColor = "var(--bg)";
      form[i].style.animation = "bgrotate 1s ease-in-out infinite";
      form[i].style.boxShadow = "0px 0px 10px green";
      form[i].style.color = "white";
    }
    for (let i = 0; i < forminput.length -1; i++) {
      forminput[i].style.borderWidth = "2px";
      forminput[i].style.borderRadius = " 0 20px 0 20px";
      forminput[i].style.backgroundColor = "#223761";
    }
  }
});





<?php

// create,update,delete,select,insert
class database
{
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "loopsync";
  public $conn;
  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }
  public function sec($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $this->conn->real_escape_string($data);
    return $data;
  }
  public function create($table, $column, $value)
  {
    if (isset($_POST['fullname']) && $_POST['email'] && $_POST['password']) {
      $fn = $this->sec($_POST['fullname']);
      $em = $this->sec($_POST['email']);
      $pw = $this->sec($_POST['password']);
      $sql = "INSERT INTO users (fullname, email, password)
    VALUES (?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("sss", $fn, $em, $pw);
      $stmt->execute();
      // if($stmt->execute()){
      // echo "Records added successfully.";
      // } else{
      //   die("Connection failed: " . $this->conn->connect_error);
      // }
      // }
      // else{
      //   echo "<script>document.getElementById('error').innerText = 'Please input the form correctly';</script>";
      // }
      
    }
  }
  public function loggedin() {

  }
  public function __destruct()
  {
    $this->conn->close();
  }
}
$database = new database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>





* {
  /* General Setting*/
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  list-style: none;
}
body{
  color: var(--txtcolor);
}
body a{
  color: var(--txtcolor);
  /* color: #37eeff; */
}
:root {
  --bg: #0a111f;
  --htmlbg: #06181f;
  --color: #00ff7f;
  --anchor: #00ff7f;
  --txtcolor: white;
  --inputbg: #1f4a3d;
  --green: green;
  --inputsub: #208d6b;
  --inputtext: black; 
  --psearch:  #3d7566;
  --search:  azure;
  --drop: #14282c;
}
/* loader css start here */
#load {
  /* Loader Setting */
  position: fixed;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  transform: translate(-50%, -50%);
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: visible;
  /* background-color: #06181f; */
  background-color: var(--htmlbg)ac ;
  z-index: 100;
  backdrop-filter: blur(100px);
  animation: back 3s infinite alternate-reverse ease-in-out;
}
/* svg {
  position: absolute;
  top: 0;
  left: 0;
  z-index: -20;
} */

#load .text {
  /*Loader Text*/
  position: absolute;
  display: flex;
  align-self: center;
  font-size: 100px;
  color: aliceblue;
  padding: 5px;
  border: 5px double var(--color);
  box-shadow: 0 0 10px var(--color), inset 0 0 4px var(--color);
  text-shadow: 0 0 5px var(--color);
  animation: animate 1s alternate-reverse infinite ease-in-out;
  z-index: 10;
  -webkit-box-reflect: below 0px
    linear-gradient(to bottom, #00000000, #00000066);
}
/* loader css start here */

.profile {
  /*User Profile*/
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  position: relative;
  top: 0;
  left: 0;
  border: #00bb5d solid;
  width: 70px;
  height: 70px;
  font-size: larger;
  font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
    "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  background-color: yellowgreen;
}
@media only screen and (max-width: 600px) {
  #load .text {
    font-size: 50px;
  }
}
@keyframes animate {
  from {
    border-radius: 50px 0 50px 0;
  }
  to {
    border-radius: 0 50px 0 50px;
  }
}

html {
  background-color: var(--htmlbg);
}
header {
  margin-bottom: 30px;
}

/* Header style start here */
header h1 {
  display: flex;
  align-self: center;
  font-size: 40px;
  color: aliceblue;
  border-radius: 20px 0 20px 0;
  padding: 5px;
  border: 5px double var(--color);
  box-shadow: 0 0 10px var(--color), inset 0 0 4px var(--color);
  text-shadow: 0 0 5px var(--color);
  transition: all 0.4s ease-in-out;
}
header h1:hover {
  box-shadow: 0 0 15px var(--color), inset 0 0 8px var(--color);
  text-shadow: 0 0 8px var(--color);
  border-radius: 0 20px 0 20px;
}
header .head {
  background-color: var(--bg);
  display: flex;
  justify-content: space-between;
  height: 80px;
  border-radius: 0px 50px 0 50px;
  box-shadow: 0px 2px 5px black;
  font-weight: bold;
}
header a {
  display: flex;
  align-content: center;
}
header span {
  display: grid;
  grid-template-columns: auto auto;
  align-content: center;
}
header img {
  width: 30px;
  margin: 0 10px;
}
header svg {
  width: 30px;
  margin: 0 10px;
}
header img[src="img/search.svg"] {
  width: 23px;
}
.hid {
  display: none;
  align-self: center;
  flex-direction: row;
  justify-content: space-evenly;
  width: 100%;
}
.hid div {
  display: flex;
  align-self: center;
  position: relative;
}
header input {
  position: relative;
  left: 0;
  height: 30px;
  text-shadow: 0px 0px 4px var(--color);
  font-weight: bold;
  border: none;
  background-color: transparent;
  width: 80%;
  color: var(--search);
}
header input::placeholder {
  color: var(--psearch);
  text-shadow: none;
}
header form button img {
  width: 20px;
  height: 20px;
  margin-top: 4px;
  color: #ddffff;
  filter: invert(1) drop-shadow(2px 2px 1px var(--color));
}
header form button svg {
  width: 20px;
  height: 20px;
  margin-top: 4px;
  filter: invert(1) drop-shadow(2px 2px 1px var(--color));
}
input:focus {
  outline: none;
}
header form {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  height: 100%;
  flex-direction: row-reverse;
  background-color: var(--inputbg);
  border-radius: 50px;
  padding: 5px 10px 5px 0;
  border: 2px solid var(--color);
}
button {
  background-color: transparent;
  border: none;
}
.border {
  display: flex;
  border: 4px ridge var(--color);
  width: 100px;
  border-radius: 20px 0 20px 0;
  height: 30px;
  justify-content: center;
  align-self: center;
  font-weight: bold;
  box-shadow: 0 0 10px var(--green), inset 0 0 4px var(--green);
  transition: all 0.4s ease-in-out;
  color: greenyellow;
}
.border:hover {
  border-radius: 0 20px 0 20px;
}
.border:nth-child(3) {
  border-radius: 0 20px 0 20px;
}
.border:nth-child(3):hover {
  border-radius: 20px 0 20px;
}
.center {
  display: flex;
  justify-content: center;
  align-self: center;
}
header .head a {
  margin-left: 20px;
}

/* dropdown mobile */
nav {
  position: absolute;
  top: 0;
  right: 0;
  width: 60%;
  border-radius: 10px;
  background-color: #1b0d21;
}
/* ul{
    z-index: 10;
} */
ul li {
  padding: 20px;
}
nav .disabled {
  font-size: 14px;
  font-weight: bolder;
  color: gray;
}
.cancel {
  top: 20px;
  left: -60px;
}
.c {
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #1b0d21;
  cursor: pointer;
}
.search-container,
.dropdown {
  display: none;
}
.search {
  position: absolute;
  top: 0;
  left: 0;
  margin: auto;
  height: 50px;
  width: 100%;
}
.cancelt {
  right: 10px;
  top: 5px;
  color: purple;
  background-color: transparent;
}
.cover {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #000000a1;
  isolation: isolate;
  backdrop-filter: blur(5px);
}
#carte {
  display: none;
}
header a:hover {
  color: var(--anchor);
}
#carte::before {
  content: "";
  position: absolute;
  top: -25px;
  left: 0;
  width: 200px;
  height: 40px;
  background-color: transparent;
}
#categories:hover ~ nav#carte {
  display: block;
}
nav#carte:hover {
  display: block;
}
.mimage {
  z-index: 1000;
}

@media only screen and (min-width: 800px) {
  .profile {
    width: 45px;
    height: 45px;
  }
  .hid {
    display: flex;
  }
  .mimage {
    display: none;
  }
  header .head a {
    margin-left: 0px;
  }
  /* dropdown laptop */
  nav {
    position: absolute;
    top: 70px;
    left: 3%;
    width: 20%;
    text-align: center;
    background-color: var(--drop);
    box-shadow: 1px 8px 10px #06212c;
  }
  nav ul li {
    border: 3px solid rgb(4, 25, 15);
    display: block;
    text-align: center;
    margin: auto;
  }
  ul li {
    padding: 10px;
  }
}
.notification {
  position: absolute;
  top: 70px;
  right: 8%;
  width: 25%;
  display: none;
}
.notification div:first-child {
  display: flex;
  flex-direction: column;
  height: 100px;
  background-color: var(--drop);
  overflow-y: scroll;
  overflow-wrap: break-word;
}
.nothidden {
  content: "";
  position: absolute;
  top: -16px;
  right: 0;
  width: 100px;
  height: 40px;
  background-color: transparent;
}
.prodrop{
  position: absolute;
  top: 60px;
  right: 0;
  width: 200%;
  display: none;
  text-align: center;
  background-color: var(--drop);
  box-shadow: 1px 8px 10px #06212c;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 10px;
  z-index: 5;
}
.prodrop a {
  margin-top: 10px;
}
.prodrop:hover{
  display: flex;
}
.prodrop:before{
  content: "";
  position: absolute;
  top: -25px;
  left: 0;
  width: 200px;
  height: 40px;
  background-color: transparent;
}
.prodrop form{
  display: flex;
  justify-content: center;
  background-color: var(--drop);
}
.prodrop button{
  display: flex;
  align-items: center;
  font-size: large;
  font-weight: bolder;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  color: var(--inputsub);
  margin-left: 10px;
  cursor: grab;
}
.profile:hover ~ .prodrop{
  display: flex;
}
.notification div:first-child span:first-child {
  padding: 15px;
}
.notification:hover {
  display: block;
}
.notification div:first-child span:last-child {
  padding: 5px 10px;
}
.notify:hover ~ .notification {
  display: block;
}

@media only screen and (max-width: 1050px) {
  .hid .hidd {
    border: 3px solid white;
    display: none;
    visibility: none;
  }
  header .form {
    width: 50%;
    color: var(--anchor);
  }
  header h1 {
    font-size: 35px;
  }
}
@media only screen and (max-width: 540px) {
  header h1 {
    font-size: 30px;
  }
}

/* header END here */

/*TODO use blue shades and white for light mode */

/* background-color: #06181f;     */

/* footer style start here */

footer {
  margin-top: 30px;
  background-color: var(--bg);
  text-align: center;
  padding-bottom: 1px;
}
footer img {
  width: 35px;
  margin: 0 10px;
}
footer svg {
  width: 35px;
  margin: 0 10px;
}
footer div {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
footer .section {
  display: grid;
  grid-template-columns: auto auto auto;
  justify-content: space-around;
  margin-top: 20px;
  row-gap: 20px;
}
footer .logo {
  margin: 50px 10% 30px;
}
footer .logo span:last-of-type {
  margin-right: -8%;
}
footer a:hover {
  color: var(--anchor);
}
footer .logo a {
  font-size: 30px;
  color: aliceblue;
  border-radius: 20px 0 20px 0;
  padding: 5px;
  border: 5px double yellow;
  box-shadow: 0 0 10px yellow, inset 0 0 4px yellow;
  text-shadow: 0 0 5px yellow;
}
footer {
  border-radius: 100px 0 100px 0;
  box-shadow: 0px -2px 10px black;
}
footer span:last-of-type {
  color: gray;
}
@media only screen and (max-width: 500px) {
  footer img {
    margin: 0 10px;
    width: 25px;
  }
  footer svg {
    margin: 0 10px;
    width: 25px;
  }
  footer .section {
    grid-template-columns: auto;
    justify-content: flex-start;
    margin-left: 10%;
  }
  footer .logo {
    flex-direction: row-reverse;
  }
}

@media only screen and (max-width: 430px) {
  footer img {
    margin: 0 4px;
    width: 25px;
  }
  footer svg {
    margin: 0 4px;
    width: 25px;
  }
  footer .logo a {
    font-size: 20px;
  }
}

header .head,
footer {
  border: 3px solid var(--color);
  border-width: 0 5px;
}
.bod {
  border: 3px solid white;
}

/* form style */
body .log {
  display: flex;
  width: 40%;
  height: 80%;
  margin: auto;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  border: solid;
  background-color: var(--bg);
  box-shadow: 0px 0px 10px green;
  border-image-slice: 1;
  border-image: linear-gradient(0deg, red, blue);
  animation: bgrotate 1s ease-in-out infinite;
}
@keyframes bgrotate {
  0% {
    border-image: linear-gradient(0deg, red, blue);
    border-image-slice: 1;
  }
  50% {
    border-image: linear-gradient(180deg, red, blue);
    border-image-slice: 1;
  }
  100% {
    border-image: linear-gradient(360deg, red, blue);
    border-image-slice: 1;
  }
}
.log h2 {
  margin: 20px 0 0;
  color: var(--anchor);
}
.log a {
  color:  var(--inputsub);
}
.log a:hover {
  color: var(--anchor);
}
.log hr {
  width: 80%;
  margin: 10px 0;
}
.log div {
  width: 100%;
}
.log div form {
  margin: auto;
  width: 80%;
}
.log div form div {
  position: relative;
  top: 0;
}
.log label {
  position: absolute;
  top: 38px;
  font-weight: bold;
  left: 10px;
  color: #1f112c;
  transition: all 0.3s cubic-bezier(0.895, 0.03, 0.685, 0.22);
}
.log input {
  background-color: #223761;
  margin: 20px 0;
  height: 55px;
  color: #000;
  width: 100%;
  padding-left: 10px;
  border-radius: 0 20px 0 20px;
}
.log input[type="submit"] {
  font-family: cursive;
  font-size: larger;
  font-weight: bolder;
  background-color: var(--inputsub);
  transition: all 0.3s linear;
  color: var(--inputtext);
}
.log input[type="submit"]:hover {
  background-color: var(--anchor);
}
.log input:focus {
  /* background-color: #218d87; */
  color: var(--anchor);
}
@media only screen and (max-width: 1050px) {
  body .log {
    width: 70%;
  }
}
@media only screen and (max-width: 550px) {
  body .log {
    width: 90%;
  }
  .log h2 {
    font-size: 20px;
  }
  .log input {
    height: 40px;
    margin: 20px 0;
  }
  .log label {
    top: 30px;
  }
}
header .d {
  display: none;
}
header .note {
  display: none;
}

#theme {
  position: absolute;
  top: 0;
  right: -50px;
  background-color: var(--color);
  box-shadow: 0 0 10px #00ff7f;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all cubic-bezier(0.075, 0.82, 0.165, 1) 0.2s;
}
body {
  overflow-x: hidden;
}
::-webkit-scrollbar {
  width: 3px;
  background-color: var(--color);
}
::-webkit-scrollbar-thumb {
  background-color: #000000;
  border-radius: 100%;
}
.notextsvg :is(.cls-2, .cls-1) {
  stroke: white;
  fill: none;
  stroke-width: 10px;
  transition: all 1s ease-in-out;
}
.notextsvg:hover :is(.cls-2, .cls-1) {
  stroke: var(--color);
  stroke-width: 15px;
  stroke-dasharray: 10;
  stroke-dashoffset: 100;
}
.textsvg :is(.cls-2, .cls-1){
  stroke: #ffffff;
  fill: white;
  stroke-width: 1.5px;
  transition: all 1s ease-in-out;
  stroke-dasharray: 0;
  stroke-dashoffset: 10;
}
.textsvg:hover  :is(.cls-2, .cls-1){
  stroke: var(--color);
  fill: var(--color);
  stroke-width: 2px;
  stroke-dasharray: 10;
  stroke-dashoffset: 100;
  fill-opacity: 0.8;
}



const input = document.getElementsByClassName("input");
const label = document.getElementsByTagName("label");
document.getElementById("number").innerText = input.length;
// const pre = document.getElementById("previous");
// const next = document.getElementById("submit");
for (let i = 0; i < input.length; i++) {
  input[i].style.display = "none";
  label[i].style.display = "none";
}
ind = 0;
input[ind].style.display = "block";
label[ind].style.display = "block";
function next() {
  ind++;
  if (ind > input.length - 1) {
    ind = input.length - 1;
  }
  for (let i = 0; i < input.length; i++) {
    input[i].style.display = "none";
    label[i].style.display = "none";
  }
  sessionStorage.setItem("ind", ind);
  input[Number(sessionStorage.getItem("ind"))].style.display = "block";
  label[Number(sessionStorage.getItem("ind"))].style.display = "block";
  document.getElementById("position").innerText = Number(sessionStorage.getItem("ind")) + 1;
}
function prev() {
  ind--;
  if (ind < 0) {
    ind = 0;
  }
  for (let i = 0; i < input.length; i++) {
    input[i].style.display = "none";
    label[i].style.display = "none";
  }
  sessionStorage.setItem("ind", ind);
  input[Number(sessionStorage.getItem("ind"))].style.display = "block";
  label[Number(sessionStorage.getItem("ind"))].style.display = "block";
  document.getElementById("position").innerText = Number(sessionStorage.getItem("ind")) + 1;
}
// const input = document.getElementsByClassName("input");
// const label = document.getElementsByTagName("label");
// document.getElementById("number").innerText = input.length;
// // const pre = document.getElementById("previous");
// // const next = document.getElementById("submit");
// for (let i = 0; i < input.length; i++) {
//   input[i].style.display = "none";
//   label[i].style.display = "none";
// }
// ind = 0;
// input[ind].style.display = "block";
// label[ind].style.display = "block";
// function next() {
//   ind++;
//   if (ind > input.length - 1) {
//     ind = input.length - 1;
//   }
//   for (let i = 0; i < input.length; i++) {
//     input[i].style.display = "none";
//     label[i].style.display = "none";
//   }
//   input[ind].style.display = "block";
//   label[ind].style.display = "block";
//   document.getElementById("position").innerText = ind + 1;
// }
// function prev() {
//   ind--;
//   if (ind < 0) {
//     ind = 0;
//   }
//   for (let i = 0; i < input.length; i++) {
//     input[i].style.display = "none";
//     label[i].style.display = "none";
//   }
//   input[ind].style.display = "block";
//   label[ind].style.display = "block";
//   document.getElementById("position").innerText = ind + 1;
// }

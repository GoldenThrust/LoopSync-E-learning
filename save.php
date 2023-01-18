<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('meta.php') ?>
    <title>LoopSync</title>
    <meta itemprop="title" class="title">
    <meta property="og:title" class="title">
    <meta property="og:url" content="<?php print($currentUrl); ?>">
    <meta itemprop="url" content="<?php print($currentUrl);?>">
    <meta name="twitter:domain" content="<?php print($_SERVER['SERVER_NAME']); ?>">
    <meta name="twitter:url" content="<?php print($currentUrl); ?>">
    <meta name="twitter:title" class="title">
</head>
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
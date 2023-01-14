<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "loopsync";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function input_sec($data){
  $data = trim($data);
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);
  return $data;
}
?>

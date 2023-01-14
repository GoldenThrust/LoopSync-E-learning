
<?php
include "db_config.php";
$fullname = input_sec($_POST['FullName']);
$email = input_sec($_POST['Email']);
$password = input_sec($_POST['Password']);

$sql = "INSERT INTO users (Fullname, email, password)
VALUES ('$fullname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
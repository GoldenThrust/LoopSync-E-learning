<?php
require_once("db_config.php");
$database->read('user', );
$em = $_SESSION['email'];
    $var = "SELECT * FROM users WHERE email='$em'";
    $vares = $database->conn->query($var);
    $verify = password_verify($pw,  $vares->fetch_assoc()['Password']);
    if ($verify) {
        echo 1;
    }
?>
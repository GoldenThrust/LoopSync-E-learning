<?php
session_start();
var_dump($_SESSION);
var_dump($_COOKIE['email']);
?>
     <!-- setcookie("email", $_SESSION['e'], time() + ( 365 * 24 * 60 * 60), "/"); -->
<?php
require_once("db_config.php");
$email = $_GET['prodemail'];
$name = $_GET['prodname'];
$session = $_SESSION['email'];
$database->delete('cart', 'ProductEmail ="' . $email . '" AND ProductName = "' . $name . '" AND AddBy = "' . $session . '"');
?>
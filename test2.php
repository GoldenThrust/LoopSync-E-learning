<?php
require_once("db_config.php");
$email = $_GET['prodemail'];
$name = $_GET['prodname'];
$session = $_SESSION['email'];
if ($database->delete('cart', 'ProductEmail =' . "'$name'" . ' AND ProductName = ' . "'$email'" . ' AND AddBy = ' . "'$session'" . '')) {
    echo "What do you think";
}
echo $text;
?>

$database->delete('cart', 'ProductEmail ="' . $email . '" AND ProductName = "' . $name . '" AND AddBy = "' . $session . '"');
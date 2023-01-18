<?php 
// Connect to the database 
require_once('db_config.php');
var_dump($database->read('users'));
?> 
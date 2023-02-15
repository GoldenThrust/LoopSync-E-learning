<?php
require_once("db_config.php");
$filtered;
$data = $_GET['data'];
$data2 = $_GET['data2'];
if(isset($_SESSION['email'])){
if(isset($database->read('cart')[0])){
    foreach ($database->read('cart') as $key => $value) {
        $unfiltered[] = $value['AddBy'] . $value['ProductName'] . $value['ProductEmail'];
    }
    $filtered = array_filter($unfiltered, function ($elem) {
        $data = $_GET['data'];
        $data2 = $_GET['data2'];
        return $elem === $_SESSION['email'] . $data2 . $data;
    });
}
    if(empty($filtered)){
        echo $database->create("cart", array('AddBy' => $_SESSION['email'], 'ProductName' => $data2,'ProductEmail' => $data));
     }
} else{
    echo 'log';
}

?>
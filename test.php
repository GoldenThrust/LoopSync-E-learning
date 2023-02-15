<?php
require('db_config.php');
$course = $database->read('courses');
$user = $database->read('users');
foreach ($course as $couse) {
    $unfilteredemail[] = $couse['AuthorEmail'];
}
$filteredemail[] = array_filter(array_unique($unfilteredemail), function ($elem) {
    foreach ($GLOBALS['useremail'] as $value) {
       return $elem !== $value;
    }
});
if (empty($filteredemail)) {
    echo 'empty';
    print_r($filteredemail);
} else {
    echo 'not empty';
    print_r($filteredemail);
}
?>
<!--TODO if account delete remove from cart and course -->
<?php
require_once("db_config.php");
    foreach ($database->read('cart') as $key => $value) {
        $unfiltered[] = $value['AddBy'] . $value['ProductName'] . $value['ProductEmail'];
    }
    $filtered = array_filter($unfiltered, function ($elem) {
        $data = $_GET['data'];
        $data2 = $_GET['data2'];
        return $elem === $_SESSION['email'] . $data2 . $data;
    });
    empty($filtered);
?>
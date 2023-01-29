<?php
require('db_config.php');
unset($_SESSION['otp']);
unset($_SESSION['fn']);
unset($_SESSION['e']);
unset($_SESSION['pw']);
if (isset($_SESSION['email'])) {
    $session = $_SESSION['email'];
    $data = $database->read('users', "email = " . "'$session'");
    if (!isset($data[0])) {
        session_unset();
        session_destroy();
        header(
            "location: index.php"
        );
    }
}
$course = $database->read('courses');
?>
<!DOCTYPE html>
<html lang="en">
<?php require('meta.php') ?>
<!-- TODO - compare files in uploads with file to be upload -->
<body>
    <?php require('header.php'); ?>
    <main>
        <img src="img/loop.jpg" alt="banner" style="margin-bottom: 7%;">
        <div class="project">            
        <?php
            for ($i = count($course) - 1; $i > -1; $i--) {
                echo '<div class="component">';
                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
                echo '<div class="link"><button name="'.$i.'" type="submit"><img src="' . $course[$i]['Thumbnail'] . '" ></img></button></div>';
                echo '</form>';
                if (isset($_POST[$i])){
                    echo $course[$i]['Price'];
                    $_SESSION['authemail'] = $course[$i]['AuthorEmail'];
                    $_SESSION['productname'] = $course[$i]['Name'];
                echo '<script>window.location = "productdetail.php";</script>';
                }
                echo '<div class="coursename">' . $course[$i]['Name'] . '</div>';
                foreach ($database->read('users', "Email ='" . $course[$i]['AuthorEmail'] . "'") as $value) {
                    echo '<div class="name">' . $value['Fullname'] . '</div>';
                }
                ;                
                echo '<div>&#8358;' . $course[$i]['Price'] . '</div>';
                echo '</div>';
            } ?>
            <?php
            for ($i = count($course) - 1; $i > -1; $i--) {
                echo '<div class="component">';
                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
                echo '<div class="link"><button name="'.$i.'" type="submit"><img src="' . $course[$i]['Thumbnail'] . '" ></img></button></div>';
                echo '</form>';
                if (isset($_POST[$i])){
                    echo $course[$i]['Price'];;
                }
                echo '<div class="coursename">' . $course[$i]['Name'] . '</div>';
                foreach ($database->read('users', "Email ='" . $course[$i]['AuthorEmail'] . "'") as $value) {
                    echo '<div class="name">' . $value['Fullname'] . '</div>';
                }
                ;                
                echo '<div>&#8358;' . $course[$i]['Price'] . '</div>';
                echo '</div>';
            } ?>
        </div>
    </main>
    <?php require('footer.php'); ?>
    <!--TODO Send mail to me and the person that insert data -->
    <!--TODO create a search suggestion -->
</body>

</html>


<!-- TODO: 404 page -->
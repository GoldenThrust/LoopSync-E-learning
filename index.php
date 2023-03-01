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
} else {
    if (isset($_COOKIE['email'])) {
        $_SESSION['email'] = $_COOKIE['email'];
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
}
if (isset($_POST['checkout'])) {
    header(
        "location: create/payment.php"
    );
} else {
    unset($_SESSION['checkprice']);
    unset($_SESSION['checkout']);
}
$course = $database->read('courses');
// $cart = $database->read('cart', 'AddBy =' . "'$session'");
// foreach ($cart as $key => $value) {
//     $cartcourse[] = $database->read('courses', 'AuthorEmail ="' . $value['ProductEmail'] . '" AND Name = "' . $value['ProductName'] . '"');
// }
?>
<!DOCTYPE html>
<html lang="en">
<?php require('meta.php') ?>
<!-- TODO - compare files in uploads with file to be upload -->

<body>
    <?php require('header.php'); ?>
    <main>
        <div id="cartdisplay" style="z-index: 1;">

        </div>
        <img src="img/loop.jpg" alt="banner" style="margin-bottom: 7%;" id="banner">
        <div class="project">
            <?php
            for ($i = count($course) - 1; $i > -1; $i--) {
                echo '<div class="component"> <div class="cart"><img src="img/cart.svg"></div>';
                echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
                echo '<div class="link"><button name="' . $i . '" type="submit"><img src="' . $course[$i]['Thumbnail'] . '" style="cursor: pointer;"></img></button></div>';
                echo '</form>';
                if (isset($_POST[$i])) {
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
            }
            ; ?>
        </div>
    </main>
    <?php require('footer.php'); ?>
    <?php
    require_once('CartAjax.php');
    ?>
    <!--TODO Send mail to me and the person that insert data -->
    <!--TODO create a search suggestion -->
    <script>
        const image = ["img/loop.jpg", "img/loop2.jpg", "img/loop3.jpg"];
        let bannersrc, banner;
        setInterval(() => {
            banner = document.getElementById('banner');
            bannersrc = banner.getAttribute("src");
            if (bannersrc === image[0]) {
                banner.setAttribute("src", image[1]);
            } else if (bannersrc === image[1]) {
                banner.setAttribute("src", image[2]);
            } else {
                banner.setAttribute("src", image[0]);
            }
        }, 5000);
        console.log(Math.random().toString(36).slice(2))
    </script>
</body>

</html>


<!-- TODO: 404 page -->
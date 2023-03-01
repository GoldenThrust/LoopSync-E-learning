<?php
require('db_config.php');
if (!isset($_SESSION['email'])) {
    header(
        "location: login.php"
    );
}
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
    if (isset($_COOKIE['email'])) 
    {
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
?>
<!DOCTYPE html>
<html lang="en">
<?php require('meta.php') ?>

<body>
    <?php require('header.php'); ?>
    <main class="instruct">
        <div id="cartdisplay" style="z-index: 1;">

        </div>
        <div>
            Click to Start creating Course
            <a href="./create/now.php"><button>Get Started</button></a>
        </div>
        Based on your experience, we think these resources will be helpful
        <div>
            <img src="img/create.jpg" alt=""> <span>

                <h2>Create an Engaging Course</h2>
                Whether you've been teaching for years or are teaching for the first time, you can make an engaging
                course. We've compiled resources and best practices to help you get to the next level, no matter where
                you're starting.
                <a href="./create/now.php"><button>Get Started</button></a>
            </span>
        </div>
    </main>
    <div>
        <?php require('footer.php'); ?>
    </div>
    <?php
    require_once('CartAjax.php');
    ?>
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->
</body>

</html>
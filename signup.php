<?php
require('db_config.php');
$database->read('users');
if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        if ($_POST['password'] === $_POST['cpassword']) {
            $fn = $em = $pw = "";
            $fn = $database->sec($_POST['fullname']);
            $em = $database->sec($_POST['email']);
            $pw = $database->sec($_POST['password']);
            if ($database->create('users', array('fullname' => $fn, 'email' => $em, 'password' => $pw))) {
                $_SESSION['email'] = $em;
                header("location: index.php");
            }
        } else {
            header("location: signup.php?error=Password do not match");
        }
    } else {
        header("location: signup.php?error=Enter valid email");
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('meta.php') ?>
    <title>LoopSync</title>
    <meta itemprop="title" class="title">
    <meta property="og:title" class="title">
    <meta property="og:url" content="<?php print($currentUrl); ?>">
    <meta itemprop="url" content="<?php print($currentUrl); ?>">
    <meta name="twitter:domain" content="<?php print($_SERVER['SERVER_NAME']); ?>">
    <meta name="twitter:url" content="<?php print($currentUrl); ?>">
    <meta name="twitter:title" class="title">
</head>

<body>
    <?php require('header.php'); ?>
    <main>
        <div class="log">
            <div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <h2>Sign Up and Start Learning</h2>
                    </div>
                    <div>
                        <input type="text" name="fullname" required minlength="2" maxlength="64" id="fullName">
                        <label for="fm-1">Fullname</label>
                    </div>
                    <div>
                        <input type="email" name="email" id="email" minlength="7" maxlength="64">
                        <label for="em">Email</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" required minlength="6" maxlength="64">
                        <label for="pw">Password</label>
                    </div>
                    <div>
                        <input type="password" name="cpassword" id="cpassword" required minlength="6" maxlength="64">
                        <label for="cpassword">Confirm Password</label>
                    </div>
                    <input type="submit" value="Sign Up">
                </form>
            </div>
            <div>
                By signing up, you agree to our <a href="">Terms of Use</a> and <a href="">Privacy Policy.</a>.
            </div>
            <hr>
            <div style="margin-bottom: 20px;">
                Already have an account? <a href="login.php">Log in</a>
            </div>
            <div style="color: red;"> <?php if (isset($_REQUEST['error']))
                                            echo $_REQUEST['error']; ?></div>
        </div>
    </main>
    <?php require('footer.php'); ?>
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->

</body>

</html>
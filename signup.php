<?php
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
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
            <form action="test.php" method="post">
                <div>
                    <h2>Sign Up and Start Learning</h2>
                </div>
                <div>
                    <input type="text" name="fullName" required minlength="2" maxlength="64" id="fullName">
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
                    <input type="password" name="confirm-password" id="confirm-password" required minlength="6" maxlength="64">
                    <label for="cpw">Confirm Password</label>
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
    </div>
    </main>
    <?php require('footer.php'); ?>
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->
</body>

</html>


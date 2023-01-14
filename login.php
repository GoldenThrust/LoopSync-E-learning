<?php
// session_start();

// include_once "db_config.php";

// $fullname = $email = $password = '';

// if($_SERVER["username"] == "POST"){
    
// }

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
    <main>
    <?php require('header.php'); ?>
    <div class="log">
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div>
                    <h2>Log in to your LoopSync account</h2>
                </div>
                <div>
                    <input type="email" name="email" id="email" minlength="7" maxlength="64" required>
                    <label for="em">Email</label>
                </div>
                <div>
                    <input type="password" name="password" id="password" required minlength="6" maxlength="64">
                    <label for="pw">Password</label>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
        <div>
            or <a href="">Forgot Password</a>
        </div>
        <hr>
        <div style="margin-bottom: 20px;">
            Don't have an account? <a href="Signup.php">Sign up</a>
        </div>
    </div>
    </main>
    <?php require('footer.php'); ?>
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->
</body>

</html>
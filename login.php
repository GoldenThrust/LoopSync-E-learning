<?php
require('db_config.php');
if (isset($_POST['email']) && isset($_POST['password'])) {
    $em = $database->sec($_POST['email']);
    $pw = $database->sec($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$em' and password='$pw';";
    $result = $database->conn->query($sql);
    if ($result->num_rows > 0) {
        //create a session
        $_SESSION['email'] = $em;
        header("location: index.php");
    } else {
        header("location: login.php?error=Please check your password and email or <a href='signup.php'>Sign Up</a>");
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
    <main>
        <?php require('header.php'); ?>
        <div class="log">
            <div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                Don't have an account? <a href="Signup.php">Sign Up</a>
            </div>
            <div style="color: red;"> <?php if (isset($_REQUEST['error']))
                                            echo $_REQUEST['error']; ?></div>
        </div>
    </main>
    <?php require('footer.php'); ?>
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->
    <div id="error"></div>
</body>

</html>
<?php
require('db_config.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: index.php");
}
if (isset($_POST['email']) && isset($_POST['password'])) {
    $em = $database->sec($_POST['email']);
    $pw = $database->sec($_POST['password']);
    $var = "SELECT * FROM users WHERE email='$em'";
    $vares = $database->conn->query($var);
    if ($vares->num_rows > 0) {
    $verify = password_verify($pw,  $vares->fetch_assoc()['Password']);
    if ($verify) {
        //create a session
        $_SESSION['email'] = $em;
        header("location: index.php");
    } else {
        header("location: login.php?error=Please check your password and email or <a href='signup.php'>Sign Up</a>");
    }
    } else {
        header("location: login.php?error=Please check your email or <a href='signup.php'>Sign Up</a>");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require('meta.php') ?>

<body>
    <?php require('header.php'); ?>

    <main>
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
        </div>
        <?php
        if (isset($_REQUEST['error'])) {
            echo ' <div style=" animation-play-state: running;" id="error">' . $_REQUEST['error'] .
                '</div>';
        }
        ?>
    </main>
    <?php require('footer.php'); ?>
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->
</body>

</html>
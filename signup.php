<?php
require('db_config.php');
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: index.php");
}
$database->read('users');

if(!isset($_POST['fullname']) && !isset($_POST['email']) && !isset($_POST['password'])) {
    $_SESSION['otp'] = random_int(100000, 999999);
}
if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])) {
    $data = $_POST['email'];
    $check = $database->read('users', 'email = ' . "'$data'");
    if (!isset($check[0])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            if ($_POST['password'] === $_POST['cpassword']) {
                $fn = $em = $pw = "";
                $fn = $database->sec($_POST['fullname']);
                $em = $database->sec($_POST['email']);
                $pw = $database->sec($_POST['password']);
                $headers = "From: buynance631@gmail.com \r\n";
                $headers .= "Reply-To: buynance631@gmail.com \r\n";
                $headers .= "CC: " . $em . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $message = "
                <!DOCTYPE html>
                <html lang='en-US'>
                
                <head>
                    <title>LoopSync</title>
                    <style>
                    table{
                        border: solid;
                        width: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        text-align: center;
                        border-spacing: 10px;
                        font-size: 19px;
                    }
                    tr{
                        text-align: center;
                        width: 100%;
                    }
                    td{
                        width: 100%;
                        text-align: center;
                    }
                    </style>
                </head>

                <body>
                    <table>
                        <tr>
                            <th>
                                <h1>LoopSync</h1>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <span>Hello</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>You Have requested to sign up for an account on LoopSync.</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Use the verification Code bellow to Activate Your Account</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style='font-size: 25px; font-size:xx-large;background-color: green;color:azure;'>" . $_SESSION['otp'] . "</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>If you didn't initaite the request kindly ignore</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Thank you</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>LoopSync</span>
                            </td>
                        </tr>
                    </table>
                </body>

                </html>
                ";
                if (mail($em, 'Email Verification OTP', $message, $headers)) {
                    $_SESSION['fn'] = $fn;
                    $_SESSION['e'] = $em;
                    $_SESSION['pw'] = $pw;
                    header("location: otp.php");
                } else {
                    header("location: signup.php?error=Email not Verify");
                }
            } else {
                header("location: signup.php?error=Password do not match");
            }
        } else {
            header("location: signup.php?error=Enter valid email");
        }
    } else {
        header("location: signup.php?error=Email has already been register");
    }
}
?>
<!-- TODO- check words -->

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
                        <h2>Sign Up and Start Learning</h2>
                    </div>
                    <div>
                        <input type="text" name="fullname" required minlength="2" maxlength="64" id="fullName">
                        <label for="fm-1">Fullname</label>
                    </div>
                    <div>
                        <input type="email" name="email" id="email" minlength="7" maxlength="64" required>
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
                    <input type="submit" value="Sign Up" id="signin">
            </div>
            <div>
                By signing up, you agree to our <a href="">Terms of Use</a> and <a href="">Privacy Policy.</a>.
            </div>
            <hr>
            <!-- TODO - author generated -->
            <div style="margin-bottom: 20px;">
                Already have an account? <a href="login.php">Log in</a>
            </div>
        </div>
        <?php
        if (isset($_REQUEST['error'])) {
            echo ' <div style="animation-play-state: running;" id="error">' . $_REQUEST['error'] .
                '</div>';
        }
        ?>
        </form>
    </main>
    <?php require('footer.php'); ?>
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->
    <script>

    </script>
</body>

</html>
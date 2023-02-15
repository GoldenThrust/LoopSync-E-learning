<?php
require('db_config.php');
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: index.php");
}
if(!$_SESSION['e']){
    header("location: signup.php");
}
$code = $_SESSION['otp'];
if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    if ($otp == $code) {
        if ($database->create('users', array('fullname' => $_SESSION['fn'], 'email' => $_SESSION['e'], 'password' => password_hash( $_SESSION['pw'], PASSWORD_DEFAULT)))) {
            $_SESSION['email'] = $_SESSION['e'];
            header("location: index.php");
        }
    } else {
        header("location: signup.php?error=Email not Verify");
    }
} ?>
<!DOCTYPE html>
<html lang="en">
<?php
require('meta.php');
?>

<body>
    <div class="otp">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="otp">OTP has been send to Your email <?php $code ?></label>
        <input type="number" name="otp" id="otp">
        <input type="submit" value="Submit">
    </form>
    </div>
</body>

</html>
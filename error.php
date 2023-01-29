<?php
require('db_config.php');
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require('meta.php');
?>

<body>
    <div class="otp">
        <?php
        if(isset($_REQUEST['error']))
        {
            echo '<h1>' . $_REQUEST['error'] . '</h1>';
        }
        ?>
    </div>
    <script>
        setTimeout(()=>{
            window.location = 'create/now.php';
        }, 2000);
    </script>
</body>

</html>
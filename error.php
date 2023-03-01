<?php
require('db_config.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require('meta.php');
?>

<body>
    <style>
        #page {}
    </style>
    <div class="otp">
        <h1 id="page"  style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);font: italic small-caps normal 24px cursive;">
        </h1>
    </div>
    <script>

        let text = '';
        <?php
        if (isset($_REQUEST['error'])) {
            echo 'text ="' . $_REQUEST['error'] . '";';
        }
        ?>
        const speed = 50;

        for (let i = 0; i < text.length; i++) {
            setTimeout(() => {
                document.getElementById("page").textContent += text[i];
                if (i == text.length - 1) {
                    setTimeout(() => {
                        window.location = 'create/now.php';
                    }, 2000);
                }
            }, i * speed);
        }
    </script>
</body>

</html>
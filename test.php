<?php
require('db_config.php');
$course = $database->read('courses');
if(isset($_POST['gcc'])){
    echo 'late';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('meta.php') ?>
    <meta itemprop="title" class="title">
    <meta property="og:title" class="title">
    <meta property="og:url" content="<?php print($currentUrl); ?>">
    <meta itemprop="url" content="<?php print($currentUrl); ?>">
    <meta name="twitter:domain" content="<?php print($_SERVER['SERVER_NAME']); ?>">
    <meta name="twitter:url" content="<?php print($currentUrl); ?>">
    <meta name="twitter:title" class="title">
</head>

<body>


    <header>
        <div>
            <span>LoopSync</span>
        </div>
    </header>
    <main>
        <div class="project">
            <?php
            for ($i = count($course) - 1; $i > -1; $i--) {
                $rate = $course[$i];
            } ?>
        </div>
        <div id="alert">rate</div>
    </main>
    <script>
        var link = document.getElementsByClassName('link');
        var name = document.getElementsByClassName('name')[0];
        var cname = document.getElementsByClassName('coursename')[0];
        <?php
        $_SESSION['alert'] = printf('document.getElementById("alert").innerText;');
        ?>
        for (let i = 0; i < link.length; i++) {
        link[i].addEventListener('click', () => {
            alert(<?php
            echo $_SESSION['alert']
                ?>);
            // alert(cname[0].innerTexts);
        });
        }
    </script>
    <script src="main.js"></script>
</body>

</html>
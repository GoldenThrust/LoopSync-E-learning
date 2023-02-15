<?php
require('db_config.php');
unset($_SESSION['otp']);
unset($_SESSION['fn']);
unset($_SESSION['e']);
unset($_SESSION['pw']);
if (isset($_SESSION['email'])) {
    $session = $_SESSION['email'];
    $data = $database->read('users', "email = " . "'$session'");
    if (!isset($data[0])) {
        session_unset();
        session_destroy();
        header(
            "location: index.php"
        );
    }
}
$specourse = $database->read('courses', 'AuthorEmail ="' . $_SESSION['authemail'] . '" AND Name = "' . $_SESSION['productname'] . '"');
$user = $database->read('users', "Email ='" . $_SESSION['authemail'] . "'");
$course = $database->read('courses');

$rand = [];
for ($i = 0; $i < 3; $i++) {
    $rad = rand(0, count($course));
    if ($rand === []) {
        array_push($rand, $rad);
    } else if (isset($rand[1])) {
        if ($rand[0] === $rad || $rand[1] === $rad) {
            $rad = rand(0, count($course) - 1);
            $i--;
        } else {
            array_push($rand, $rad);
        }
    } else {
        if ($rand[$i - 1] === $rad) {
            $rad = rand(0, count($course) - 1);
            $i--;
        } else {
            array_push($rand, $rad);
        }
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
    <?php require('header.php'); ?>
    <main class="detailpage">
        <div class="introcard">
            <video src="<?php echo $specourse[0]['Trailer'] ?>" id="trailer"></video>
            <div id="pp"><img src="img/playbutton.svg" alt=""></div>
            <div class="prodname"><span>
                    <?php echo $user[0]['Fullname'] ?>
                </span> <span>New</span></div>
            <div>
                &#8358;
                <?php echo $specourse[0]['Price'] ?>
            </div>
            <div><a href="create/payment.php" class="buynow">Buy Now</a></div>
            <div>This course includes</div>
            <ul>
                <li>7.5 hours on-demand video</li>
                <li>75 downloadable resources</li>
                <li>Full lifetime access</li>
                <li contenteditable="true">Access on mobile and TV</li>
                <li>Certificate of completion</li>
            </ul>
            <div><span class="share"><a href="">Share</a></span><span><a href="">Gift this Course</a></span><span><a
                        href="">Apply Coupon</a></span></div>

            <div>Training 5 or more people? Get your team access to 17,000+ top LoopSync courses anytime, anywhere.
            </div>

        </div>
        <div id="details">
            <div class="details">
                <div>
                    <div class="detailtitle">
                        <h1>
                            <?php echo $specourse[0]['Name'] ?>
                        </h1>
                        <div>
                            <?php echo $specourse[0]['SubDescription'] ?>
                        </div>
                    </div>
                    <div class="requirement">
                        <div>Requirements</div>
                        <div>
                            <?php echo str_replace('\r\n', "<br/>", $specourse[0]['Requirement']) ?>
                        </div>
                    </div>
                    <div class="requirement">
                        <div>Description </div>
                        <div>
                            <?php echo str_replace('\r\n', "<br/>", $specourse[0]['Description']) ?>
                        </div>
                    </div>
                    <div class="requirement">
                        <div>Similar</div>
                        <div class="other">
                            <?php
                            for ($i = 0; $i < count($rand); $i++) {
                                echo '<div class="component">';
                                echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
                                echo '<span class="link"><button name="' . $i . '" type="submit"><img src="' . $course[$i]['Thumbnail'] . '" ></img></button></span>';
                                echo '</form>';
                                if (isset($_POST[$i])) {
                                    echo $course[$i]['Price'];
                                    $_SESSION['authemail'] = $course[$i]['AuthorEmail'];
                                    $_SESSION['productname'] = $course[$i]['Name'];
                                    echo '<script>window.location = "productdetail.php";</script>';
                                }
                                foreach ($database->read('users', "Email ='" . $course[$i]['AuthorEmail'] . "'") as $value) {
                                    echo '<span class="name">' . $value['Fullname'] . '</span>';
                                }
                                ;
                                echo '<div/>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="buy"><a href="create/payment.php" id="buynow">
            Buy Now
        </a></div>
    <?php require('footer.php'); ?>
    <!--TODO rate a tutor-->
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->
    <script>
        const pp = document.getElementById('pp');
        const ppimg = pp.querySelector('img');
        const vid = document.getElementById('trailer')
        pp.onclick = () => {
            if (ppimg.getAttribute('src') === 'img/playbutton.svg') {
                ppimg.setAttribute('src', 'img/pausebutton.svg')
                vid.play();
            }
            else {
                ppimg.setAttribute('src', 'img/playbutton.svg')
                vid.pause()
            }
        }
        const share = document.querySelector('.share')
        share.onclick = () => {
            navigator.clipboard.writeText(window.location.href);
        }
        function scroll() {
            const screensize = window.matchMedia("(Max-width: 800px)");
            const buy = document.getElementById("buynow");
            var detailstop = document.getElementById("details").getBoundingClientRect().top;
            if (detailstop < 300) {
                if (screensize.matches) {
                    buy.style.display = "flex";
                }
                else {
                    buy.style.display = "none";
                }
                window.addEventListener("resize", () => {
                    if (screensize.matches) {
                        buy.style.display = "flex";
                    }
                    else {
                        buy.style.display = "none";
                    }
                })
            } else {
                buy.style.display = "none";
            }
        }
        window.addEventListener("scroll", scroll);
    </script>
</body>

</html>
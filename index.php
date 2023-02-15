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
$course = $database->read('courses');
// $cart = $database->read('cart', 'AddBy =' . "'$session'");
// foreach ($cart as $key => $value) {
//     $cartcourse[] = $database->read('courses', 'AuthorEmail ="' . $value['ProductEmail'] . '" AND Name = "' . $value['ProductName'] . '"');
// }
?>
<!DOCTYPE html>
<html lang="en">
<?php require('meta.php') ?>
<!-- TODO - compare files in uploads with file to be upload -->

<body>
    <?php require('header.php'); ?>
    <main>

        <div id="cartdisplay">

        </div>
        <img src="img/loop.jpg" alt="banner" style="margin-bottom: 7%;">
        <div class="project">
            <?php
            for ($i = count($course) - 1; $i > -1; $i--) {
                echo '<div class="component"> <div class="cart"><img src="img/cart.svg"></div>';
                echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
                echo '<div class="link"><button name="' . $i . '" type="submit"><img src="' . $course[$i]['Thumbnail'] . '" ></img></button></div>';
                echo '</form>';
                if (isset($_POST[$i])) {
                    echo $course[$i]['Price'];
                    $_SESSION['authemail'] = $course[$i]['AuthorEmail'];
                    $_SESSION['productname'] = $course[$i]['Name'];
                    echo '<script>window.location = "productdetail.php";</script>';
                }
                echo '<div class="coursename">' . $course[$i]['Name'] . '</div>';
                foreach ($database->read('users', "Email ='" . $course[$i]['AuthorEmail'] . "'") as $value) {
                    echo '<div class="name">' . $value['Fullname'] . '</div>';
                }
                ;
                echo '<div>&#8358;' . $course[$i]['Price'] . '</div>';
                echo '</div>';
            }
            ; ?>
            <?php
            for ($i = count($course) - 1; $i > -1; $i--) {
                echo '<div class="component"> <div class="cart"><img src="img/cart.svg"></div>';
                echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">';
                echo '<div class="link"><button name="' . $i . '" type="submit"><img src="' . $course[$i]['Thumbnail'] . '" ></img></button></div>';
                echo '</form>';
                if (isset($_POST[$i])) {
                    echo $course[$i]['Price'];
                    ;
                }
                echo '<div class="coursename">' . $course[$i]['Name'] . '</div>';
                foreach ($database->read('users', "Email ='" . $course[$i]['AuthorEmail'] . "'") as $value) {
                    echo '<div class="name">' . $value['Fullname'] . '</div>';
                }
                ;
                echo '<div>&#8358;' . $course[$i]['Price'] . '</div>';
                echo '</div>';
            } ?>
        </div>
    </main>
    <?php require('footer.php'); ?>
    <!--TODO Send mail to me and the person that insert data -->
    <!--TODO create a search suggestion -->
    <script>
        const xhr = new XMLHttpRequest();
        const cartdispl = document.getElementById('cartdisplay')
        var cart = document.getElementsByClassName('cart');
        <?php
        for ($i = count($course) - 1; $i > -1; $i--) {
            ?>
            <?php echo "cart[" . $i . "].addEventListener('click', function () {";
            echo "xhr.open('GET', 'addCart.php?data=" . $course[$i]['AuthorEmail'] . "&data2=" . $course[$i]['Name'] . "'); xhr.send();"; ?>
            xhr.onreadystatechange = function () {
                // alert('Success'+ <?php //echo $i ?>);
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    if (this.responseText === 'log') {
                        alert('Add cart failed. Login in or Sign Up')
                    } else {
                        if (this.responseText !== '') {
                            alert('Add cart successfully');
                            xhr.open('GET', 'Cart.php', true);
                            xhr.send();
                            xhr.onreadystatechange = function () {
                                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                                    cartdispl.innerHTML = this.responseText;
                                }
                            };
                        } else {
                            alert('Existing cart')
                        }
                    }
                }
            };
                                                    });
            <?php
        }
        ?>
        xhr.open('GET', 'Cart.php', true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                cartdispl.innerHTML = this.responseText;
                const removecart = document.getElementsByClassName('removecart');
                for (let i = 0; i < removecart.length; i++) {
                    removecart[i].addEventListener('click', () => {
                        let url = 'prodname=' + removecart[i].parentNode.children[1].children[0].innerText + '&prodemail=' + removecart[i].parentNode.children[1].children[1].innerText;
                        console.log(url);
                        xhr.open('GET', 'Cart.php?' + url, true);
                        console.log('sent')
                        xhr.send();
                        xhr.onreadystatechange = function () {
                            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                                cartdispl.innerHTML = this.responseText;
                                console.log(this.responseText);
                            }
                        };
                    })
                }
            }
        };
    </script>
</body>

</html>


<!-- TODO: 404 page -->
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
} else {
    if (isset($_COOKIE['email'])) 
    {
        $_SESSION['email'] = $_COOKIE['email'];
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
}
if (isset($_POST['checkout'])) {
    header(
        "location: create/payment.php"
    );
} else {
    unset($_SESSION['checkprice']);
    unset($_SESSION['checkout']);
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
    <main id="mobilecart">
    </main>
    <?php require('footer.php'); ?>
    <script>
        const xhr = new XMLHttpRequest();
        const removecart = document.getElementsByClassName('removecart');

        const cartdispl = document.getElementById('mobilecart');

        function xhrRequest(request, resfunction, arg = "true") {
            xhr.open('GET', request);
            xhr.send();
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    if (arg) {
                        cartdispl.innerHTML = this.responseText;
                    }
                    resfunction();
                }
            };
        }
        // function displayCart() {
            xhrRequest('Cart.php', removeCart);
        // }
        // displayCart();
        function removeCart() {
            // setTimeout(()=>{
            for (let i = 0; i < removecart.length; i++) {
                removecart[i].addEventListener('click', () => {
                    let url = 'deleteCart.php?prodname=' + removecart[i].parentNode.children[1].children[0].innerText + '&prodemail=' + removecart[i].parentNode.children[1].children[1].innerText;
                    xhrRequest(url, displayCart);
                })
            }
            // }, 2000)
        }
    </script>
    <!-- Send mail to me and the person that insert data -->
    <!-- create a search suggestion -->
</body>

</html>
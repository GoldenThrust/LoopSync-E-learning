<script>
    const xhr = new XMLHttpRequest();
    const cartdispl = document.getElementById('cartdisplay');
    const removecart = document.getElementsByClassName('removecart');

    var cart = document.getElementsByClassName('cart');
    if (cart[0]) {
        console.log(cart[0].innerHTML);

        var non;
        <?php
        $j = [];
        for ($i = count($course) - 1; $i > -1; $i--) {
            array_push($j, $i);
        }
        for ($i = count($course) - 1; $i > -1; $i--) {
            ?>
            <?php
            echo "cart[" . $j[$i] . "].addEventListener('click', function () {";
            echo "xhr.open('GET', 'addCart.php?data=" . $course[$i]['AuthorEmail'] . "&data2=" . $course[$i]['Name'] . "'); xhr.send();"; ?>
            xhr.onreadystatechange = function () {
                // alert('Success'+ <?php //echo $i ?>);
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    if (this.responseText === 'log') {
                        alert('Add cart failed. Login in or Sign Up')
                    } else {
                        if (this.responseText !== '') {
                            alert('Add cart successfully');
                            displayCart();
                        } else {
                            alert('Existing cart')
                        }
                    }
                }
            };
            <?php
            echo "});";
        }
        ?>
    }
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
    function displayCart() {
        xhrRequest('Cart.php', removeCart);
    }
    displayCart();
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
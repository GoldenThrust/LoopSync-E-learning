<?php
require('../db_config.php');
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
            "location: ../index.php"
        );
    }
}
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: ../instructor.php");
}
if (!isset($_SESSION['email'])) {
    header(
        "location: ../login.php"
    );
}
if (!isset($_SESSION['checkout'])) {
    $specourse = $database->read('courses', 'AuthorEmail ="' . $_SESSION['authemail'] . '" AND Name = "' . $_SESSION['productname'] . '"');
    $user = $database->read('users', "Email ='" . $_SESSION['authemail'] . "'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('meta.php') ?>
    <link rel="stylesheet" href="payment.css">
</head>

<body>
    <main>
        <div class="fieldset">
            <form action="../paymentcomplete.php" method="post" id="pay">
                <!-- leftbar for the payment -->
                <div class="leftbar">
                    <div class="text">
                        <div>Card Number</div>
                        <p>Enter the 16-digit card number on the card</p>
                    </div>
                    <div class="pin">
                        <img src="../img/mastercard.png" alt="mastercard" style="width: 30px;">
                        <input type="number" name="pin" placeholder="1234 - 5626 - 2637 - 2562" autocomplete="off"
                            required>
                    </div>
                    <div>
                        <div class="text">
                            <div>CVV Number</div>
                            <p>Enter the 3 or 4 digt number on the card</p>
                        </div>
                        <div>
                            <input type="number" name="cvv" id="cvv" placeholder="234" style="text-align: center;"
                                autocomplete="off" required>
                        </div>
                        <div class="text">
                            <div>
                                Expiry Date
                            </div>
                            <p>
                                Enter the expiration date of the card
                            </p>
                        </div>
                        <div class="align">
                            <input type="number" name="exp1" placeholder="06" style="text-align: center;" max="12"
                                required>
                            <span style="font-size: 40px;font-weight: bolder;margin: 0 20px;">/</span>
                            <input type="number" name="exp2" placeholder="24" style="text-align: center;"
                                autocomplete="off" max="40" required>
                        </div>
                        <div class="text">
                            <div>
                                password
                            </div>
                            <p>
                                Enter your Dynamic password
                            </p>
                        </div>
                        <div>
                            <input type="password" name="pass" id="pass"
                                style="text-align: center; letter-spacing: 20px;" placeholder="********"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Pay">
                    </div>
                </div>
            </form>
            <!-- right bar for card info -->
            <div class="rightbar">
                <!-- atm card  -->
                <div class="card">
                    <div class="chip">
                        <img src="../img/atm.png" alt="atm Card">
                    </div>
                    <div class="wifi">
                        <img src="../img/wifi.png" alt="wifi">
                    </div>
                    <div class="block">
                        <div id="randomName">
                            <?php
                            echo $data[0]['Fullname'];
                            ?>
                        </div>
                        <div id="cardNum" style="letter-spacing: 4px;">
                            0000000000000000
                        </div>
                    </div>
                    <div class="iconmas">
                        <img src="../img/mastercard.png" alt="mastercard">
                        <p>mastercard</p>
                    </div>
                    <div id="date">00/00</div>
                </div>
                <!-- TODO: check password -->
                <!-- product info -->
                <div class="proinfo">
                    <table>
                        <tr>
                            <td>Author</td>
                            <td id="author">
                                <?php
                                if (isset($_SESSION['checkout'])) {
                                    echo "Checking out";
                                } else {
                                    echo $user[0]['Fullname'];
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Order Number
                            </td>
                            <td id="randnum">
                                12345617
                            </td>
                        </tr>
                        <!-- TODO: create a virtual bank and admin page to do changes to the page -->
                        <tr>
                            <td>
                                Product
                            </td>
                            <td id="title">
                                <?php
                                if (isset($_SESSION['checkout'])) {
                                    echo "Checking out";
                                } else {
                                    echo $specourse[0]['Name'];
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="payprice">
                    <p>You have to Pay</p>
                    <h2>
                        &#8358; <span id="paym">
                            <?php
                            if (isset($_SESSION['checkprice'])) {
                                echo $_SESSION['checkprice'];
                            } else {
                                echo $specourse[0]['Price'];
                            }
                            ?>
                        </span>
                    </h2>
                </div>
            </div>
            <p id="error" style="font-size: 16px;"></p>
        </div>
    </main>
    <script>
        var e, e1, e2;
        var checker = "";
        function paym(i) {
            pay[i].addEventListener('invalid', function (event) {
                if (event.target.validity.valueMissing) {
                    event.target.setCustomValidity('Input Not valid');
                }
            })
            pay[i].addEventListener('change', function (event) {
                event.target.setCustomValidity('');
            })
            pay[i].addEventListener("blur", () => {
                if (pay[i].value == "") {
                    pay[i].style.border = "1px solid red";
                    pay[i].style.backgroundColor = "pink";
                    error.style.visibility = "visible";
                    error.innerText = "Field Empty";
                } else {
                    pay[i].style.border = "1px solid black";
                    if (localStorage.getItem("theme") === "dark") {
                        pay[i].style.backgroundColor = "white";
                    } else {
                        pay[i].style.backgroundColor = "black";
                    }
                    error.style.visibility = "hidden";
                    if (i === 0) { //cardnumbers
                        console.log()
                        pay[i].style.border = "none";
                    }
                }
                if (i === 0) { //cardnumbers
                    if (pay[i].value.length < 16) {
                        pay[i].style.border = "1px solid red";
                        pay[i].style.backgroundColor = "pink";
                        error.style.visibility = "visible";
                        error.innerText = "Invalid card number";
                    }
                }
                if (i === 1) { // cvv
                    if (pay[i].value.length < 3) {
                        pay[i].style.border = "1px solid red";
                        pay[i].style.backgroundColor = "pink";
                        error.style.visibility = "visible";
                        error.innerText = "Invalid cvv number";
                    }
                }
                if (i === 2) { // exp 1
                    if (pay[i].value.length < 2 || pay[i].value > 12 || pay[i].value < 0) {
                        pay[i].style.border = "1px solid red";
                        pay[i].style.backgroundColor = "pink";
                        error.style.visibility = "visible";
                        error.innerText = "Invalid cvv number";
                    }
                }
                if (i === 3) { // exp 2
                    if (pay[i].value.length < 2 || pay[i].value > 50 || pay[i].value < parseInt(new Date().getFullYear().toString().slice(2, 4))) {
                        pay[i].style.border = "1px solid red";
                        pay[i].style.backgroundColor = "pink";
                        error.style.visibility = "visible";
                        error.innerText = "Invalid cvv number";
                    }
                }
            })
            pay[i].addEventListener("input", () => {
                if (i === 0) { // cardnumber
                    if (pay[i].value.length > 16) {
                        pay[i].value = pay[i].value.slice(0, -1)
                    }
                    document.getElementById("cardNum").innerText = pay[i].value;
                }
                if (i === 1) { // cvv
                    if (pay[i].value.length > 4) {
                        pay[i].value = pay[i].value.slice(0, -1)
                    }
                }
                if (i === 2) { // exp 1
                    if (pay[i].value.length > 2) {
                        pay[i].value = pay[i].value.slice(0, -1);
                    }
                    e1 = pay[i].value;
                    e = e1 + "/";
                    document.getElementById("date").innerText = e;

                }
                if (i === 3) { // exp 2
                    if (pay[i].value.length > 2) {
                        pay[i].value = pay[i].value.slice(0, -1);
                    }
                    e2 = pay[i].value;
                    e = e1 + "/" + e2;
                    document.getElementById("date").innerText = e;

                }
            });
        }

        for (let i = 0; i < pay.length - 1; i++) {
            pay[pay.length - 1].addEventListener('click', function (e) {
                if (pay[i].style.backgroundColor === "pink"){
                    e.preventDefault();
                } else {
                    return true;
                }
            })
            if (localStorage.getItem("theme") === "dark") {
                pay[i].style.backgroundColor = "white";
            } else {
                pay[i].style.backgroundColor = "black";
            }
            paym(i);
        }
    </script>
    <script src="main.js"></script>
</body>

</html>
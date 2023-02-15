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
$specourse = $database->read('courses', 'AuthorEmail ="' . $_SESSION['authemail'] . '" AND Name = "' . $_SESSION['productname'] . '"');
$user = $database->read('users', "Email ='" . $_SESSION['authemail'] . "'");
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
            <form action="../paymentcomplete.php" method="post">
                <!-- leftbar for the payment -->
                <div class="leftbar">
                    <div class="text">
                        <div>Card Number</div>
                        <p>Enter the 16-digit card number on the card</p>
                    </div>
                    <div class="pin">
                        <img src="../img/mastercard.png" alt="mastercard" style="width: 30px;">
                        <input type="number" id="pin" name="pin" placeholder="1234 - 5626 - 2637 - 2562"
                            autocomplete="off" onblur="cardNum()"
                            oninput="if (this.value.length > this.max) this.value = this.value.slice(0, this.max); cardNumRecieve()"
                            max="16">
                    </div>
                    <div>
                        <div class="text">
                            <div>CVV Number</div>
                            <p>Enter the 3 or 4 digt number on the card</p>
                        </div>
                        <div>
                            <input type="number" name="cvv" id="cvv" placeholder="234" style="text-align: center;"
                                autocomplete="off"
                                oninput="if (this.value.length > this.max) this.value = this.value.slice(0, this.max);"
                                max="4" onblur="cvv1()">
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
                            <input type="number" name="exp1" id="exp1" placeholder="06" style="text-align: center;"
                                autocomplete="off" value=""
                                oninput="if (this.value.length > this.max) this.value = this.value.slice(0, this.max); pat()"
                                max="2" onblur="exp()">
                            <span style="font-size: 40px;font-weight: bolder;margin: 0 20px;">/</span>
                            <input type="number" name="exp2" id="exp2" placeholder="24" style="text-align: center;"
                                autocomplete="off" value=""
                                oninput="if (this.value.length > this.max) this.value = this.value.slice(0, this.max); pat()"
                                max="2" onblur="exp()">
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
                                autocomplete="off" onblur="pass1()">
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
                           echo  $data[0]['Fullname']
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
                <!-- product info -->
                <div class="proinfo">
                    <table>
                        <tr>
                            <td>Author</td>
                            <td id="author">
                            <?php echo $user[0]['Fullname'] ?>
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
                                echo $specourse[0]['Name']
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="payprice">
                    <p>You have to Pay</p>
                    <h2>
                        &#8358; <span id="paym">5000</span>
                    </h2>
                </div>
            </div>
            <p id="error" style="font-size: 16px;"></p>
        </div>
    </main>
    <script>
        const error = document.getElementById("error");
        // payment section
        function cardNum() {
            const validnumber = /^\(?(\d{4})\)?[- ]?(\d{4})[- ]?(\d{4})[- ]?(\d{4})$/;
            const pin = document.getElementById("pin");

            if (pin.value == "") {
                pin.style.border = "2px solid red";
                pin.style.backgroundColor = "pink";
                error.style.visibility = "visible";
                error.innerHTML = "Enter Card Number";
            } else if (pin.value.match(validnumber) == null) {
                pin.style.border = "2px solid red";
                pin.style.backgroundColor = "pink";
                error.style.visibility = "visible";
                error.innerHTML = "Invalid Card Number";
            } else {
                pin.style.border = "0px solid black";
                if (localStorage.getItem("theme") === "dark") {
                    pin.style.backgroundColor = "white";
                } else {
                    pin.style.backgroundColor = "black";
                }
                error.style.visibility = "hidden";
                error.innerHTML = "";
            }

        }
        function cvv1() {
            const cvv1 = document.getElementById("cvv");
            if (cvv1.value == "") {
                cvv1.style.border = "2px solid red";
                cvv1.style.backgroundColor = "pink";
                error.visibility = "visible";
                error.innerHTML = "Enter Card CVV";
            }
            else if (cvv1.value.length < 3) {
                cvv1.style.border = "2px solid red";
                cvv1.style.backgroundColor = "pink";
                error.visibility = "visible";
                error.innerHTML = "Invalid Card CVV";
            } else {
                cvv1.style.border = "1px solid black";
                if (localStorage.getItem("theme") === "dark") {
                    cvv1.style.backgroundColor = "white";
                } else {
                    cvv1.style.backgroundColor = "black";
                }
                error.visibility = "hidden";
                error.innerHTML = "";
            }
        }
        function exp() {
            const exp1 = document.getElementById("exp1");
            const exp2 = document.getElementById("exp2");
            if (exp1.value == "") {
                exp1.style.border = "2px solid red";
                exp1.style.backgroundColor = "pink";
                error.innerHTML = "Enter Expiry Date";
                error.visibility = "visible";
            }
            else if (exp2.value == "") {
                exp2.style.border = "2px solid red";
                exp2.style.backgroundColor = "pink";
                error.innerHTML = "Enter Expiry Date";
                error.visibility = "visible";
            }
            else if (exp1.value > 30 || exp1.value < 0) {
                exp1.style.border = "2px solid red";
                exp1.style.backgroundColor = "pink";
                exp2.style.border = "2px solid red";
                exp2.style.backgroundColor = "pink";
                error.innerHTML = "Invalid Expiry Date";
                error.visibility = "visible";
            }
            else if (exp2.value > 50 || exp2.value < parseInt(new Date().getFullYear().toString().slice(2, 4))) {
                exp1.style.border = "2px solid red";
                exp1.style.backgroundColor = "pink";
                exp2.style.border = "2px solid red";
                exp2.style.backgroundColor = "pink";
                error.innerHTML = "Invalid Expiry Date";
                error.visibility = "visible";
            }
            else {
                exp1.style.border = "1px solid black";
                exp1.style.backgroundColor = "white";
                exp2.style.border = "1px solid black";
                if (localStorage.getItem("theme") === "dark") {
                    exp2.style.backgroundColor = "white";
                    exp1.style.backgroundColor = "white";
                } else {
                    exp2.style.backgroundColor = "black";
                    exp1.style.backgroundColor = "black";
                }
                error.visibility = "hidden";
                error.innerHTML = "";
            }
        }

        function pass1() {
            const pass = document.getElementById("pass");
            if (pass.value == "") {
                pass.style.border = "2px solid red";
                pass.style.backgroundColor = "pink";
                error.visibility = "visible";
                error.innerHTML = "Enter Passwords";
            }
            else {
                pass.style.border = "1px solid black";
                pass.style.backgroundColor = "white";
                if (localStorage.getItem("theme") === "dark") {
                    pass.style.backgroundColor = "white";
                } else {
                    pass.style.backgroundColor = "black";
                }
                error.visibility = "hidden";
                error.innerHTML = "";
            }
        }
        function cardNumRecieve() {
            document.getElementById("cardNum").innerHTML = document.getElementById("pin").value;
        }
        function pat() {
            const e1 = document.getElementById("exp1").value;
            const e2 = document.getElementById("exp2").value;
            const e = e1 + "/" + e2;
            document.getElementById("date").innerText = e
        }
    </script>
    <script src="main.js"></script>
</body>

</html>
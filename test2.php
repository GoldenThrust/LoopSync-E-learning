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
            "location: ../index.php"
        );
    }
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
</head>

<body>
    <main>
        <div class="fieldset">
            <form action="paymentcomplete.php" method="post" id="pay">
                <!-- leftbar for the payment -->
                <div class="leftbar">
                    <div class="text">
                        <div>Card Number</div>
                        <p>Enter the 16-digit card number on the card</p>
                    </div>
                        <input value="13344" type="number" id="pin" name="pin" placeholder="1234 - 5626 - 2637 - 2562"
                            autocomplete="off" onblur="cardNum()"
                            oninput="if (this.value.length > 16) this.value = this.value.slice(0, -1); cardNumRecieve()"
                            max="9999999999999999">
                    </div>
                    <div>
                        <div class="text">
                            <div>CVV Number</div>
                            <p>Enter the 3 or 4 digt number on the card</p>
                        </div>
                        <div>
                            <input type="number" name="cvv" id="cvv" placeholder="234" style="text-align: center;"
                                autocomplete="off"
                                oninput="if (this.value.length > 4) this.value = this.value.slice(0, -1);" max="9999"
                                onblur="cvv1()">
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
                                oninput="if (this.value.length > 2) this.value = this.value.slice(0, -1); pat()"
                                max="12" onblur="exp()">
                            <span style="font-size: 40px;font-weight: bolder;margin: 0 20px;">/</span>
                            <input type="number" name="exp2" id="exp2" placeholder="24" style="text-align: center;"
                                autocomplete="off" value=""
                                oninput="if (this.value.length > 2) this.value = this.value.slice(0, -1); pat()"
                                max="40" onblur="exp()">
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
                    </div>
                    <div class="wifi">
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
        const cvv = document.getElementById("cvv");
        const pin = document.getElementById("pin");
        const exp1 = document.getElementById("exp1");
        const pass = document.getElementById("pass");
        const exp2 = document.getElementById("exp2");
        const forms = [cvv, pin, exp1, pass, exp2];
        const error = document.getElementById("error");
        const pay = document.getElementById('pay');
        error.innerText = null;
        // payment section
        function cardNum() {
            const validnumber = /^\(?(\d{4})\)?[- ]?(\d{4})[- ]?(\d{4})[- ]?(\d{4})$/;

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
                error.innerText = null;
            }
        }
        function cvv1() {
            if (cvv.value == "") {
                cvv.style.border = "2px solid red";
                cvv.style.backgroundColor = "pink";
                error.style.visibility = "visible";
                error.innerHTML = "Enter Card CVV";
            }
            else if (cvv.value.length < 3) {
                cvv.style.border = "2px solid red";
                cvv.style.backgroundColor = "pink";
                error.style.visibility = "visible";
                error.innerHTML = "Invalid Card CVV";
            } else {
                cvv.style.border = "1px solid black";
                if (localStorage.getItem("theme") === "dark") {
                    cvv.style.backgroundColor = "white";
                } else {
                    cvv.style.backgroundColor = "black";
                }
                error.style.visibility = "hidden";
                error.innerText = null;
            }
        }
        function exp() {
            if (exp1.value == "") {
                exp1.style.border = "2px solid red";
                exp1.style.backgroundColor = "pink";
                error.innerHTML = "Enter Expiry Date";
                error.style.visibility = "visible";
            }
            else if (exp2.value == "") {
                exp2.style.border = "2px solid red";
                exp2.style.backgroundColor = "pink";
                error.innerHTML = "Enter Expiry Date";
                error.style.visibility = "visible";
            }
            else if (exp1.value > 30 || exp1.value < 0) {
                exp1.style.border = "2px solid red";
                exp1.style.backgroundColor = "pink";
                exp2.style.border = "2px solid red";
                exp2.style.backgroundColor = "pink";
                error.innerHTML = "Invalid Expiry Date";
                error.style.visibility = "visible";
            }
            else if (exp2.value > 50 || exp2.value < parseInt(new Date().getFullYear().toString().slice(2, 4))) {
                exp1.style.border = "2px solid red";
                exp1.style.backgroundColor = "pink";
                exp2.style.border = "2px solid red";
                exp2.style.backgroundColor = "pink";
                error.innerHTML = "Invalid Expiry Date";
                error.style.visibility = "visible";
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
                error.style.visibility = "hidden";
                error.innerText = null;
            }
        }

        function pass1() {
            if (pass.value == "") {
                pass.style.border = "2px solid red";
                pass.style.backgroundColor = "pink";
                error.style.visibility = "visible";
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
                error.style.visibility = "hidden";
                error.innerText = null;
            }
        }
        function cardNumRecieve() {
            document.getElementById("cardNum").innerHTML = document.getElementById("pin").value;
        }
        function pat() {
            const e1 = document.getElementById("exp1").value;
            const e2 = document.getElementById("exp2").value;
            const e = e1 + "/" + e2;
            document.getElementById("date").innerText = e;
        }
        if (error.innerText !== null) {
            pay.onclick = (e) => {
                e.preventDefault()
            }
        } else {
            pay.onclick = (e) => {
                return true;
            }
        }
        var checker = "";
        function paym(i) {
            pay[i].addEventListener("mouseover", () => {
                // console.log("hello" + i);
                // console.log(checker);
                console.log(pay[i].innerHTML);
            })
            pay[i].addEventListener("input", () => {
                // if (pay[i].innerText !== '') {
                //     checker = "check";
                // } else {
                //     checker = "";
                // }
            });
        }
        for (let i = 0; i < pay.length; i++) {
            if (i === pay.length - 1)
                continue;
            pay[i].innerText = 100;
            console.log(pay[i].innerText);
            // if (pay[i].innerText === '') {
            //     checker = "check";
            // } else {
            //     checker = '';
            // }
            paym(i);
        }
    </script>
</body>

</html>
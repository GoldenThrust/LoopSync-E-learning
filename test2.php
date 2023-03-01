<?php
$j = [];
for ($i = 4; $i > -1; $i--) {
    # code...]
    array_push($j, $i);

    echo $j[$i];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('meta.php') ?>
</head>

<body>
    <main>

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
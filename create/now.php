<?php
require('../db_config.php');
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("location: ../instructor.php");
}
$folder = '../uploads';
$imgFolder = $folder . '/img';
$vidFolder = $folder . '/video';
if (isset($_POST['submit'])) {
    $n = $database->sec($_POST['name']);
    $cate = $database->sec($_POST['cate']);
    $price = $database->sec($_POST['price']);
    $sdesc = $database->sec($_POST['subdesc']);
    $desc = $database->sec($_POST['desc']);
    $requi = $database->sec($_POST['requi']);
    $imgFileType = strtolower(pathinfo($_FILES["thumb"]["name"], PATHINFO_EXTENSION));
    $vidFileType = strtolower(pathinfo($_FILES["trailer"]["name"], PATHINFO_EXTENSION));
    $imgFile = $imgFolder . '/' . basename($_FILES["thumb"]["name"]);
    $vidFile = $vidFolder . '/' . basename($_FILES["trailer"]["name"]);
    $thumb = 'uploads/img/' . basename($_FILES["thumb"]["name"]);
    $trailer = 'uploads/video/' . basename($_FILES["trailer"]["name"]);
    if (move_uploaded_file($_FILES["thumb"]['tmp_name'], $imgFile)) {
        if (move_uploaded_file($_FILES["trailer"]['tmp_name'], $vidFile)) {
            if ($database->create('courses', array('AuthorEmail' => $_SESSION['email'], 'Name' => $n, 'Category' => $cate, 'Price' => $price, 'Thumbnail' => $thumb, 'Trailer' => $trailer, 'SubDescription' => $sdesc, 'Requirement' => $requi, 'Description' => $desc))) {
                header(
                    "location: ../error.php?error=Files uploaded"
                );
            } else {
                header(
                    "location: ../error.php?error=Files not uploaded"
                );
            }
        } else {
            header(
                "location: ../error.php?error=Files not uploaded"
            );
        }
    } else {
        header(
            "location: ../error.php?error=Files not uploaded"
        );
    }
}
?>
<!DOCTYPE html>
<html lang="en" style="background-color: white;">
    <head>
    <?php require('meta.php') ?>
    <link rel="stylesheet" href="style.css">
    </head>
<body>

    <header>
        <div>
            <span>LoopSync</span>
        </div>
    </header>
    <main>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
            <div class="input">
                <label for="cname">Course Title</label>
                <input type="text" name="name" id="name" required minlength="10" maxlength="80">
            </div>
            <div class="input">
                <label for="cate">Category</label>
                <select name="cate" id="cate" required>
                    <li><a href="">Game Development</a></li>
                    <li><a href="">Graphic Design & Illustration</a></li>
                    <li><a href="">Digital Marketing</a></li>
                    <li><a href="">Social Media Marketing</a></li>
                    <li><a href="">Business Analytic & Intelligence</a></li>
                    <li><a href="">Entrepreneurship</a></li>
                    <li><a href="">Video & Animation</a></li>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="Game Development">Game Development</option>
                    <option value="Graphic Design & Illustration">Graphic Design & Illustration</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Social Media Marketing">Social Media Marketing</option>
                    <option value="Business Analytic & Intelligence">Business Analytic & Intelligence</option>
                    <option value="Entrepreneurship">Entrepreneurship</option>
                    <option value="Video & Animation">Video & Animation</option>
                </select>
            </div>
            <div class="input">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" required>
            </div>
            <div class="input">
                <label for="thumb">
                    Thumbnail
                    <img src="../img/camera.svg" alt="">
                    <input type="file" name="thumb" id="thumb" accept="image/*" onchange="imgFile(event)" required>
                    <span id="imageName" style="font-size: 14px;color:green;"></span>
                </label>
            </div>
            <div class="input">
                <img id='image'>
            </div>
            <div class="input">
                <label for="trailer">
                    Trailer
                    <img src="../img/video.svg" alt="">
                    <input type="file" name="trailer" id="trailer" accept="video/*" onchange="vidFile(event)" required>
                    <span id="videoName" style="font-size: 14px;color:green;"></span>
                </label>
            </div>
            <div class="input">
                <video id='video' controls></video>
            </div>
            <div class="input">
                <label for="subdesc">Sub-Description</label>
                <input type="text" name="subdesc" id="subdesc" required minlength="10" maxlength="200">
            </div>
            <div class="input">
                <label for="requi">Requirement</label>
                <textarea name="requi" id="requi" cols="30" rows="10" required minlength="30" maxlength="1000"></textarea>
            </div>
            <div class="input">
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" cols="30" rows="10" required minlength="50" maxlength="20000"></textarea>
            </div>
            <div class="footer">
                <span><button type="button" id="previous" onclick="window.location = '../index.php'">Exist</button></span>
                <span><button type="submit" id="submit" name="submit">Submit</button></span>
            </div>
        </form>
    </main>
    <script>
        let imageName = document.getElementById("imageName")
        let videoName = document.getElementById("videoName")
        window.onbeforeunload = function() {
            return "There are unsaved changes. Leave now?";
        };
        var imgFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
            let inputImage = document.getElementById('thumb').files[0];

            imageName.innerText = inputImage.name;
        };
        var vidFile = function(event) {
            var output = document.getElementById('video');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
            let inputvideo = document.getElementById('trailer').files[0];

            videoName.innerText = inputvideo.name;
        };
    </script>
</body>

</html>
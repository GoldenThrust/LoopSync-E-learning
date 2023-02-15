<!-- TODO: add pay todetail base with the product and the name of the person that buy the product -->
<?php
require('db_config.php');
$specourse = $database->read('courses', 'AuthorEmail ="' . $_SESSION['authemail'] . '" AND Name = "' . $_SESSION['productname'] . '"');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Done</title>
    <style>
        body {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        div{
            font-size: larger;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div>Congratulation, you have success full purchase a course on loopsync </div>
    <script>
        function downloadImage() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET',  <?php echo "'". $specourse[0]['Trailer'] . "'"?>, true);
            xhr.responseType = 'blob';
            xhr.onload = function () {
                var urlCreator = window.URL || window.webkitURL;
                var imageUrl = urlCreator.createObjectURL(this.response);
                console.log(this.response)
                var tag = document.createElement('a');
                tag.href = imageUrl;
                tag.target = '_blank';
                tag.download = <?php echo "'". $specourse[0]['Trailer'] . "'"?>;
                document.body.appendChild(tag);
                tag.click();
                document.body.removeChild(tag);
            };
            xhr.onerror = err => {
                alert('Failed to download picture');
            };
            xhr.send();
        }
        downloadImage();
        setTimeout(()=> {
            window.location = 'index.php';
        }, 5000);
    </script>
</body>

</html>
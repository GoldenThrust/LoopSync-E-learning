<!-- TODO: add pay todetail base with the product and the name of the person that buy the product -->
<?php
require('db_config.php');
if (!isset($_SESSION['checkout'])) {
    $specourse = $database->read('courses', 'AuthorEmail ="' . $_SESSION['authemail'] . '" AND Name = "' . $_SESSION['productname'] . '"');
}
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

        div {
            font-size: larger;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div>Congratulation, you have purchase a course on loopsync</div>
    <script>
        function downloadImage(dd) {
            console.log("Downloading")
            var xhr = new XMLHttpRequest();
            xhr.open('GET', dd, true);
            xhr.responseType = 'blob';
            xhr.onload = function () {
                var urlCreator = window.URL || window.webkitURL;
                var imageUrl = urlCreator.createObjectURL(this.response);                var tag = document.createElement('a');
                tag.href = imageUrl;
                tag.target = '_blank';
                tag.download = dd;
                document.body.appendChild(tag);
                tag.click();
                document.body.removeChild(tag);
            };
            xhr.onerror = err => {
                alert('Failed to download picture');
            };
            xhr.send();
        }
        var download = [];
        var d = 'Done downloading';
        <?php
        if (isset($_SESSION['checkout'])) {
            foreach ($_SESSION['checkout'] as $value) {
                echo "download.push('" . $value . "');";
            }
            ?>
            let promise = new Promise((resolved, reject) => {
                for (let i = 0; i < download.length; i++) {
                    (function (j) {
                        setTimeout(() => {
                            downloadImage(download[j]);
                        }, 1000 * j);
                        if (j >= download.length - 1) {
                            setTimeout(() => resolved(d), 1005 * j);
                        }
                    })(i)
                }
            })
            // const promises = new promise((resolved, reject) => {
            //     resolved(loop());
            // })
            <?php
        } else { ?>
            let promise = new Promise((resolved, reject) => {
                downloadImage(<?php echo "'" . $specourse[0]['Trailer'] . "'" ?>);
                setTimeout(() => resolved(), 5000);
            });
        <?php } ?>
        // promise.then(
        //     function (resolved) { window.location = value; }
        // )
        //     .catch(err => console.log(err.message));
        promise.then((done) => {
              console.log(done)
              setTimeout(()=>{
                window.location = 'index.php';
              }, 1000)
        });
    </script>
</body>

</html>
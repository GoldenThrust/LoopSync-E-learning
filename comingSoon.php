<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #page{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            font: italic small-caps normal 14px cursive;
        }
    </style>
</head>

<body>
    <div id="page">
        <?php echo "" ?>
    </div>
    <script>
        const text = "Page under construction.............";
        const speed = 50;

        for (let i = 0; i < text.length; i++) {
            setTimeout(() => {
                document.getElementById("page").textContent += text[i];
            }, i * speed);
        }
</script>
</body>

</html>
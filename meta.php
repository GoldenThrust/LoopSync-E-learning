<?php
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="en-US">
    <meta name="author" content="Adeniji Olajide">
    <meta name="publisher" content="Adeniji Olajide">
    <meta name="copyright" content="Adeniji Olajide">
    <meta name="keywords" content="Website, blog, E-learning, Education,learn, learning, class, classes, teach, education, how to, online learning, collaborative learning, Tutorials, Programming, Web Development, Training, Learning, Quiz, Exercises, Courses, Lessons,Learn to code">
    <meta name="description" content="LoopSync is an online learning and teaching marketplace. Anyone can take an online class, watch video lessons, create projects, and even teach a class themselves.">
    <meta name="page-type" content="E-learning">
    <meta name="audience" content="Everyone">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta property="og:description" content="LoopSync is an online learning and teaching marketplace. Anyone can take an online class, watch video lessons, create projects, and even teach a class themselves.">
    <meta property="og:image" content="img/loop.png">
    <meta property="og:type" content="E-learning">
    <meta property="og:site_name" content="LoopSync">
    <meta property="og:locale" content="en-US">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="img/loop.png">
    <meta name="twitter:description" content="LoopSync is an online learning and teaching marketplace. Anyone can take an online class, watch video lessons, create projects, and even teach a class themselves.">
    <meta itemprop="description" content="LoopSync is an online learning and teaching marketplace. Anyone can take an online class, watch video lessons, create projects, and even teach a class themselves.">
    <meta name="twitter:site" content="@LoopSync">
    <link rel="stylesheet" href="css/slofh.css">
    <link rel="stylesheet" href="css/style.css">
    <title>LoopSync - Online Courses</title>
    <?php $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $currentUrl = $protocol . '://' . $host . $script;
    ?>
    <meta itemprop="title" content="LoopSync - Online Courses">
    <meta property="og:title" content="LoopSync - Online Courses">
    <meta property="og:url" content="LoopSync - Online Courses">
    <meta itemprop="url" content="<?php print($currentUrl); ?>">
    <meta name="twitter:domain" content="<?php print($_SERVER['SERVER_NAME']); ?>">
    <meta name="twitter:url" content="<?php print($currentUrl); ?>">
    <meta name="twitter:title" content="LoopSync - Online Courses">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<!-- TODO: change color scheme for page annd favicon -->
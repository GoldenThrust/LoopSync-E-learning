<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('meta.php') ?>
    <title>LoopSync</title>
    <meta itemprop="title" class="title">
    <meta property="og:title" class="title">
    <meta property="og:url" content="<?php print($currentUrl); ?>">
    <meta itemprop="url" content="<?php print($currentUrl);?>">
    <meta name="twitter:domain" content="<?php print($_SERVER['SERVER_NAME']); ?>">
    <meta name="twitter:url" content="<?php print($currentUrl); ?>">
    <meta name="twitter:title" class="title">
</head>
<body>
    <?php require('header.php'); ?>
    <main>
        
    </main>
    <?php require('footer.php');?>
<!-- Send mail to me and the person that insert data -->
<!-- create a search suggestion -->
</body>
</html>



XSS(Cross Site Scripting);
MySQLI Injections;




<?php

// Connect to the database
$conn = mysqli_connect('host', 'username', 'password', 'database_name');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// Prepare an insert statement
$sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "sss", $first_name, $last_name, $email);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($conn);

?>

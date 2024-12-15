<?php
    session_start();
    if (!isset($_SESSION['user_lvl']) or ($_SESSION['user_lvl'] != 1)){
        header("Location: login.php");
        exit();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>LearnCode</title>
    <meta charset = "utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div id="container">
        <?php include('header.php'); ?>
        <?php include('navigations/admin-nav.php'); ?>
        <div id='homepage'>
            <div id="content">
                <h2>Welcome, Admin!</h2>
                <h3>Here are newly updated user statistics: </h3>
                <img src="images/dashboard.png">
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>
</html> 

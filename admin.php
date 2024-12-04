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
    <title>Website ni Cruz </title>
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
                <p>Nam laoreet nunc ultricies congue lacinia primis. Feugiat mus lacus leo litora netus viverra. Massa finibus metus tellus potenti; consectetur vitae tellus in adipiscing? Suspendisse vulputate commodo taciti commodo ad sem curabitur. Cursus potenti sed curabitur vitae est massa vel maximus volutpat. Aliquet neque egestas arcu magna inceptos velit.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque unde quo sequi nam aspernatur eligendi doloribus commodi provident, architecto perferendis deserunt recusandae. Possimus repellat odio temporibus beatae nam obcaecati quisquam?</p>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>
</html> 

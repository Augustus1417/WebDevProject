<?php
    session_start();
    if (!isset($_SESSION['user_lvl']) or ($_SESSION['user_lvl'] != 0)){
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
        <?php include('navigations/member2-nav.php'); ?>
		<div id='homepage'>
			<div id="content">
				<h2>Let's Learn!</h2>
                <p>Looking to sharpen your skills in web development? We’ve got you covered! Click on the links below to explore easy-to-follow tutorials on HTML, CSS, and JavaScript at W3Schools.</p>
                <ul>
                    <a href="https://www.w3schools.com/html/" class="member_lnk"><li class="not-todo">Learn HTML – Master the structure of web pages with detailed guides and examples.</li></a>
                    <a href="https://www.w3schools.com/css/" class="member_lnk"><li class="not-todo">Learn CSS – Style your websites with colors, layouts, and responsive designs.</li></a>
                    <a href="https://www.w3schools.com/js/" class="member_lnk"><li class="not-todo">Learn JavaScript – Bring your sites to life with interactive and dynamic features.</li></a>
                </ul>
                <p>Happy learning! Remember, the more you practice, the closer you’ll get to becoming a web development pro.</p>
			</div>
                
        </div>
        <?php include('footer.php'); ?>

	</div>
</body>
</html> 
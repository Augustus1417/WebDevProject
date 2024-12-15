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
        <?php include('navigations/member-nav.php'); ?>
		<div id='homepage'>
			<div id="content">
				<h2>Welcome Back to LearnCode!</h2>
				<p>Ready to level up your coding skills today? Dive back into your lessons, check your progress, or explore new challenges. </br></br>Here’s what you can do:</p>
                <ul>
                    <a href="member_page_1.php" class="member_lnk"><li class="not-todo">Continue Learning: Pick up where you left off and complete your next lesson.</li></a>
                    <a href="member_page_2.php" class="member_lnk"><li class="not-todo">Explore Resources: Access helpful guides, code snippets, and tips to enhance your learning.</li></a>
                </ul>
                <p>Remember, every line of code you write takes you one step closer to mastering web development. Let’s get started!</p></p>
			</div>
                
        </div>
        <?php include('footer.php'); ?>

	</div>
</body>
</html> 
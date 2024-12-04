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
	<title>Website ni Cruz </title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
        <?php include('header.php'); ?>
        <?php include('navigations/member-nav.php'); ?>
		<div id='homepage'>
			<div id="content">
				<h2>Welcome to Jed Cruz's Website! </h2>
				<p>Lorem ipsum odor amet, consectetuer adipiscing elit. Velit mi arcu habitant tincidunt montes convallis pharetra imperdiet. Praesent platea varius lorem ante, viverra fames quis. Tincidunt feugiat sapien accumsan non elit scelerisque eu imperdiet. Dis mauris neque vivamus egestas proin parturient egestas a erat. Tempor commodo cursus dolor taciti sociosqu ornare. Ultricies est aptent non sit felis nec aliquet. Neque enim laoreet eget iaculis ullamcorper semper quisque a elit. Elit efficitur ultrices proin suscipit posuere ultricies conubia.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium commodi quod quo ipsam cum hic velit vero eos eligendi numquam corrupti, voluptates quasi soluta aliquam, iste ipsum architecto! Et, quo?</p></p>
			</div>
                
        </div>
        <?php include('footer.php'); ?>

	</div>
</body>
</html> 
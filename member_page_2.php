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
        <?php include('navigations/member2-nav.php'); ?>
		<div id='homepage'>
			<div id="content">
				<h2>Page 2</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, doloribus?</p>
                <p>Perspiciatis soluta enim nemo molestias, impedit expedita ad nostrum quam.</p>
                <p>Tenetur quaerat quo quas et perferendis iusto deleniti. Iusto, doloremque?</p>
                <p>Quibusdam cumque perferendis earum veritatis ipsam hic, corrupti nobis in?</p>
                <p>Sunt officiis ipsa blanditiis magni eos dicta repellat sapiente libero?</p>
			</div>
                
        </div>
        <?php include('footer.php'); ?>

	</div>
</body>
</html> 
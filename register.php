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
		<?php include('navigations/reg-nav.php'); ?>
		<div id="registration">
			<div id="reg-form">
			<h2 id="reg-head">Registration</h2>
			<form id="reg-form"action="register.php" method="post">
				<p class="inputs">
					<label class="label" for="fname">First Name:</label>
					<input class="textbox" type="text" id="fname" name="fname" size="30" maxlength="40" value="<?php if (isset($_POST['fname'])) echo $_POST['fname'];?>">
				</p>

				<p class="inputs">
					<label class="label" for="lname">Last Name:</label>
					<input class="textbox" type="text" id="lname" name="lname" size="30" maxlength="40" value="<?php if (isset($_POST['lname'])) echo $_POST['lname'];?>">
				</p>

				<p class="inputs">
					<label class="label" for="email">Email Address:</label>
					<input class="textbox" type="text" id="email" name="email" size="30" maxlength="50" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>">
				</p>

				<p class="inputs">
					<label class="label" for="psword1">Password:</label>
					<input class="textbox" type="password" id="psword1" name="psword1" size="20" maxlength="40" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1'];?>">
				</p>

				<p class="inputs">
					<label class="label" for="psword2">Repeat Password:</label>
					<input class="textbox" type="password" id="psword2" name="psword2" size="20" maxlength="40" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2'];?>">
				</p>

				<p id="submit-button">
					<input type="submit" id="submit" name="submit" value="Register">
				</p>
			</form> 
			</div>
			
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$errors = array();

				if (empty($_POST['fname'])) {$errors[] = "Please input your first name.";} 
				else { $fn = trim($_POST['fname']);}
				
				if (empty($_POST['lname'])) {$errors[] = "Please input your last name.";} 
				else { $ln = trim($_POST['lname']);}

				if (empty($_POST['email'])) {$errors[] = "Please input your email.";}
				else { $e = trim($_POST['email']);}
				
				if (!empty($_POST['psword1'])) {
					if ($_POST['psword1'] != $_POST['psword2']) {$errors[] = "Passwords do not match.";} 
					else { $p = trim($_POST['psword1']);}
				} else { $errors[] = "Please input your password.";}

				if (empty($errors)) {
					require("mysqli_connect.php");
					$hashedPsword = hash('sha256', $p);
					$q = "insert into users(fname, lname, email, password, registration_date, user_lvl) values ('$fn', '$ln', '$e', '$hashedPsword', NOW(), 0);";
					$result = @mysqli_query($dbcon, $q);
					if ($result){ 
						header("location: register-success.php");
						exit();
					} else { 
						echo '
						<h2>System Error</h2> 
						<p class="error">Your registration failed due to an unexpected error. Sorry for the inconvenience</p>';
						echo '<p>'.mysqli_error($dbcon).'</p>';
					}
					mysqli_close($dbcon);
					include('footer.php');
					exit();
					
				} else { 
					echo '
					<div id="errors">
						<h2>Error!</h2>
						<p class="error">The following error(s) occured: <br/><br/>
					<style>
					#registration {animation: 1s moveout 0s; }
					</style>';
					foreach($errors as $msg){echo " &#8226; $msg<br/>\n";}
					echo '</div>';
				}
			}
		?>
		</div>
		<?php include('footer.php'); ?>
	</div>
</body>
</html> 
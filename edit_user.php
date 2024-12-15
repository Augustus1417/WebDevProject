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
	<title>Edit User Info</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
		<?php include('header.php'); ?>
		<?php include('navigations/edit-nav.php'); ?>
		<div id='registration'>
				<?php
					if ((isset($_GET['id'])) && (is_numeric($_GET['id']))){
						$id = $_GET['id'];
					}
					elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))){
						$id = $_POST['id'];
					}
					else {
						echo '<p> This page has been accessed by mistake.</p>';
						include('footer.php');
						exit();
					}
					require('mysqli_connect.php');
					if ($_SERVER['REQUEST_METHOD'] == 'POST'){
						$errors = array();

						if (empty($_POST['fname'])) {$errors[] = "First name cannot be empty.";} 
						else { $fn = trim($_POST['fname']);}
						
						if (empty($_POST['lname'])) {$errors[] = "Last name cannot be empty.";} 
						else { $ln = trim($_POST['lname']);}

						if (empty($_POST['email'])) {$errors[] = "Email cannot be empty.";}
						else { $e = trim($_POST['email']);}

						if (empty($errors)){ 
							$q = "UPDATE users SET fname='$fn', lname='$ln', email='$e' WHERE userid = '$id'";
							$result = @mysqli_query($dbcon, $q);
							if(mysqli_affected_rows($dbcon) == 1){
								echo "
								<div id = 'edit-success'>
									<h2>Notice:</h2> 
									<p class='error'>User info edited successfully.</p>
									<p class='error'>Click <a id='edt-scc'href='register-view-users.php'>HERE</a> to see changes.</p>
								</div>";
							} else {
								echo "
								<div id = 'edit-fail'>
									<h2>Notice:</h2> 
									<p class='error'>User info was unchanged.</p>
								</div>";
							}
						} else { 
							echo '
							<div id="errors2">
								<h2>Notice: </h2>
								<p class="error">
							';
							foreach($errors as $msg){echo " &#8226; $msg<br/>\n";}
							echo '</div>';
						}
					}
					$q = "SELECT fname, lname, email FROM users WHERE userid=$id";
					$result = @mysqli_query($dbcon, $q);
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						echo '
						<div id="reg-form">
							<h2 id="reg-head">Edit User Record</h2>
							<form action="edit_user.php" method="post">

							<p class="inputs">
								<label class="label" for="fname">First Name:</label>
								<input class="textbox" type="text" id="fname" name="fname" size="30" maxlength="40" value="'.$row['fname'].'">
							</p>

							<p class="inputs">
								<label class="label" for="lname">Last Name:</label>
								<input class="textbox" type="text" id="lname" name="lname" size="30" maxlength="40" value="'.$row['lname'].'">
							</p>

							<p class="inputs">
								<label class="label" for="email">Email Address:</label>
								<input class="textbox" type="text" id="email" name="email" size="30" maxlength="50" value="'.$row['email'].'">
							</p>

							<p id="submit-button"> <input type="submit" id="submit-edit" name="submit" value="Edit"> </p>
							<p><input type="hidden" name="id" value="'.$id.'"></p>
							</form>
						</div>'
					;
					} else {
						echo "<h2>User data unavailable, please register first <a href='register.php'>here</a> </h2>";
					}
					mysqli_close($dbcon);
				?>
		</div>
		<?php include("footer.php"); ?>
	</div>
</body>
</html> 
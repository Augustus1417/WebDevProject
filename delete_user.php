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
	<title>Deleting User</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
		<?php include('header.php'); ?>
		<?php include('navigations/edit-nav.php'); ?>
		<div id='homepage'>
			<div id="content">
				<h2>Deleting Record</h2>
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
						if($_POST['sure'] == 'Yes'){
							$q = "DELETE FROM users WHERE userid = '$id'";
							$result = @mysqli_query($dbcon, $q); 
							if (mysqli_affected_rows($dbcon) == 1){
								echo "
									<h3>The record has been deleted.</h3>
									<p>You may now click <a href='register-view-users.php'>here</a> to go back to the View Users page</p>"
								; } else {
								echo '<h3>Deletion failed. Sorry for the inconvenience</h3>'; }
						} else { echo "
							<h3>The record was not deleted.</h3>
							<p>You may now click <a href='register-view-users.php'>here</a> to go back to the View Users page</p>
							"; }
					} else {
						 $q = "SELECT CONCAT (fname, ' ', lname) FROM users WHERE userid = '$id'";
						 $result = @mysqli_query($dbcon, $q);
						 if (mysqli_affected_rows($dbcon) == 1) {
							$row = mysqli_fetch_array($result, MYSQLI_NUM);
							echo "<h3>Are you sure you want to permanently delete $row[0]?</h3>";
							echo '
								<form action = "delete_user.php" method="post">
								<div id="delete_choices">
								<input id="submit-yes" type="submit" name="sure" value="Yes">
								<input id="submit-no" type="submit" name="sure" value="No">
								<input type="hidden" name="id" value ="'.$id.'">
								</div>
								</form>
							';
						 }else {
							echo 'User does not exist.';
						 }
					}
				mysqli_close($dbcon);
				?>
			</div>
		</div>
		<?php include("footer.php"); ?>
	</div>
</body>
</html> 
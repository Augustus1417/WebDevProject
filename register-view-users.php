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
	<title>Registered Users Page</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="container">
		<?php include('header.php'); ?>
		<?php include('navigations/edit-nav.php'); ?>
        <div id='homepage'>
        <div id="content">
            <h2 id="reguser-head">Registered Users</h2>
            <p>
            <?php
                require('mysqli_connect.php');
                $q = "SELECT userid,fname,lname,email, DATE_FORMAT(registration_date, '%M %d, %Y') as regdate from users ORDER BY registration_date ASC";
                $result = @mysqli_query($dbcon, $q);
                if ($result){
                    echo ' <table id="user_table">
                        <tr id="table_info">
                            <td>Name</td>
                            <td>Email</td>
                            <td>Registration Date</td>
                            <th colspan="2">Actions</th>
                        </tr>';
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo '<tr>
                        <td class = "data">'.$row['lname'] .', '. $row['fname'].'</td>
                        <td class = "data">'.$row['email'] .'</td>
                        <td class = "data">'.$row['regdate'] .'</td>
                        <td class = "data"><a class="links" id="glow-green" href="edit_user.php?id='.$row['userid'].'">Edit</a></td>
                        <td class = "data" ><a class="links" id="glow-red" href="delete_user.php?id='.$row['userid'].'">Delete</a></td>
                        </tr>';
                    }
                    echo '</table>';
                    mysqli_free_result($result);
                } else {
                    echo '
						<h2>System Error</h2> 
						<p class="error">The current users could not be retrieved due to an unexpected error. Sorry for the inconvenience, You may report this to the System Admin. Error 420</p>';
                    echo '<p>'.mysqli_error($dbcon).'</p>';
                }
                mysqli_close($dbcon);
            ?>
            </p>
	    </div>
        </div>
        <?php include('footer.php'); ?>
	</div>
</body>
</html> 
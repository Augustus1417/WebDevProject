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
            <div id='content'>
                <h2>Here's a simple to-do list</h2>
                <input type="text" id="taskInput" placeholder="Enter a new task">
                <button id="addTaskBtn" class="operationBtn">Add Task</button>
                <ul id="taskList"></ul>
                <button id="clearAll" class="operationBtn" >Clear All</button>
                <script src="script.js"></script>  
            <h4>Get the source code for this <a href="https://github.com/Augustus1417/ToDoList">HERE</a></h4>
            </div>

        </div>
        <?php include('footer.php'); ?>

	</div>
</body>
</html> 
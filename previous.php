<?php
session_start();
$url = ($_SESSION['user_lvl'] === 1) ? 'admin.php' : 'member-homepage.php';
header('Location:'.$url);
?>
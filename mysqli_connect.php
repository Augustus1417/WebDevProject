<?php
$dbcon  = @mysqli_connect('localhost', 'jedcruz', 'jedcruz', 'members_cruz')
OR die('Could not connect to MySQL.. Error in ' .mysqli_connect_error());
mysqli_set_charset($dbcon, 'utf8');

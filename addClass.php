<?php
	include "sql/pdo.php";
	$courseID = $_POST['courseID'];
	$studentID = 2; // TODO: replace when session variables are setup
	enrollInClass($studentID, $courseID);
	echo "success";	
?>

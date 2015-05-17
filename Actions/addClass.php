<?php
	session_start();
	include "sql/pdo.php";
	$courseID = $_POST['courseID'];
	$studentID = $_SESSION['userID']; // TODO: replace when session variables are setup
	enrollInClass($studentID, $courseID);
	echo "success";	
?>

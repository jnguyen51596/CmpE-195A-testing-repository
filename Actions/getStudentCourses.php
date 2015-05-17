<?php
	session_start();
	include "sql/pdo.php";

	// TODO change this to session variable once implemented
	//$studentID = 1;
	$result = getUserID($_SESSION['username']);
	$_SESSION['userID'] = $result[0][0];
	$studentID = $_SESSION['userID'];
	$result = getStudentCourses($studentID);
	header('Content-Type: application/json');	
	echo json_encode($result);
?>

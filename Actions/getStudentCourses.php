<?php
	session_start();
	include "sql/pdo.php";

	// TODO change this to session variable once implemented
	//$studentID = $_SESSION['username'];
	$studentID = 1;
	$result = getStudentCourses($studentID);
	header('Content-Type: application/json');	
	echo json_encode($result);
?>

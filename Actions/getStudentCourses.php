<?php
	include "sql/pdo.php";

	// TODO change this to session variable once implemented
	$studentID = 1;
	$result = getStudentCourses($studentID);
	header('Content-Type: application/json');	
	echo json_encode($result);
?>

<?php
	session_start();
	include "sql/pdo.php";
	$instructorID = $_SESSION['userID'];
	$courseID = $_POST['courseID'];
	$firstAssignmentDueDate = $_POST['firstAssignmentDueDate'];
	//$instructorID = 18;
	//$courseID = 7;
	//$firstAssignmentDueDate = "2015-12-31";
	if (isUserInstructor($instructorID, $courseID)) {
		$id = "No response";
		$id = copyCourse($instructorID, $courseID, $firstAssignmentDueDate);
		echo json_encode("success");
	} else {
		echo json_encode("Something went wrong :(");	
	}
?>
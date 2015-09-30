<?php
	session_start();
	include "sql/pdo.php";
	$instructorID = $_SESSION['userID'];
	$courseID = $_POST['courseID'];
	$instructorID = 4;
	$courseID = 1;
	if (isUserInstructor($instructorID, $courseID)) {
		$id = "No response";
		$id = copyCourse($instructorID, $courseID);
		echo json_encode("success");
	} else {
		echo json_encode("Something went wrong :(");	
	}
?>
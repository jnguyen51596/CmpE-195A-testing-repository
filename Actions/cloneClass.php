<?php
	session_start();
	include "sql/pdo.php";
	$instructorID = $_SESSION['userID'];
	$courseID = $_POST['courseID'];
	if (isUserInstructor($instructorID, $courseID)) {
		$id = "No response";
		$id = copyCourse($instructorID, $courseID);
		echo $id;
	} else {
		echo "Something went wrong :(";	
	}
?>
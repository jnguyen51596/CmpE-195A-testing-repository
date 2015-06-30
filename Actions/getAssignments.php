<?php
	session_start();
	//$instructorID = $_POST['instructor'];
	include "sql/pdo.php";
	// TODO update when session variables are created
	//$instructorID = 1;
	//2: $result = getUserID($_SESSION['username']);
	//2: $_SESSION['userID'] = $result[0][0];
	//2: $instructorID = $_SESSION['userID'];
	//$row = getClasses($instructorID);
	
	
	$row = getAssignments();
	header('Content-Type: application/json');
	if ($row != 0) {
		echo json_encode($row);
	} else {
		echo '{ "courseID" : "-1" }';
	}
?>
<?php
	session_start();
	include "sql/pdo.php";
	
	$memberID = $_SESSION['userID'];
	$courseID = $_POST['courseID'];
	
	$row = getSpecificGrades($memberID, $courseID);
	header('Content-Type: application/json');
	echo json_encode($row);
?>
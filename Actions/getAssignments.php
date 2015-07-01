<?php
	session_start();
	include "sql/pdo.php";
	$cID = $_POST['courseID'];
	
	$row = getAssignments($cID);
	header('Content-Type: application/json');
	if ($row != 0) {
		echo json_encode($row);
	} else {
		echo 'no assignments';
	}
?>
<?php
	//$instructorID = $_POST['instructor'];
	include "sql/pdo.php";
	// TODO update when session variables are created
	$instructorID = 1;
	$row = getClasses($instructorID);
	header('Content-Type: application/json');
	echo json_encode($row);
?>
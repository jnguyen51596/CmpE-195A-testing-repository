<?php
	include "sql/pdo.php";
	$classID = $_POST['class'];
	$result = getStudents($classID);
	header('Content-Type: application/json');	
	echo json_encode($result);
?>

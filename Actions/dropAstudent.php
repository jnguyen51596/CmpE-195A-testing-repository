<?php
	include "sql/pdo.php";
	$classID = $_POST['class'];
	$studentID = $_POST['student'];
	$result = dropStudent($classID, $studentID);
	header('Content-Type: application/json');	
	echo json_encode($result);
?>

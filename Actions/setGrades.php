<?php
	include "sql/pdo.php";
	$row = setGrades($_POST['memberID'], $_POST['assignmentID'], $_POST['score'], $_POST['feedback']);
	header('Content-Type: application/json');
	echo json_encode($row);
?>
<?php
	$assignmentid = $_POST['assignment'];
	$score = $_POST['score'];
	$feedback = $_POST['feedback'];
	include "sql/pdo.php";
	$row = setGrades($assignmentid, $score, $feedback);
	header('Content-Type: application/json');
	echo json_encode($row);
?>
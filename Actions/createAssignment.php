<?php
	// start modification
	session_start(); 
	include "sql/pdo.php";
	$result = getUserID($_SESSION['username']);
	$_SESSION['userID'] = $result[0][0];
	$instructorID = $_SESSION['userID'];
	// end modifications
	
	$courseID = $_POST['courseID'];
	$authorID = $instructorID;
	$title = $_POST['title'];
	$total = $_POST['total'];
	$dueDate = $_POST['dueDate'];
	$description = $_POST['description'];
	
	addAssignment($courseID, $authorID, $title, $total, $dueDate, $description);
	header('Content-Type: application/json');
?>
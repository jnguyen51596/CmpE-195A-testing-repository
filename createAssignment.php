<?php
	$courseID = $_POST['courseID'];
	$authorID = $_POST['authorID'];
	$title = $_POST['title'];
	$total = $_POST['total'];
	$dueDate = $_POST['dueDate'];
	$description = $_POST['description'];
	include "sql/pdo.php";
	addAssignment($courseID, $authorID, $title, $total, $dueDate, $description);
	header('Content-Type: application/json');
?>
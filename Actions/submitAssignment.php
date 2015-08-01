<?php
	session_start();
	include "sql/pdo.php";

	$memberID = $_SESSION['userID'];
	addGrade($memberID, $_POST['assignmentID'])
?>
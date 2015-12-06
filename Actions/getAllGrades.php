<?php
	session_start();
	include "sql/pdo.php";
	
	$row = getAllGrades($_POST['courseID']);
	echo json_encode($row);
?>
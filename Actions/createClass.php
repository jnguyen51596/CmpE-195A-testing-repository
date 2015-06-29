<?php
	session_start();
   	include 'sql/pdo.php';
   	$courseName = $_POST['courseName'];
   	$prefix = $_POST['prefix'];
   	$suffix = $_POST['suffix'];
   	$instructorID = $_SESSION['userID'];
   	createClass($courseName, $prefix, $suffix, $instructorID);
   	echo json_encode("success");
?>
<?php
	include "sql/pdo.php";
	$courseID = $_POST['courseID'];
	//$courseID = 1;
	$result = getAllAnnouncementsByClass($courseID);
	header('Content-Type: application/json');
	echo json_encode($result);
?>
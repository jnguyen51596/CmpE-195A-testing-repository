<?php
	session_start();
	include "sql/pdo.php";

	$memberID = $_SESSION['userID'];
//        $memberID = 1;
       
	$row = getNotifications($memberID);
	header('Content-Type: application/json');
	if ($row != 0) {
		echo json_encode($row);
	} else {
		echo '{ "courseID" : "-1" }';
	}
?>
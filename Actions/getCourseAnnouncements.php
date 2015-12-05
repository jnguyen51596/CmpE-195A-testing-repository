<?php
	include "sql/pdo.php";
	$courseID = $_POST['courseID'];
	$result = getAllAnnouncementsByClass($courseID);
	echo json_encode($result);
?>
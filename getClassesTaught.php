<?php
	//$instructorID = $_POST['instructor'];
	include "sql/pdo.php";
	$row = getClasses(0);
	header('Content-Type: application/json');
	echo json_encode($row);
	//echo json_encode(array('0' => 'My Ajax Class', '1' => 'My JSON Class'));
	//echo json_encode(array('0' => 'My SQL Class', '1' => 'My JQuery Class'));
?>
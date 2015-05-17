<?php
	include "sql/pdo.php";
	$searchTerm = $_POST['search'];
	$result = searchClasses($searchTerm);
	header('Content-Type: application/json');	
	echo json_encode($result);
?>

<?php
	include "sql/pdo.php";
	$searchTerm = $_POST['search'];
	$result = searchClasses($searchTerm);
	echo json_encode($result);
?>

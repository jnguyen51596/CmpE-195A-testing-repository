<?php
	include "sql/pdo.php";
	echo setGrades($_POST['memberID'], $_POST['assignmentID'], $_POST['score'], $_POST['feedback']);
?>
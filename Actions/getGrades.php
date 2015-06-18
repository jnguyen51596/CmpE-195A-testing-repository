<?php
	session_start();
	include "sql/pdo.php";

	$memberID = $_SESSION['userID'];
//        $memberID = 1;
       
        $courseID = $_POST['courseID'];
//        $courseID = 2;
//        echo $courseID;
        
	$row = getSpecificGrades($memberID, $courseID);
	header('Content-Type: application/json');
	if ($row != 0) {
		echo json_encode($row);
	} else {
		echo '{ "courseID" : "-1" }';
	}
?>
<?php

session_start();
include 'sql/pdo.php';
$classID = $_POST['classID'];
$assignmentID = $_POST['assignmentID'];
updateAssignmentLock($classID,$assignmentID);
echo true;

?>

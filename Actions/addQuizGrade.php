<?php
session_start();
$classID=$_POST['classid'];
$quizID=$_POST['quizid'];
$points=$_POST['points'];
$studentid=$_SESSION['userID'];      
require 'sql/pdo.php';
$rows=  getQuizAssignmentNumber($classID, $quizID);
$assignmentid=0;
foreach ($rows as $values)
{
    $assignmentid=$values["assignmentID"];
}

addQuizGrade($studentid,$assignmentid, $points);
echo "true";

?>

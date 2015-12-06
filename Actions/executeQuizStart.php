<?php
session_start();
include 'sql/pdo.php';
$title = $_POST['title'];
$classID = $_POST['classID'];
$quiznumber = $_POST['quizNumber'];
$duedate = $_POST['duedate'];
//echo json_encode($duedate);
//$title = "seven";
//$classID = "6";
//$quiznumber = "190";
//$duedate = "2015-11-21 12:00:00";
//$title='sdfa';
//$classID='1';
//$quiznumber='24';
$test = checkQuiz($classID, $quiznumber);
$authorID= $_SESSION['userID'];
if ($test == 1 && $classID !=0) {
    $quiztitle='quiz'.$quiznumber;
    $assignmentID = addAssignment($classID, $authorID, $quiztitle, 100, $duedate, 'quiz');
    addQuiz($classID, $quiznumber, $title, $duedate, $assignmentID);
     
    echo json_encode(true);
} else {
    echo json_encode(false);
}
?>


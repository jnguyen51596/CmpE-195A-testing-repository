<?php
session_start();
include 'sql/pdo.php';
$title = $_POST['title'];
$classID = $_POST['classID'];
$quiznumber = $_POST['quizNumber'];
$duedate = $_POST['duedate'];
//$title='sdfa';
//$classID='1';
//$quiznumber='24';
$test = checkQuiz($classID, $quiznumber);
$authorID=$_SESSION['userID'];
if ($test == 1 && $classID !=0) {
    $quiztitle='quiz'.$quiznumber;
    addQuiz($classID, $quiznumber, $title, $duedate);
    addAssignment($classID, $authorID, $quiztitle, '100', $duedate, 'quiz'); 
    echo "true";
} else {
    echo "false";
}
?>


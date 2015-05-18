<?php
session_start();
include 'sql/pdo.php';
if(isset($_POST['radio-choice-h-2']))
{
    $questionType=$_POST['radio-choice-h-2'];
    $quizID=$_POST['quizID'];
}
addQuizQuestion($questionType, $quizID, $classID);
?>

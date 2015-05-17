<?php
include 'sql/pdo.php';
$classID='1';
if(isset($_POST['radio-choice-h-2']))
{
    $questionType=$_POST['radio-choice-h-2'];
    $quizID=$_POST['quizID'];
}
addQuizQuestion($questionType, $quizID, $classID);
?>

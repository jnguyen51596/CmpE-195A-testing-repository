<?php
include 'sql/pdo.php';
$title= $_POST['title'];
$classID= $_POST['classID'];
$quizID= $_POST['quizNumber'];
$result = addQuiz($classID,$quizID,$title);
echo $result;
?>


<?php
session_start();
include 'sql/pdo.php';
$title=$_POST['title'];
$classID=$_POST['classID'];
$quizID=$_POST['quizNumber'];

addQuiz($classID,$quizID,$title);
?>


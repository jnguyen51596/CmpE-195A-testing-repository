<?php
$quizid=$_POST['quizid'];
$classid=$_POST['classid'];
require 'pdoj.php';
$rows=getQuizQuestion1($classid,$quizid);
if ($rows == 0) {
} else {
    header('Content-Type: application/json');
    echo json_encode($rows);
}
?>


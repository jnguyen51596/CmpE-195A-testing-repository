<?php
    require 'sql/pdo.php';
    $classID = $_POST['class'];
    $quizID = $_POST['quizID'];
    $rows = getQuizName($classID, $quizID);
    header('Content-Type: application/json');
    $title = $rows[0]['title'];
    echo $title;

?>


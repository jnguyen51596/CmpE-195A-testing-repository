<?php
    require 'sql/pdo.php';
    $classID = $_POST['class'];
    $quiznumber = $_POST['quiznumber'];
    $rows = getQuizName($classID, $quiznumber);
    header('Content-Type: application/json');
    $title = $rows[0]['title'];
    echo $title;

?>


<?php

session_start();
include 'sql/pdo.php';
$questionType = $_POST['questionType'];
$classID = $_POST['classID'];
$quiznumber = $_POST['quiznumber'];

if ($questionType == "multipleChoice") {

    $question = $_POST['question'];
    if (checkQuizQuestion1($classID, $quiznumber, $question) == false) {
        echo false;
    } else {
        $answer = $_POST['answer'];
        $incorrectAnswer1 = $_POST['incorrectAnswer1'];
        $incorrectAnswer2 = $_POST['incorrectAnswer2'];
        $incorrectAnswer3 = $_POST['incorrectAnswer3'];
        addQuizQuestion1($classID, $quiznumber, $question, $answer, $incorrectAnswer1, $incorrectAnswer2, $incorrectAnswer3);
        echo true;
    }
} else if ($questionType == "trueFalse") {
    $question = $_POST['question'];
     if (checkQuizQuestion2($classID, $quiznumber, $question) == false) {
        echo false;
    } else {
    $answer = $_POST['answer'];
    addQuizQuestion2($classID, $quiznumber, $question, $answer);
    echo true;
    }
} else {
    $question = $_POST['question'];
     if (checkQuizQuestion3($classID, $quiznumber, $question) == false) {
        echo false;
    } else {
    addQuizQuestion3($classID, $quiznumber, $question);
    echo true;
    }
}
?>

<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=openlms", "root", "root");
    $con->setAttribute(PDO::ATTR_ERRMOD, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo "<p>Connection failed</p>";
}

function checkLogin($sjsuid, $password) {
    global $con;
    $sql = "SELECT * FROM login WHERE username='$sjsuid' AND password='$password';";

    $q = $con->prepare($sql);
    $q->execute(array(':username' => $sjsuid));
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return 0;
    } else {
        setcookie("username", $sjsuid);
        return 1;
    }
}

function addQuizQuestion($questionType, $quizID, $classID) {
    global $con;
    if ($questionType == 'multipleChoice') {
        $questionA = $_POST['question-a'];
        $answerA = $_POST['answer-a'];
        $incorrectAnswer1 = $_POST['incorrectAnswer1'];
        $incorrectAnswer2 = $_POST['incorrectAnswer2'];
        $incorrectAnswer3 = $_POST['incorrectAnswer3'];
        $con->exec("INSERT INTO multipleChoice(classID,quizID, question, answer, incorrect1, incorrect2, incorrect3) VALUES ($classID,$quizID,$questionA, $answerA, $incorrectAnswer1, $incorrectAnswer2, $incorrectAnswer3 );");
    } else if ($questionType == 'trueFalse') {
        $questionB = $_POST['question-b'];
        $answerB = $_POST['trueFalseChoice-b'];
        $con->exec("INSERT INTO trueFalse(classID,quizID,question,answer) VALUES ($classID,$quizID,$questionB,$answerB);");
    } else {
        $questionC = $_POST['question-c'];
        $con->exec("INSERT INTO shortAnswer(classID,quizID,question) VALUES ($classID, $quizID, $questionC);");
    }
    
}
?>


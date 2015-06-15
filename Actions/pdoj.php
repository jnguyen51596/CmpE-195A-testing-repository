<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=openlms", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo "<p>Connection failed</p>";
}

function checkLogin($username, $password) {
    global $con;
    $sql = "SELECT * FROM member WHERE username=:username AND pass=:password;";

    $q = $con->prepare($sql);
    $q->execute(array(':username' => $username, ':password' => $password));
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 1) {
        //setcookie("username", $sjsuid);
        return true;
    } else {
        return false;
    }
}


function addThread($title, $date, $question, $classID, $username) {
    global $con;
    $sql = "INSERT into messagethread(classID, date, userID, question, title) VALUES('$classID','$date','$username','$question','$title');";
    $q = $con->prepare($sql);
    $q->execute();
    if ($q) {
        echo "true";
    }
}

function getMessage($classID) {
    global $con;
    $sql = "SELECT * FROM messagethread WHERE classID='$classID';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function getComment($question, $questionid, $classid) {
    global $con;
    $sql = "SELECT * FROM comment WHERE question='$question' AND questionID='$questionid' AND classID='$classid';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
       echo false;
    } else {
        return $rows;
    }
}

function addComment($question, $questionid, $classid, $comment, $userid) {
    global $con;
    $sql = "INSERT into comment(questionID, classID, userID, question, comment) VALUES('$questionid','$classid','$userid','$question','$comment');";
    $q = $con->prepare($sql);
    $q->execute();
    echo 'true';
}

function getQuiz($classID) {
    global $con;
    $sql = "SELECT * FROM totalquiz WHERE classID='$classID' ORDER BY quizID;";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function getQuizQuestion1($classID, $quizID)
{
    global $con;
    $sql = "SELECT * FROM multiplechoice WHERE classID='$classID' AND quizID='$quizID';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}
function getQuizQuestion2($classID, $quizID)
{
    global $con;
    $sql = "SELECT * FROM truefalse WHERE classID='$classID' AND quizID='$quizID';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function getQuizQuestion3($classID, $quizID)
{
    global $con;
    $sql = "SELECT * FROM shortanswer WHERE classID='$classID' AND quizID='$quizID';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}
?>

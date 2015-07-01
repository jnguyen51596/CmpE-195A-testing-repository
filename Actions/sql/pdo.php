<?php

try {
    $con = new PDO("mysql:host=localhost;dbname=openlms", "root", "root");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo "<p>Connection failed</p>";
}

function getStudentCourses($memberID) {
    global $con;
    $sql = "SELECT course.courseID, prefix, suffix, name FROM course, coursemember WHERE memberID = :memberID AND course.courseID = coursemember.courseID";
    $q = $con->prepare($sql);
    $q->execute(array(':memberID' => $memberID));
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;
    } else {
        return $rows;
    }
}

function createAnnouncement($instructorID, $courseID, $messageBody) {
    global $con;

    $sql = "INSERT INTO announcement (body, authorID, courseID) 
            VALUES (:messageBody, :instructorID, :courseID)";
    $q = $con->prepare($sql);
    $q->execute(array(':messageBody'=>$messageBody,
                        ':courseID'=>$courseID,
                        ':instructorID'=>$instructorID));
    return $con->lastInsertId();
}

// map annoucement to students in a selected course
function sendAnnouncement($announcementID, $courseID) {
    global $con;
    $sql = "INSERT INTO announcementnotify(studentID, announcementID)
        	SELECT memberID, :announcementID from coursemember
        	WHERE courseID = :courseID";
    $q = $con->prepare($sql);
    $q->execute(array(':courseID'=>$courseID,
                        ':announcementID'=>$announcementID));
}

function createClass($courseName, $prefix, $suffix, $instructorID) {
    global $con;
    $sql = "
        INSERT INTO course (name, prefix, suffix)
        VALUES (:courseName, :prefix, :suffix)
    ";

    $q = $con->prepare($sql);
    $q->execute(array(':courseName' => $courseName,
        ':prefix' => $prefix,
        ':suffix' => $suffix));
    
    $sql = "INSERT INTO courseinstructor (memberID, courseID) VALUES (:instructorID, (SELECT MAX(courseID) FROM course))";

    $q2 = $con->prepare($sql);
    $q2->execute(array(':instructorID' => $instructorID));
}

function getClasses($instructorID) {
    global $con;
    $sql = "SELECT course.courseID, prefix, suffix, name FROM course, courseinstructor WHERE memberID = :memberID AND course.courseID = courseinstructor.courseID";

    $q = $con->prepare($sql);
    $q->execute(array(':memberID' => $instructorID));
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        //echo 'no classes';
        return 0;
    } else {
        return $rows;
    }
}

function getGrades($memberID) {
    global $con;
    $sql = "SELECT title, score, total, feedback
            FROM grade, assignment
            WHERE assignment.assignmentID = grade.assignmentID";

    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no grades';
        return 0;
    } else {
        return $rows;
    }
}

function setGrades($assignmentid, $score, $feedback) {
    global $con;
    $sql = "UPDATE grade 
                SET grade.score ='$score', grade.feedback = '$feedback'
                WHERE assignmentID = '$assignmentid'";
    $q = $con->prepare($sql);
    $q->execute(); // ?
}

function addQuiz($classID, $quizID, $title) {
    global $con;
    $sql = "Select * FROM totalquiz where classID='$classID' and quizID='$quizID';";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID));
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        $sql = "INSERT INTO totalquiz (classID,quizID,title) VALUES ('$classID','$quizID','$title');";
        $con->exec($sql);
        echo true;
    } else {
        echo false;
    }
}

function addQuizQuestion1($classID, $quizID, $question, $answer, $incorrectAnswer1, $incorrectAnswer2, $incorrectAnswer3) {
    global $con;
    $sql = "INSERT INTO multiplechoice(classID,quizID, question, answer, incorrect1, incorrect2, incorrect3) VALUES ('$classID','$quizID','$question', '$answer', '$incorrectAnswer1', '$incorrectAnswer2', '$incorrectAnswer3' );";
    $con->exec($sql);
}

function addQuizQuestion2($classID, $quizID, $question, $answer) {
    global $con;
    $sql = "INSERT INTO truefalse(classID,quizID,question,answer) VALUES ('$classID','$quizID','$question','$answer');";
    $con->exec($sql);
}

function addQuizQuestion3($classID, $quizID, $question) {
    global $con;
    $sql = "INSERT INTO shortanswer(classID,quizID,question) VALUES ('$classID', '$quizID', '$question');";
    $con->exec($sql);
}

function searchClasses($searchTerm) {
    global $con;
    $sql = "SELECT name, courseID FROM course WHERE name LIKE :searchTerm;";
    $q = $con->prepare($sql);
    $q->execute(array(':searchTerm' => '%' . $searchTerm . '%'));
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no classes found';
        return 0;
    } else {
        return $rows;
    }
}

function enrollInClass($studentID, $courseID) {
    global $con;
    $sql = "INSERT INTO coursemember (memberID, courseID)
            VALUES ('$studentID', '$courseID')";
    $con->exec($sql);
}

function getStudents($courseID) {
    global $con;
    $sql = "SELECT member.memberID, firstName, lastName FROM member, coursemember WHERE member.memberID = coursemember.memberID AND courseID = :courseID;";
    $q = $con->prepare($sql);
    $q->execute(array(':courseID' => $courseID));
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;
    } else {
        return $rows;
    }
}

function dropStudent($courseID, $memberID) {
    global $con;
    $sql = "DELETE FROM coursemember 
            WHERE memberID = :memberID AND courseID = :courseID;";
    $q = $con->prepare($sql);
    $q->execute(array(':memberID' => $memberID, ':courseID' => $courseID));
    return 1;
}

function addAssignment($courseID, $authorID, $title, $total, $duedate, $description) {
    global $con;
    $sql = "INSERT INTO assignment(courseID, authorID, title, total, duedate, description)
            VALUES($courseID, $authorID, '$title', $total, '$duedate', '$description')";
    $q = $con->prepare($sql);
    $q->execute();
}

function courseGrab($name) {
    global $con;
    $sql = "SELECT name FROM course;";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function register($username, $first, $last, $pass1) {
    global $con;
    $sql = "INSERT INTO member (username, firstName, lastName, pass) VALUES ('$username', '$first', '$last', '$pass1');";
    $q = $con->prepare($sql);
    $bool = $q->execute();
    return $bool;
}

function getFirst($username) {
    global $con;
    $sql = "SELECT firstName FROM member WHERE username = '$username'";
    $q = $con->prepare($sql);
    $q->execute();

    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no classes';
        return 0;
    } else {
        return $rows;
    }
}

function getLast($username) {
    global $con;
    $sql = "SELECT lastName FROM member WHERE username = '$username'";
    $q = $con->prepare($sql);
    $q->execute();

    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no classes';
        return 0;
    } else {
        return $rows;
    }
}

function getpass($username) {
    global $con;
    $sql = "SELECT pass FROM member WHERE username = '$username'";
    $q = $con->prepare($sql);
    $q->execute();

    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no classes';
        return 0;
    } else {
        return $rows;
    }
}

function editInfo($first, $last, $pass, $username) {
    global $con;
    $sql = "UPDATE member SET firstName='$first', lastName='$last', pass='$pass' WHERE username='$username'";
    $q = $con->prepare($sql);
    $bool = $q->execute();
    return $bool;
}

//TODO: REMOVE THIS WHEN NO LONGER USING USERID
function getUserID($username) {
    global $con;
    $sql = "SELECT memberID FROM member WHERE username = '$username'";
    $q = $con->prepare($sql);
    $q->execute();

    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no';
        return 0;
    } else {
        return $rows;
    }
}

function getAllAnnouncementsByClass($courseID) {
    global $con;
    $sql = "SELECT body, firstName, lastName, announcementID
            FROM announcement, member
            WHERE courseID = :courseID AND authorID = memberID
            ORDER BY announcementID DESC;";
    $q = $con->prepare($sql);
    $q->execute(array(':courseID'=> $courseID));
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;

	}

    }


function getHwComment($hwid, $username, $classid) {
    global $con;
    $sql = "SELECT * FROM hwcomment WHERE hwid='$hwid' AND username='$username' AND classID='$classid' ORDER BY commentID;";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function addHwComment($hwid, $username, $classid, $comment) {
    global $con;
    $sql = "INSERT INTO hwcomment(commentID, hwid, username, classID, comment) VALUES ('', '$hwid', '$username','$classid','$comment');";
    $q = $con->prepare($sql);
    $q->execute();
    if ($q) {
        echo true;
    } else {
        echo false;
    }
}

function getStudentCommentList($classID,$hwid) {
    global $con;
    $sql = "SELECT * FROM assignmentstudentlist WHERE classID='$classID' AND assignmentID='$hwid' AND turnedin='1';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function getSpecificGrades($memberID, $courseID) {
    global $con;
    $sql = "SELECT title, score, total, feedback 
        FROM grade JOIN assignment ON grade.assignmentID=assignment.assignmentID 
        WHERE memberID='$memberID' AND courseID='$courseID'";

    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no grades';
        return 0;
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

function checkLogin($username, $password) {
    global $con;
    $sql = "SELECT * FROM member WHERE username=:username AND pass=:password;";

    $q = $con->prepare($sql);
    $q->execute(array(':username' => $username, ':password' => $password));
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 1) {
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


function checkQuizQuestion1($classID, $quizID,$question)
{
    global $con;
    $sql = "SELECT * FROM multiplechoice WHERE classID='$classID' AND quizID='$quizID' AND question='$question';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return true;
    } else {
        return false;
    }
}

function checkQuizQuestion2($classID, $quizID,$question)
{
    global $con;
    $sql = "SELECT * FROM truefalse WHERE classID='$classID' AND quizID='$quizID' AND question='$question';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return true;
    } else {
        return false;
    }
}
function checkQuizQuestion3($classID, $quizID,$question)
{
    global $con;
    $sql = "SELECT * FROM shortanswer WHERE classID='$classID' AND quizID='$quizID' AND question='$question';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return true;
    } else {
        return false;
    }
}

function deleteQuiz1($classID, $quizID,$question)
{
    global $con;
    $sql = "DELETE FROM multiplechoice 
            WHERE classID = :classID AND quizID = :quizID AND question = :question;";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID, ':quizID' => $quizID, ':question' => $question));
}
function deleteQuiz2($classID, $quizID,$question)
{
    global $con;
    $sql = "DELETE FROM truefalse 
            WHERE classID = :classID AND quizID = :quizID AND question = :question;";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID, ':quizID' => $quizID, ':question' => $question));
}
function deleteQuiz3($classID, $quizID,$question)
{
    global $con;
    $sql = "DELETE FROM shortanswer
            WHERE classID = :classID AND quizID = :quizID AND question = :question;";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID, ':quizID' => $quizID, ':question' => $question));
}

function getAssignments($courseID) {
	global $con;
	$sql = "SELECT *
			FROM assignment
			WHERE courseID = '$courseID'";
	$q = $con -> prepare($sql);
	$q -> execute();
	
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;
    } else {
        return $rows;
    }
}

?>
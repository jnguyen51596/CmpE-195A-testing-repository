<?php

	try {
		$con = new PDO("mysql:host=localhost;dbname=openlms", "root", "root");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);
	
	} catch(PDOException $ex) {
		echo "<p>Connection failed</p>";
	}

function getStudentCourses($studentID) {
	global $con;
	$sql = "
		SELECT cPrefix, cSuffix, cName
		FROM course, coursemember
		WHERE mID = :studentID and course.cID = coursemember.cID";
}


function createAnnoucement($instructorID, $courseID, $messageBody) {
	global $con;
	$sql = "
		INSERT INTO announcement (body, authorID, courseID)
		VALUES (:messageBody, :instructorID, :courseID)
	";
	
	$q = $con->prepare($sql);
	$q->execute(array(':messageBody'=>$messageBody,
						':courseID'=>$courseID,
						':instructorID'=>$instructorID));
}


// map annoucement to students in a selected course
function sendAnnoucement($annoucementID) {
	global $con;
	$sql = "
		INSERT INTO anncouncementnotify(studentID, annoucementID)
		SELECT mID, annoucementID from coursemember, announcement
		WHERE annoucement.courseID = coursemember.cID
	";
}

function createClass($courseName, $prefix, $suffix) {
	global $con;
	$sql = "
		INSERT INTO course (name, prefix, suffix)
		VALUES (:courseName, :prefix, :suffix)
	";
	
	$q = $con->prepare($sql);
	$q->execute(array(':courseName'=>$courseName,
						':prefix'=>$prefix,
						':suffix'=>$suffix));
}

function getClasses($instructorID) {
    global $con;
    $sql = "SELECT prefix,suffix,name 
		    FROM course";

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
	$q = $con -> prepare($sql);
	$q -> execute(); // ?
	
	
}

function checkLogin($sjsuid, $password) {
    global $con;
    $sql = "SELECT * FROM login WHERE username='$sjsuid' AND password='$password';";

    $q = $con->prepare($sql);
    $q->execute(array(':username'=>$sjsuid));
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo 'false';
        return 0;
    } else {
        setcookie("username", $sjsuid);
        echo 'true';
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

function searchClasses($searchTerm) {
    global $con;
    $sql = "SELECT name, courseID FROM course WHERE name LIKE :searchTerm;";
    $q = $con->prepare($sql);
    $q->execute(array(':searchTerm'=> '%'.$searchTerm.'%'));
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
    $q->execute(array(':courseID'=> $courseID));
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
	$q->execute(array(':memberID'=> $memberID, ':courseID' => $courseID));
	return 1;
}

?>
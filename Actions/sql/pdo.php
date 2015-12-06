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
    $q->execute(array(':messageBody' => $messageBody,
        ':courseID' => $courseID,
        ':instructorID' => $instructorID));
    return $con->lastInsertId();
}

// map annoucement to students in a selected course
function sendAnnouncement($announcementID, $courseID) {
    global $con;
    $sql = "INSERT INTO announcementnotify(studentID, announcementID)
        	SELECT memberID, :announcementID from coursemember
        	WHERE courseID = :courseID";
    $q = $con->prepare($sql);
    $q->execute(array(':courseID' => $courseID,
        ':announcementID' => $announcementID));
}

function createClass($courseName, $prefix, $suffix, $instructorID) {
    global $con;
    $sql = "INSERT INTO course (name, prefix, suffix, open) VALUES (:courseName, :prefix, :suffix, true)";

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

// add a new grade entry
function addGrade($memberID, $assignmentID) {
	global $con;
	$sql = "INSERT INTO grade(memberID, assignmentID) values(:memberID, :assignmentID)";
	$q = $con -> prepare($sql);
	$q->execute(array(':memberID' => $memberID,
                        ':assignmentID' => $assignmentID));
}

function getGrades($courseID) {
    global $con;
    $sql = "SELECT username, title, score, total, feedback, grade.assignmentID, grade.memberID
            FROM member, grade, assignment
            WHERE assignment.assignmentID = grade.assignmentID 
			and member.memberID = grade.memberID 
			and assignment.courseID = :ID";

    $q = $con->prepare($sql);
    $q->execute(array(':ID' => $courseID));
	$rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;
    } else {
        return $rows;
    }
}

function setGrades($memberID, $assignmentid, $score, $feedback) {
    global $con;
    $sql = "UPDATE grade 
                SET grade.score = :score, grade.feedback = :feedback, grade.timestamp = CURRENT_TIMESTAMP
                WHERE assignmentID = :assignmentID
                AND memberID = :memberID";
    $q = $con->prepare($sql);

    try {
        $q->execute(array(':score' => $score,
                            ':feedback' => $feedback,
                            ':assignmentID' => $assignmentid,
                            ':memberID' => $memberID));
        $q->execute();
        return true;
    }
    catch (PDOException $e) {
        return false;
    }
}

function checkQuiz($classID, $quiznumber) {
    global $con;
    $sql = "Select * FROM totalquiz where classID='$classID' and quiznumber='$quiznumber';";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID));
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return 1;
    } else {
        return 0;
    }
}

function addQuiz($classID, $quiznumber, $title, $date) {
    global $con;
    $sql = "INSERT INTO `totalquiz`(`classID`, `quiznumber`, `title`, `lock`,`date`) VALUES ('$classID','$quiznumber','$title','0','$date');";
    $con->exec($sql);
}

function getDBDate($classID, $quiznumber) {
    global $con;
    $sql = "Select * FROM totalquiz where classID='$classID' and quiznumber='$quiznumber';";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID));
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 1) {
        foreach ($rows as $value) {
            $avalue1 = $value['lock'];
            $avalue2 = $value['date'];
	    $avalue3 = $value['lockmanualoverride'];
            if ($avalue1 == 0 && $avalue3 == null) {    
                return $avalue2;
            } else {
                return 0;
            }
        }
    } else {
        return 0;
    }
}

function updateLock($classID, $quiznumber) {
    global $con;
    $sql = "UPDATE `totalquiz` SET `lock`=1 AND `lockmanualoverride`=0 WHERE quiznumber='$quiznumber' and classID='$classID' and (`lockmanualoverride`=0 OR `lockmanualoverride` IS NULL)";
    $q = $con->prepare($sql);
    $q->execute();
}

function addQuizQuestion1($classID, $quiznumber, $question, $answer, $incorrectAnswer1, $incorrectAnswer2, $incorrectAnswer3) {
    global $con;
    $sql = "INSERT INTO multiplechoice(classID,quiznumber, question, answer, incorrect1, incorrect2, incorrect3) VALUES ('$classID','$quiznumber','$question', '$answer', '$incorrectAnswer1', '$incorrectAnswer2', '$incorrectAnswer3' );";
    $con->exec($sql);
}

function addQuizQuestion2($classID, $quiznumber, $question, $answer) {
    global $con;
    $sql = "INSERT INTO truefalse(classID,quiznumber,question,answer) VALUES ('$classID','$quiznumber','$question','$answer');";
    $con->exec($sql);
}

function addQuizQuestion3($classID, $quiznumber, $question) {
    global $con;
    $sql = "INSERT INTO shortanswer(classID,quiznumber,question) VALUES ('$classID', '$quiznumber', '$question');";
    $con->exec($sql);
}

function searchClasses($searchTerm) {
    global $con;
    //$sql = "SELECT name, courseID FROM course WHERE name LIKE :searchTerm;";
    $sql = "SELECT prefix, suffix, name, courseID FROM course WHERE (name LIKE :searchTerm OR prefix LIKE :searchTerm OR suffix LIKE :searchTerm) AND open = true;";
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
    $sql = "INSERT INTO assignment(courseID, authorID, title, total, duedate, description, `lock`)
            VALUES($courseID, $authorID, '$title', $total, '$duedate', '$description', '0')";
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

function register($username, $first, $last, $hash, $salt) {
    global $con;
    $sql = "INSERT INTO member (username, firstName, lastName, hash, salt) VALUES ('$username', '$first', '$last', '$hash', '$salt')";
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

//UNUSED
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

//WILL CHANGE
function editInfo($email, $bio, $username) {
    global $con;
    $sql = "UPDATE member SET email='$email', bio='$bio' WHERE username='$username'";
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
    $q->execute(array(':courseID' => $courseID));
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;
    } else {
        return $rows;
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

function getStudentCommentList($classID, $hwid) {
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
    $sql = "SELECT title, score, total, feedback, timestamp
        FROM grade JOIN assignment ON grade.assignmentID=assignment.assignmentID 
        WHERE memberID='$memberID' AND courseID='$courseID'";

    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no grades to display ';
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

//UNUSED
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
    $sql = "SELECT * FROM totalquiz WHERE classID='$classID' ORDER BY quiznumber;";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getQuizQuestion1($classID, $quiznumber) {
    global $con;
    $sql = "SELECT * FROM multiplechoice WHERE classID='$classID' AND quiznumber='$quiznumber';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function getQuizQuestion2($classID, $quiznumber) {
    global $con;
    $sql = "SELECT * FROM truefalse WHERE classID='$classID' AND quiznumber='$quiznumber';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function getQuizQuestion3($classID, $quiznumber) {
    global $con;
    $sql = "SELECT * FROM shortanswer WHERE classID='$classID' AND quiznumber='$quiznumber';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function checkQuizQuestion1($classID, $quiznumber, $question) {
    global $con;
    $sql = "SELECT * FROM multiplechoice WHERE classID='$classID' AND quiznumber='$quiznumber' AND question='$question';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return true;
    } else {
        return false;
    }
}

function checkQuizQuestion2($classID, $quiznumber, $question) {
    global $con;
    $sql = "SELECT * FROM truefalse WHERE classID='$classID' AND quiznumber='$quiznumber' AND question='$question';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return true;
    } else {
        return false;
    }
}

function checkQuizQuestion3($classID, $quiznumber, $question) {
    global $con;
    $sql = "SELECT * FROM shortanswer WHERE classID='$classID' AND quiznumber='$quiznumber' AND question='$question';";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return true;
    } else {
        return false;
    }
}

function deleteQuiz1($classID, $quiznumber, $question) {
    global $con;
    $sql = "DELETE FROM multiplechoice 
            WHERE classID = :classID AND quiznumber = :quiznumber AND question = :question;";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID, ':quiznumber' => $quiznumber, ':question' => $question));
}

function deleteQuiz2($classID, $quiznumber, $question) {
    global $con;
    $sql = "DELETE FROM truefalse 
            WHERE classID = :classID AND quiznumber = :quiznumber AND question = :question;";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID, ':quiznumber' => $quiznumber, ':question' => $question));
}

function deleteQuiz3($classID, $quiznumber, $question) {
    global $con;
    $sql = "DELETE FROM shortanswer
            WHERE classID = :classID AND quiznumber = :quiznumber AND question = :question;";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID, ':quiznumber' => $quiznumber, ':question' => $question));
}

function getAssignments($courseID) {
    global $con;
    $sql = "SELECT *
			FROM assignment
			WHERE courseID = '$courseID'";
    $q = $con->prepare($sql);
    $q->execute();

    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;
    } else {
        return $rows;
    }
}

function insertNotification($type, $first, $last, $item, $classID) {
    global $con;
    $sql = "INSERT INTO notifications (type, first, last, item, classID) VALUES ('$type', '$first', '$last', '$item', '$classID');";
    $q = $con->prepare($sql);
    $bool = $q->execute();
    
    $sql = "SELECT MAX(ID) FROM notifications;";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;
    } else {
        return $rows;
    }
    
}

function insertRecipients($notificationID, $memberID) {
    global $con;
    $sql = "INSERT INTO notificationRecipients (notificationID, memberID) VALUES ('$notificationID', '$memberID');";
    $q = $con->prepare($sql);
    $bool = $q->execute();
    return $bool;
}

function getNotifications($memberID) {
    global $con;
    $sql = "SELECT type, first, last, item, classID, created 
        FROM notifications JOIN notificationrecipients ON notifications.ID=notificationRecipients.notificationID
        WHERE memberID='$memberID'";

    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        echo 'no notifications';
        return 0;
    } else {
        return $rows;
    }
}



function getTeacher($courseID) {
    global $con;
    $sql = "SELECT member.memberID, firstName, lastName FROM member JOIN courseinstructor ON member.memberID = courseinstructor.memberID WHERE courseID = :courseID;";
    $q = $con->prepare($sql);
    $q->execute(array(':courseID' => $courseID));
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return 0;
       } else {
        return $rows;
    }
}
        
function getQuizTotal($classID) {
    global $con;
    $sql = "SELECT quiznumber FROM totalquiz WHERE classID='$classID' ORDER BY quiznumber;";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function updateQuizTotal($data, $classID) {
    global $con;
    $length = count($data);
    for($i=1 ;$i<$length;$i+=2) {
        $quizID = $data[$i];
        $toggle = $data[$i+1];
        date_default_timezone_set('America/Los_Angeles');
        $now = date("Y-m-d H:i:s");
        $sql = "UPDATE `totalquiz` SET `lock`=$toggle WHERE quiznumber='$quizID' and classID='$classID'";
        $q = $con->prepare($sql);
        $q->execute();

        $sql = "UPDATE `totalquiz` SET `lockmanualoverride`=1 WHERE quiznumber='$quizID' and classID='$classID' and `lock`=0 and `date` < '$now'";
        $q = $con->prepare($sql);
        $q->execute();
    }
}

function addModule($classID, $moduleID, $title) {
    global $con;
    $sql = "Select * FROM modulelist WHERE classID='$classID' and moduleID='$moduleID';";
    $q = $con->prepare($sql);
    $q->execute(array(':classID' => $classID));
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        $sql = "INSERT INTO `modulelist`(`classID`, `moduleID`, `title`, `lock`) VALUES ('$classID','$moduleID','$title','0');";
        $con->exec($sql);
        echo true;
    } else {
        echo false;
    }
}

function getModule($classID) {
    global $con;
    $sql = "SELECT * FROM modulelist WHERE classID='$classID' ORDER BY moduleID;";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getModuleDescription($moduleid, $classid) {
    global $con;
    $sql = "SELECT moduledescription.description, modulelist.title From moduledescription "
            . "inner join modulelist on moduledescription.classID=modulelist.classID and "
            . "moduledescription.moduleID=modulelist.moduleID "
            . "WHERE moduledescription.moduleID='$moduleid' and moduledescription.classID='$classid' "
            . "order by moduledescription.order";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}

function addModuleDescription($description, $moduleid1, $classid1) {
    global $con;
    $sql = "INSERT into `moduledescription`(`moduleID`, `classID`, `description`) VALUES('$moduleid1','$classid1', :description);";
    $q = $con->prepare($sql);
    $q->bindParam(':description', $description, PDO::PARAM_INT);
    $q->execute();
    return 1;
}

function isUserInstructor($userID, $courseID) {
    global $con;
    $sql = "select * from courseinstructor  WHERE memberID = :userID AND courseID = :courseID";
    $q = $con->prepare($sql);
    $q->execute(array(':userID' => $userID, ':courseID' => $courseID));
    $rows = $q->fetchAll();
    if (count($rows) == 0) {
        return false;
    } else {
        return true;
    }
}

function copyCourse($instructorID, $courseID, $firstAssignmentStartDate) {
    try {
        //echo "Copying course...";
        global $con;
        
        $sql = "INSERT INTO course (`prefix`, `suffix`, `name`) 
                SELECT `prefix`, `suffix`, `name` FROM course WHERE courseID = :courseID";
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();
        $newClassID = $con->lastInsertId();
        //$id now == new class id

        //setting course instructor
        //echo "<br>Setting course instructor...";
        $sql = "INSERT INTO courseinstructor (memberID, courseID) 
                VALUES (:instructorID, ".$newClassID.")";
        $q = $con->prepare($sql);
        $q->bindParam(':instructorID', $instructorID, PDO::PARAM_INT);
        $q->execute();

        //copy over assignments to new class     
        //echo "<br>Copying assignments...";
        $sql = "INSERT INTO assignment (courseID, authorID, title, total, duedate, description, `lock`)
                SELECT ".$newClassID.", authorID, title, total, duedate, description, 0 
                FROM assignment
                WHERE courseID = :courseID;";
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();
        
        //copy over modules
        //echo "<br>Copying modules...";
        $sql = "INSERT INTO modulelist (`classID`, `moduleID`, `title`, `lock`)SELECT ".$newClassID.", `moduleID`, `title`, `lock` FROM modulelist WHERE classID = :courseID";
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();

        //copy moduledescriptions
        //echo "<br>Copying module descriptions...";
        $sql = "INSERT INTO moduledescription (`moduleID`, `classID`, `description`)
                SELECT `moduleID`, ".$newClassID.", `description` 
                FROM moduledescription
                WHERE classID = :courseID";
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();

        //copy over multiple choice questions
        //echo "<br>Copying MC questions...";
        $sql = "INSERT INTO multiplechoice (`classID`, `quiznumber`, `question`, `answer`, `incorrect1`, `incorrect2`, `incorrect3`)
                SELECT ".$newClassID.", `quiznumber`, `question`, `answer`, `incorrect1`, `incorrect2`, `incorrect3` 
                FROM multiplechoice
                WHERE classID = :courseID";
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();

        //copy over short answer questions
        //echo "<br>Copying short answer questions...";
        $sql = "INSERT INTO shortanswer (`classID`, `quiznumber`, `question`)
                SELECT ".$newClassID.", `quiznumber`, `question` 
                FROM shortanswer
                WHERE classID = :courseID";
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();

        //copy over true/false questions
        //echo "<br>Copying true/fasle questions...";
        $sql = "INSERT INTO truefalse (`classID`, `quiznumber`, `question`, `answer`)
                SELECT ".$newClassID.", `quiznumber`, `question`, `answer`
                FROM truefalse
                WHERE classID = :courseID";
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();

        //copy over quiz
        //echo "<br>Copying quizzes...";
        $sql = "INSERT INTO totalquiz (`classID`, `quiznumber`, `title`, `lock`, `date`)
                SELECT ".$newClassID.", `quiznumber`, `title`, `lock`, `date`
                FROM totalquiz
                WHERE classID = :courseID";
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();

        //increment duedates
        //echo "<br>Incrementing duedates...";
        $sql = "SELECT assignmentID, duedate FROM assignment WHERE courseID = ".$courseID." ORDER BY duedate LIMIT 1;"; 
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();
        $rows = $q->fetchAll(PDO::FETCH_ASSOC);
        date_default_timezone_set('America/Los_Angeles');
        $firstAssignmentStartDate = date_create($firstAssignmentStartDate);
        $currentFirstAssignmentDate = date_create($rows[0]['duedate']);
        //echo "<br>$rows[0]['duedate'] = ".$rows[0]['duedate'];
        //echo "<br>firstAssignmentStartDate = ".$firstAssignmentStartDate->format('Y-m-d H:i:s');
        //echo "<br>currentFirstAssignmentDate = ".$currentFirstAssignmentDate->format('Y-m-d H:i:s');

        if ($firstAssignmentStartDate < $currentFirstAssignmentDate) {
            return "error";
        }
        $diff = $currentFirstAssignmentDate->diff($firstAssignmentStartDate)->days;
        //echo "<br>Diff = ".$diff;
        $sql = "UPDATE assignment SET duedate = DATE_ADD(duedate, INTERVAL ".($diff+1)." DAY), `lock` = 0 WHERE courseID = :courseID;"; 
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $newClassID, PDO::PARAM_INT);
        $q->execute();

        $sql = "UPDATE totalquiz SET `date` = DATE_ADD(`date`, INTERVAL ".($diff+1)." DAY), `lock` = 0 WHERE classID = :courseID;"; 
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $newClassID, PDO::PARAM_INT);
        $q->execute();

        /*
        $sql = "SELECT assignmentID, duedate FROM assignment WHERE courseID = :courseID ORDER BY duedate LIMIT 1;"; 
        $q = $con->prepare($sql);
        $q->bindParam(':courseID', $courseID, PDO::PARAM_INT);
        $q->execute();
        $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    
        $currentFirstAssignmentDate = date_create($rows[0]['duedate']);*/

        return "success";
    } catch (PDOException $ex) {
        return "<p>Connection failed</p>";
    }
}

function addQuizGrade($studentid, $assignmentid, $points) {
    global $con;
    $sql = "INSERT INTO `grade`(`memberID`, `assignmentID`, `score`, `feedback`) VALUES ('$studentid','$assignmentid','$points','') ";
    $q = $con->prepare($sql);
    $q->execute();
}

function getQuizAssignmentNumber($classid, $quizid) {
    global $con;
    $newdescription='quiz'.$quizid;
    $sql = " SELECT assignmentID FROM assignment WHERE courseID = '$classid' and title='$newdescription'";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        echo false;
    } else {
        return $rows;
    }
}
function checkUser($username) {
    global $con;
    $sql = "SELECT * FROM member WHERE username = '$username'";

    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) == 0) {
        return false;
    } else {
        return true;
    }
}

function checkLogin2($username, $password) {
    global $con;

    $sql = "SELECT salt, hash FROM member WHERE username = '$username'";
    $q = $con->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll(PDO::FETCH_ASSOC);
    
     if (count($rows) == 1) {
         
        $salt = $rows[0]['salt'];
        $storedHash = $rows[0]['hash'];
        $combined = $password . $salt;
        $hash = hash('sha256', $combined);
        
        if($hash == $storedHash)
        {
            return true;
        }else{
            return false;
        }
        
    }else{
        return false;
    }
    

}

function getBio($username) {
    global $con;
    $sql = "SELECT bio FROM member WHERE username = '$username'";
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

function getEmail($username) {
    global $con;
    $sql = "SELECT email FROM member WHERE username = '$username'";
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

function updateAssignmentLock($classID, $assignmentID) {
    global $con;
    $sql = "UPDATE `assignment` SET `lock`=1 WHERE assignmentID='$assignmentID' and courseID='$classID'";
    $q = $con->prepare($sql);
    $q->execute();
}

function updateAssignmentTotal($data, $classID) {
    global $con;
    $length = count($data);
    for ($i = 1; $i < $length; $i+=2) {
        $assignmentID = $data[$i];
        $toggle = $data[$i + 1];
        $sql = "UPDATE `assignment` SET `lock`=$toggle WHERE assignmentID='$assignmentID' and courseID='$classID'";
        $q = $con->prepare($sql);
        $q->execute();
    }
}

function updateEnrollment($classid, $open) {
    global $con;

        $sql = "UPDATE `course` SET open=$open WHERE courseID='$classid'";
        $q = $con->prepare($sql);
        $q->execute();
    }


?>
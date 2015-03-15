<?php

	try {
		$con = new PDO("mysql:host=localhost;dbname=openlms", "root", "root");
		$con -> setAttribute(PDO::ATTR_ERRMOD,
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
		INSERT INTO openlms.announcement(body, authorID, courseID)
		VALUES (:$messageBody, :instructorID, :courseID)
	";
	
	$q = $con -> prepare($sql);
	$q -> execute(array(':messageBody' => $messageBody,
						':courseID' => $courseID,
						':instructorID' => $instructorID));
	$rows = $q -> fetchAll(PDO::FETCH_ASSOC);
	if (count($row) == 0) {
		return 0;
	} else {
		return 1;
}

// map annoucement to students in a selected course
function sendAnnoucement($annoucementID) {
	global $con;
	$sql = "
		INSERT INTO anncouncementnotify(studentID, annoucementID)
		SELECT mID, :$annoucementID from coursemember, announcement
		WHERE annoucement.courseID = coursemember.cID
	";
}

?>
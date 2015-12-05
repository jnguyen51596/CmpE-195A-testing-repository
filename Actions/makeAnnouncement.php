<?php
session_start();
require 'sql/pdo.php';
$courseID = $_POST['courseID'];
$body = $_POST['body'];
$instructorID = $_SESSION['userID']; //used since getUserID returns an array
$id = createAnnouncement($instructorID, $courseID, $body);
sendAnnouncement($id, $courseID);
echo json_encode("Success");
?>
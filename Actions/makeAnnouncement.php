<?php
session_start();
require 'sql/pdo.php';
$courseID = $_POST['courseID'];
$body = $_POST['body'];
$ID = getUserID($_SESSION['username']);
$instructorID = $ID[0][0]; //used since getUserID returns an array
$id = createAnnouncement($instructorID, $courseID, $body);
sendAnnouncement($id, $courseID);
echo json_encode("Success");
?>
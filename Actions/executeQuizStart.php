<?php
session_start();
include 'sql/pdo.php';
$title = $_POST['title'];
$classID = $_POST['classID'];
$quizID = $_POST['quizNumber'];

//$title='sdfa';
//$classID='1';
//$quizID='24';

$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];

//$month='02';
//$day='03';
//$year='2015';

$hour = $_POST['hour'];
$minutes = $_POST['minutes'];
$timeOfDay = $_POST['timeOfDay'];

//$hour='12';
//$minutes='55';
//$timeOfDay='noon';

$seconds = '00';
$minutes2 = sprintf('%02d', $minutes);


$date = new DateTime();
$date->setDate($year, $month, $day);
$date->setTime($hour, $minutes2, $seconds);
$newDate = $date->format('Y-m-d H:i:s');
$test = checkQuiz($classID, $quizID);
if ($test == 1 && $classID !=0) {
    addQuiz($classID, $quizID, $title, $newDate);
    echo true;
} else {
    echo false;
}
?>


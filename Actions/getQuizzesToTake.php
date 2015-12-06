<?php
session_start();
require 'sql/pdo.php';

$class = $_POST['classid'];
$userID = $_SESSION['userID'];
$class = 7;
$userID = 18;


$rows = getQuizzesToTake($class, $userID);
if (count($rows) == 0) {
    echo json_encode(false);
} else {
    echo json_encode($rows);
}
?>

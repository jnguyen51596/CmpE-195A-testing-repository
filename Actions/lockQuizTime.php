<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include 'sql/pdo.php';
$classID = $_POST['classID'];
$quizID = $_POST['quizID'];

date_default_timezone_set('America/Los_Angeles');

$temp = getDBDate($classID, $quizID);
if ($temp == 0) {
    echo true;
} else {
    $databaseDate = new DateTime($temp);     
    $currentDate = new DateTime();
    date_format($currentDate, 'Y-m-d H:i:s');
    //echo date_format($databaseDate, 'Y-m-d H:i:s');
    if ($databaseDate < $currentDate) {
        updateLock($classID, $quizID);
        echo true;
    } else if ($databaseDate > $currentDate) {
        echo false;
    } else {
        echo false;
    }
}
?>

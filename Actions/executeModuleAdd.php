<?php
session_start();
include 'sql/pdo.php';
$title=$_POST['title'];
$classID=$_POST['classID'];
$moduleID=$_POST['moduleNumber'];

addModule($classID, $moduleID, $title);
?>


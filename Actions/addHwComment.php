<?php
session_start();
$hwid=$_POST['hwid'];
$username=$_POST['username'];
$classid=$_POST['classid'];
$comment=$_POST['comment'];      
require 'sql/pdo.php';
addHwComment ($hwid, $username,$classid,$comment);

?>


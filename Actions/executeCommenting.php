<?php
$comment=$_POST['comment'];
$question1=$_POST['question'];
$questionid1=$_POST['questionid'];
$classid1=$_POST['classid'];
$userid1=$_POST['userid'];
require 'pdoj.php';
addComment($question1,$questionid1,$classid1,$comment,$userid1);
echo 'true';
?>
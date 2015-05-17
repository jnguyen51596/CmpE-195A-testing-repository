<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$title=$_POST['title'];
$date=$_POST['date'];
$question=$_POST['question'];
$username=$_POST['user'];
$classID=$_POST['classid'];
require 'pdoj.php';
addThread($title, $date, $question, $classID,$username);
?>

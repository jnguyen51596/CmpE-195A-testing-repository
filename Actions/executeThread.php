<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$title=$_POST['title'];
$date = new DateTime(null, new DateTimeZone('America/New_York'));
$date->getTimestamp()+$date->getOffset();
$result=$date->format('Y-m-d');
$question=$_POST['question'];
$username=$_SESSION['username'];
$classID=$_POST['classid'];
require 'sql/pdo.php';
addThread($title, $result, $question, $classID,$username);




?>

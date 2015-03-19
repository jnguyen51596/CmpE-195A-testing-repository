<?php
include 'MySQL dump files/pdo.php';
$sjsuid=$_POST['name'];
$password=$_POST['pwd'];
checkLogin($sjsuid, $password);
?>


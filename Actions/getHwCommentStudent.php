<?php
session_start();
$hwid=$_POST['hwid'];
$username=$_SESSION['username'];
$classid=$_POST['classid'];
      
require 'sql/pdo.php';
$rows=  getHwComment($hwid, $username, $classid);
if ($rows == 0) {
    
} else {
    header('Content-Type: application/json');
    echo json_encode($rows);
}
?>


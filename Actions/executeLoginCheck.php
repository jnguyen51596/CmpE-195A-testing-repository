<?php
session_start();
require 'sql/pdo.php';

$username = $_POST['name'];
$password = $_POST['pwd'];

if(checkLogin2($username, $password)==true)
{
    $_SESSION['username']= $username;
    $result = getUserID($_SESSION['username']);
    $_SESSION['userID'] = $result[0][0];
    echo "true";
} else {
     echo "false";
}


?>
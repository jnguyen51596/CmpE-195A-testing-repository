<?php
session_start();

$userID = $_POST['name'];
$password =$_POST['pwd'];
require 'pdoj.php';

if(checkLogin($userID, $password)==true)
{
    $_SESSION['username']= $userID;
    echo "true";
} else {
     echo "false";
}
?>

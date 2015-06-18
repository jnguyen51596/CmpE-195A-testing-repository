<?php
session_start();

$userID = $_POST['name'];
$password =$_POST['pwd'];

require 'sql/pdo.php';

if(checkLogin($userID, $password)==true)
{
    $_SESSION['username']= $userID;
    echo "true";
} else {
     echo "false";
}
?>

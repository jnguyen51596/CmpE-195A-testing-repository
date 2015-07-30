<?php
session_start();

$userID = $_POST['name'];
$password =$_POST['pwd'];

require 'sql/pdo.php';

if(checkLogin($userID, $password)==true)
{
    $_SESSION['username']= $userID;
    $result = getUserID($_SESSION['username']);
    $_SESSION['userID'] = $result[0][0];
    echo "true";
} else {
     echo "false";
}
?>

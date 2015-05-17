<?php
session_start();

$sjsuid = $_POST['name'];
$password =$_POST['pwd'];
require 'pdoj.php';
checkLogin($sjsuid, $password);
if(checkLogin($sjsuid, $password)==true)
{
    
    $_SESSION["username"]= $sjsuid;
    echo "true";
}
 else {
     echo "false";
}
?>

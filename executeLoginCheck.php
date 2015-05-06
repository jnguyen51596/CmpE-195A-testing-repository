<?php
$sjsuid = $_POST['name'];
$password =$_POST['pwd'];
require 'pdoj.php';
checkLogin($sjsuid, $password);
if(checkLogin($sjsuid, $password)==true)
{
    session_start();
    $_SESSION["username"]= $sjsuid;
    echo "true";
}
 else {
     echo "false";
}
?>

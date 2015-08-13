<?php
session_start();
$description=$_POST['description'];
$moduleid1=$_POST['moduleid'];
$classid1=$_POST['classid'];

require 'sql/pdo.php';
if(addModuleDescription($description,$moduleid1,$classid1)==true)
{
    echo "true";
}

?>

<?php
$description=$_POST['description'];
$moduleid=$_POST['moduleid'];
$classid=$_POST['classid'];

require 'sql/pdo.php';
if(addModuleDescription($description,$moduleid,$classid)==1)
{
    echo true;
} else {
    echo false;
}

?>

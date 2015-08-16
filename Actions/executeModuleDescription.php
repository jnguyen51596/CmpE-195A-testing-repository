<?php
$description=$_POST['description'];
$moduleid=$_POST['moduleid'];
$classid=$_POST['classid'];

require 'sql/pdo.php';
if(addModuleDescription($description,$moduleid,$classid)==true)
{
    echo "true";
} else {
	echo "false";
}

?>

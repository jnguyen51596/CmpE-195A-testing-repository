<?php
$moduleid=$_POST['moduleid'];
$classid=$_POST['classid'];
$moduleid=1;
$classid=6;
      
require 'sql/pdo.php';
$rows=getModuleDescription($moduleid,$classid);
if ($rows == 0) {
	echo "rows = 0";
} else {
    echo json_encode($rows);
}
?>



<?php
$moduleid=$_POST['moduleid'];
$classid=$_POST['classid'];
      
require 'sql/pdo.php';
$rows=getModuleDescription($moduleid,$classid);
if ($rows == 0) {
	echo json_encode("rows = 0");
} else {
    echo json_encode($rows);
}
?>



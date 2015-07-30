<?php
$moduleid=$_POST['moduleid'];
$classid=$_POST['classid'];
      
require 'sql/pdo.php';
$rows=getModuleDescription($moduleid,$classid);
if ($rows == 0) {
} else {
    header('Content-Type: application/json');
    echo json_encode($rows);
}
?>



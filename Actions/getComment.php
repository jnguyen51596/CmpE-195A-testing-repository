<?php
$question=$_POST['question'];
$questionid=$_POST['questionid'];
$classid=$_POST['classid'];
      
require 'sql/pdo.php';
$rows=getComment($question,$questionid,$classid);
if ($rows == 0) {
	echo json_encode(false);
} else {
    echo json_encode($rows);
}
?>



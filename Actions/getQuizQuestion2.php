<?php
$quiznumber=$_POST['quiznumber'];
$classid=$_POST['classid'];
require 'sql/pdo.php';
$rows=getQuizQuestion2($classid,$quiznumber);
if ($rows == 0) {
    echo "false";
} else {
    
    echo json_encode($rows);
}
?>

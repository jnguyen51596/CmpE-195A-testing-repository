<?php
$quiznumber=$_POST['quiznumber'];
$classid=$_POST['classid'];
require 'sql/pdo.php';
$rows=getQuizQuestion3($classid,$quiznumber);
if ($rows == 0) {
} else {
    
    echo json_encode($rows);
}
?>
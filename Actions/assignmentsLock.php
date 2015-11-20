<?php
session_start();
require 'sql/pdo.php';
$data = $_POST['jsondata'];
$classID=$data[0];
updateAssignmentTotal($data, $classID);
echo true;
?>
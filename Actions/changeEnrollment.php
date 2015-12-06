<?php
session_start();
require 'sql/pdo.php';

$open = $_POST['open'];
$classid = $_POST['classid'];

updateEnrollment($classid, $open);
echo json_encode(true);

?>



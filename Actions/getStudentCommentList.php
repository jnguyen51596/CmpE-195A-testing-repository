
<?php

$class = $_POST['classid'];
$hwid = $_POST['hwid'];
require 'sql/pdo.php';
$rows = getStudentCommentList($class,$hwid);
if ($rows == 0) {
} else {
    header('Content-Type: application/json');
    echo json_encode($rows);
}
?>

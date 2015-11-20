
<?php

$class = $_POST['classid'];
require 'sql/pdo.php';
$rows = getAssignments($class);
if (count($rows) == 0) {
    echo false;
} else {
    echo json_encode($rows);
}
?>

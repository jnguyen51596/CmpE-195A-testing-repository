
<?php

$class = $_POST['classid'];
require 'pdoj.php';
$rows = getMessage($class);
if ($rows == 0) {
} else {
    header('Content-Type: application/json');
    echo json_encode($rows);
}
?>

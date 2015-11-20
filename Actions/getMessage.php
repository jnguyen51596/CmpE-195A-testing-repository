
<?php

$class = $_POST['classid'];

require 'sql/pdo.php';
$rows = getMessage($class);
if ($rows == 0) {
	echo json_encode(false);
} else {
    echo json_encode($rows);
}
?>


<?php
require 'sql/pdo.php';

$class = $_POST['classid'];

$rows = getQuiz($class);
if (count($rows) == 0) {
    echo json_encode(false);
} else {
    echo json_encode($rows);
}
?>

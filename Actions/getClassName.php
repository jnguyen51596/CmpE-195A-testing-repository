<?php
    require 'sql/pdo.php';
    $classID = $_POST['class'];
    $rows = getClassName($classID);
    header('Content-Type: application/json');
    $title = $rows[0]['name'];
    echo $title;
?>

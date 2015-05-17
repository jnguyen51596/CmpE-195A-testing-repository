<?php
    include "sql/pdo.php";
    $username = $_POST["username"];
    $rows = getFirst($username);
    header('Content-Type: application/json');
    $name = $rows[0]['FirstName'];
    echo $name;

?>


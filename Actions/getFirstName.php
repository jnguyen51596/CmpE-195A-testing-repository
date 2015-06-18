<?php
    session_start();
    include "sql/pdo.php";
    $username = $_SESSION["username"];
    $rows = getFirst($username);
    header('Content-Type: application/json');
    $name = $rows[0]['firstName'];
    echo $name;

?>


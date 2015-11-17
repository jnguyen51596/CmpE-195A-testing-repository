<?php
    session_start();
    include "sql/pdo.php";
    $username = $_SESSION["username"];
    $rows = getEmail($username);
    header('Content-Type: application/json');
    $name = $rows[0]['email'];
    echo $name;

?>
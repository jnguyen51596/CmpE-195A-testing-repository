<?php
    session_start();
    include "sql/pdo.php";
    $username = $_SESSION["username"];
    $rows = getBio($username);
    header('Content-Type: application/json');
    $name = $rows[0]['bio'];
    echo $name;

?>
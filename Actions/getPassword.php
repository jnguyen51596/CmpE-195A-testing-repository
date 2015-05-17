<?php
    include "sql/pdo.php";
    $username = $_POST["username"];
    $rows = getpass($username);
    header('Content-Type: application/json');
    $name = $rows[0]['pass'];
    echo $name;

?>


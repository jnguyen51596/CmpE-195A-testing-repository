<?php
	session_start();
    require 'sql/pdo.php';
    $first = $_POST["first"];
    $last = $_POST["last"];
    $pass = $_POST["pass"];
    $username = $_SESSION["username"];
    
    $check = editInfo($first, $last, $pass, $username);
    echo $check;

?>

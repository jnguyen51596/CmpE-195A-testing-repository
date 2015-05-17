<?php
    require 'sql/pdo.php';
    $username = $_POST["username"];
    $first = $_POST["first"];
    $last = $_POST["last"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    
//    $username = "asas";
//    $first = "asas";
//    $last = "ASasa";
//    $pass1 = "asas";
//    $pass2 = "Asas";
    
    $check = register($username, $first, $last, $pass1);
    echo $check;

?>

<?php
	session_start();
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
    if ($check == 1) {
    	$_SESSION['username'] = $username;
    }
    echo $check;

?>

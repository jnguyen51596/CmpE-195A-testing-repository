<?php
	session_start();
    require 'sql/pdo.php';
    $username = $_POST["username"];
    $first = $_POST["first"];
    $last = $_POST["last"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    
    $length = 15;
    $salt = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $length);
    
    $combined = $pass1 . $salt;

    $hash = hash('sha256', $combined);
    
    $check = register($username, $first, $last, $hash, $salt);
    
    if ($check == 1) {
    	$_SESSION['username'] = $username;
    }
    echo $check;

?>

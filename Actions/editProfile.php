<?php
	session_start();
    require 'sql/pdo.php';
    $email = $_POST["email"];
    $bio = $_POST["bio"];
    $username = $_SESSION["username"];
    
    $check = editInfo($email, $bio, $username);
    echo $check;

?>

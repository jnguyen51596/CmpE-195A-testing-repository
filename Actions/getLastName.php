<?php
     session_start();
    include "sql/pdo.php";
    $username = $_SESSION["username"];
    $rows = getLast($username);
    header('Content-Type: application/json');
    $name = $rows[0]['lastName'];
    echo $name;
//    echo jason_encode($rows); //WTF does this do

?>


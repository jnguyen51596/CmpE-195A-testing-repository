<?php
    include "sql/pdo.php";
    $username = $_POST["username"];
    $rows = getLast($username);
    header('Content-Type: application/json');
    $name = $rows[0]['LastName'];
    echo $name;
//    echo jason_encode($rows); //WTF does this do

?>


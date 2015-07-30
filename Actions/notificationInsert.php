<?php

session_start();
    require 'sql/pdo.php';
    $type = $_POST["type"];
    
    $tempfirst = getFirst($_SESSION['username']);
    header('Content-Type: application/json');
    $first = $tempfirst[0]['firstName'];

    $templast = getLast($_SESSION['username']);
    header('Content-Type: application/json');
    $last = $templast[0]['lastName'];


    $item = $_POST["item"];


    
    
    $check = insertNotification($type, $first, $last, $item);
    header('Content-Type: application/json');
    $notificationID = $check[0][0];
 
    echo $notificationID;
?>

<?php
    session_start();
    require 'sql/pdo.php';
    
    $notificationID = $_POST["notificationID"];
    $memberID = $_POST["memberID"];
    
    $check = insertRecipients($notificationID, $memberID);
    if ($check == 1) {
    }
    echo $check;

?>
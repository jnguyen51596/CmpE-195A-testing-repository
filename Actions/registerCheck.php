<?php
session_start();

$username = $_POST['username'];

require 'sql/pdo.php';

if(checkUser($username)==false)
{
    echo "false";
} else {
     echo "true";
}
?>
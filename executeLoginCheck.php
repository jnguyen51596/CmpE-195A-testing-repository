<?php
$sjsuid = $_POST['name'];
$password =$_POST['pwd'];
require 'pdoj.php';
checkLogin($sjsuid, $password);
?>

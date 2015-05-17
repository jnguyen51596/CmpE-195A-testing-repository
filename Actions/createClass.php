<?php
   include 'sql/pdo.php';
   	
   $courseName = $_POST['courseName'];
   $prefix = $_POST['prefix'];
   $suffix = $_POST['suffix'];
   createClass($courseName, $prefix, $suffix);
   header('Location: MakeAClass.html');
?>
<?php 
	require 'pdoj.php';
	$k = courseGrab("batman");
	foreach($k as $row){
		$name = $row['name'];
		echo($name);
	}




?>
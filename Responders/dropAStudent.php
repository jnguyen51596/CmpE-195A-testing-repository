<?php
    require '../Actions/authenticate.php';
?>
<!DOCTYPE html>
<html>
        <head>
        <title>Drop a Student</title>

       	<meta name="viewport" content="width=device-width, initial-scale=1">

		<!--
    	<link href="../css/app.css" rel="stylesheet" />
   		<link rel="stylesheet" href="../css/themes/default/testcanvas.min.css" />
    	<link rel="stylesheet" href="../css/themes/default/jquery.mobile.icons.min.css" />
    	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
    
    	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		-->
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.css" />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
				
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		
			
        <script src="../Actions/dropAStudent.js"></script>
</head>
<body>
	<div data-role="page" data-theme="b"> 
		<div data-role="header" data-theme="b">
				<h1>Drop a Student</h1>
			</div>
		<div role="main" class="ui-content">
				<br>
				<label for="studentList" class="select">Select a Student to Drop:</label>
				<select name="studentList" id="studentList">
					<option value='default'>Select a Student...</option>
				</select>
				<button onclick="dropStudent()">Drop Them</button>
			
		</div>
		<div id="searchResults" class="ui-content">
		</div>
	</div>
</body>
</htlm>
	

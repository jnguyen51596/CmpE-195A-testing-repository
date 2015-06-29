<?php
    require '../Actions/authenticate.php';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Create A Class</title>
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
	<script src="../Actions/createClass.js"></script>
	
</head>

<body>
<div data-role="page" data-theme="b">
	<div data-role="header" data-theme="b">
		<h1>Create a Class</h1>
    </div>
	
	<div>
		<label for="courseName">Class Name:</label>
		<input type="text" name="courseName" id="courseName" value="">
		<label for="prefix">4 Letter Prefix:</label>
		<input type="text" name="prefix" id="prefix" value="">
		<label for="suffix">4 Letter Suffix:</label>
		<input type="text" name="suffix" id="suffix" value="">
		<label for="slider-flip-open-course">Open Enrollment:</label>
		<select name="slider-flip-open-course" id="slider-flip-open-course" data-role="flipswitch">
		   <option value="off">No</option>
		   <option value="on" selected>Yes</option>
		</select>
		<button onclick="createClass()">Make the class!</button>
	</div>
	
</div>
</body>
</html>

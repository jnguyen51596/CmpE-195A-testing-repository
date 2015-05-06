<?php
session_start();

?>
<!DOCTYPE html>
<html>
        <head>
        <title>Mopen Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<link href="css/app.css" rel="stylesheet" /> -->

		<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>     
        <script src="userhome.js"></script>
</head>
<body>
	<div role="main" class="ui-content">
		
			<label for="role" class="select">Select One of Your Roles:</label>
			<select name="role" id="role" onchange="getCoursesByRole()">
				<option value='noselection'>Select one...</option>
				<option value='student'>Student</option>
				<option value='instructor'>Instructor</option>
			</select>		
	</div>
	<div id="results" class="ui-content">
	</div>
</body>
</htlm>

<?php
    require '../Actions/authenticate.php';
?>
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
		<!--
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
		
        <script src="../Actions/userhome.js"></script>
</head>
<body>
	<div data-role="page" data-theme="b">
	<div data-role="header" data-theme="b" >
        <h1>Mopen Home</h1>
    </div>
	<div role="main" class="ui-content">
			<button onclick='viewProfile()'>View Profile</button>
			<button onclick='editProfile()'>Edit Profile</button>
			<button onclick='viewNewAnnouncements()'>View New Announcements</button>
			<label for="role" class="select">Select a Role:</label>
			<select name="role" id="role" onchange="getCoursesByRole()">
				<option value='noselection'>Select one...</option>
				<option value='student'>Student</option>
				<option value='instructor'>Instructor</option>
			</select>		
			<hr>
	</div>
	<div id="results" class="ui-content">
	</div>
	<!--
	<form style="display: hidden" action="courseHome.php" method="POST" id="courseInfo">
  		<input type="hidden" id="prefix" name="prefix" value=""/>
  		<input type="hidden" id="suffix" name="suffix" value=""/>
  		<input type="hidden" id="name" name="name" value=""/>
  		<input type="hidden" id="courseID" name="courseID" value=""/>
	</form>-->
	</div>
</body>
</htlm>

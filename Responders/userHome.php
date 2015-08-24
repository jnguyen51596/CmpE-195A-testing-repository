<?php
require $_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mopen Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico">
        <link rel <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<link href="css/app.css" rel="stylesheet" /> -->
        <!-- removed to enable nativeDroid theme
        <link rel="stylesheet" href="../css/themes/default/testcanvas.min.css" />
<link rel="stylesheet" href="../css/themes/default/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        -->
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


        <link rel="stylesheet" href="/css/userHome.css">
        <script src="/Actions/userhome.js"></script>

</head>
<body>
	<div data-role="page" data-theme="b">
	
	
		<div data-role="header" data-theme="b">
			<a href="#panel-id" data-ajax="true"><i class='fa fa-bars'></i></a>
			<h1>Mopen Home</h1>
		</div>
		
		<!-- panel contents -->
		<div data-role="panel" data-display="push" id="panel-id" data-theme="b">
			<ul data-role="listview">
				<li data-icon='false'><a onclick='viewProfile()'><i class='lIcon fa fa-user'></i>View Profile</a></li>
				<li data-icon='false'><a onclick='editProfile()'>Edit Profile</a></li>
                                <li data-icon='false'><a onclick='viewNotifications()'>Notifications</a></li>
			</ul>
		</div>
		
		<!--
		<div data-role="content">
			<div class="inset">
				<a href="#panel-id" data-role="button" data-inline='true'><i class='lIcon fa fa-bars'></i></a>
			</div>
		</div>
		-->

		
		<div role="main" class="ui-content">
				<!-- moved to panel
				<button onclick='viewProfile()'>View Profile</button>
				<button onclick='editProfile()'>Edit Profile</button>
				-->
				<?php
					require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
				?>
				<br>
				<label for="role" class="select">Select a Role:</label>
				<select name="role" id="role" onchange="getCoursesByRole()">
					<!-- &nbsp; used to offset the right side button that aligns the text incorrectly-->
					<option value='noselection'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select one...</option>
					<option value='student'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student</option>
					<option value='instructor'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instructor</option>
				</select>
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
</html>

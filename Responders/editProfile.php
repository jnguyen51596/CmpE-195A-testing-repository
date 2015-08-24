<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Edit Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- removed to enable nativeDroid theme
        <link href="../css/app.css" rel="stylesheet" />
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
		
        <script src="/Actions/editProfile.js"></script>
    </head>
    <body>
		<div data-role="page" data-theme="b">
			<div data-role="header" data-theme="b">
				<h1>Mopen</h1>
			</div><!-- /header -->
			<?php
				require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
			?>
			<br>
			<form id="editProfile">
				<label><b>First Name:</b></label>
				<input type="text" id="fname" placeholder="First Name">
				
				<label><b>Last Name:</b></label>
				<input type="text" id="lname" placeholder="Last Name">
				
				<label><b>Old Password:</b></label>
				<input type="password" id="opass" placeholder="Old Password">
				
				<label><b>New Password:</b></label>
				<input type="password" id="npass" placeholder="New Password">
				
				<label><b>Confirm New Password:</b></label>
				<input type="password" id="cnpass" placeholder="New Password">
				
				<input  id="save" type="button" value="Save!" onclick="editInfo()">
                                <input  id="cancel" type="button" value="Cancel" onclick="home()">
                             
			</form>
		</div>
    </body>
</html>

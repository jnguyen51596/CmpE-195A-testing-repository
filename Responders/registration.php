<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <title>Registration Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!--
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
        
        <script src="/Actions/registration.js"></script>
		
    </head>
    <body>
	<div data-role="page" data-theme="b">
        <div data-role="header" data-theme="b">
            <h1>Mopen</h1>
        </div><!-- /header -->
        <br>
        <label>Register here!</label>
            <form id="registration">

                <input type="text" id="username" placeholder="Username">
                <input type="text" id="firstname" placeholder="First Name">
                <input type="text" id="lastname" placeholder="Last Name">
                <br>
                <input type="password" id="password" placeholder="Password">
                <input type="password" id="confirm" placeholder="Confirm Password">
                <br>
                <input  id="submit" type="button" value="Register" onclick="checkinfo()">
                <p class="mc-top-margin-1-5"><a href="sign-in.php">Go back to login</a></p>
            </form>
	</div>
    </body>
</html>

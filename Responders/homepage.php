<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<!DOCTYPE html>
<html>
	
    <head>
        <title>Mopen</title>
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
		
        <script src="/Actions/login.js"></script>
		
		<script>
			$(document).bind('mobileinit',function(){
				$.mobile.selectmenu.prototype.options.nativeMenu = false;
			});
		</script>
		<script>
			window.onload = function()
			{
				 
						var username = "batman";
						 $.ajax({
							type: "POST",
							url: "selectMenu.php",
							data: "name=" + username,
							cache: false,
							success: function (data) {
								if (data == 'true') {
								}
								else {
									//alert('db crashed bro');
								}
							}
						});

			}
		</script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Mopen Login</h1>
            </div><!-- /header -->
			<?php
				require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
			?>
			<br>
            <h2>Welcome!</h2>
            <p ><b>User</b></p>
            <a onClick="logout()">Logout</a>
            <div role="main">
                <div id="class-dropdown-id" data-role="fieldcontain"><!-- data-native-menu="false" -->
                    <label>Course:</label>
                    <script type="text/javascript">
			initializeClassDDList();
                    </script>
                </div>
                
                <p></p>
				<br>
                                
                  <a href="profile.html" data-ajax="false">View Profile</a>
                  <br>
                 <a href="editProfile.html" data-ajax="false">Edit Profile</a>
                 
            </div><!-- /content -->
        </div><!-- /page -->
    </body>
</html>
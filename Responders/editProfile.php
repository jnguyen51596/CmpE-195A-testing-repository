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
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
		<link rel="stylesheet" href="/css/main.css" />
            
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        
        <script src="/Actions/editProfile.js"></script>
        <script src="/Actions/profile.js"></script>
    </head>
    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b">
                <a href="#panel-id" data-ajax="true"><i class='fa fa-bars'></i></a>
                <h1>Mopen</h1>
            </div><!-- /header -->

            <!-- panel contents -->
            <div data-role="panel" data-display="push" id="panel-id" data-theme="b">
                <ul data-role="listview">
                    <li data-icon='false'><a onclick='viewProfile()'><i class='lIcon fa fa-user'></i>View Profile</a></li>
                    <li data-icon='false'><a onclick='editProfile()'>Edit Profile</a></li>
                    <li data-icon='false'><a onclick='viewNotifications()'>Notifications</a></li>
                </ul>
            </div>

            <div role="main" class="ui-content">
                <?php
                    require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
                ?>
                <br>
                
                <div id="firstName">
                <script type="text/javascript">
                    getFirstName();
                </script>            
                </div>
                
                <form id="editProfile">
                    <label><b>Email:</b></label>
                    <input type="text" id="email">
                    <script type="text/javascript">
                    getEmail2();
                    </script> 
                    
       
                    
                    
                    <label><b>Bio:</b></label>
                    <input type="text" id="bio">
                    <script type="text/javascript">
                    getBio2();
                    </script> 
                    
                    
                    <input  id="save" type="button" value="Save!" onclick="editInfo()">
                    <input  id="cancel" type="button" value="Cancel" onclick="profile()">
                                 
                </form>
            </div>
        </div>
    </body>
</html>

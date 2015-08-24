<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Mopen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script src="/Actions/notifications.js"></script>
        <script>

        window.ready=getNotifications();
        </script>
    </head>

    <body>
        
<div data-role="page" id="pageone" data-theme="b">
  <div data-role="header" data-theme="b">
    <h1>Notifications</h1>
  </div>
           
       
            <div id="results" class="ui-content">
                <br>
                You do not have any notifications.

            </div>






    
    </div><!-- /page -->
</body>
</html>
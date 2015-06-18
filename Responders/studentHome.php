<?php
    session_start();
?>
<html>
    <head>
        <title>Course Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="../css/app.css" rel="stylesheet" />

        <link rel="stylesheet" href="../css/themes/default/testcanvas.min.css" />
        <link rel="stylesheet" href="../css/themes/default/jquery.mobile.icons.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script src="../Actions/studentHome.js"></script>
    </head>

    <body>
        <div data-role="page">
            <div data-role="header" data-theme="c" id="header">
            </div>
            
            <button onclick='takeQuiz()'>Take Quiz</button>
            <button onclick='makeMessage()'>Make Message Thread</button>
            <button onclick='messageBoard()'>Go To Message Board</button>
            <button onclick='viewAnnouncements()'>View Announcements</button>
            <div role="main" id="main" data-theme="c" class="ui-content">
            </div>
           
        </div>
    </body>
</html>

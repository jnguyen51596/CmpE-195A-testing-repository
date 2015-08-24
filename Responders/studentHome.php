<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>

<html>
    <head>
        <title>Course Home</title>
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
		
		
        <script src="/Actions/studentHome.js"></script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" id="header">
            </div>

            <?php
                require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
            ?>
            <br>
			<button onclick='assignments()'>View Assignments</button>
            <button onclick='takeQuiz()'>Take Quiz</button>
            <button onclick='makeMessage()'>Make Message Thread</button>
            <button onclick='messageBoard()'>Go To Message Board</button>
            <button onclick='viewAnnouncements()'>View Announcements</button>
            <button onclick='grades()'>View Grades</button>
            <button onclick='module()'>Modules</button>
            <div role="main" id="main" data-theme="c" class="ui-content">
            </div>
           
        </div>
    </body>
</html>

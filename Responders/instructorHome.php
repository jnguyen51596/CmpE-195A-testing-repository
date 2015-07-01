<?php
    require '../Actions/authenticate.php';
?>
<?php
    session_start();
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
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.css" />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
		<link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
				
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		
		
        <script src="../Actions/instructorHome.js"></script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" id="header">
            </div>
            <button onclick='createAssignment()'>Create a Assignment</button>
            <button onclick='dropAStudent()'>Drop a Student</button>
<!--            <button onclick='makeAnnouncement()'>Make an Announcement</button>-->
            <button onclick='makeMessage()'>Make Message Thread</button>
            <button onclick='messageBoard()'>Go To Message Board</button>
            <button onclick='createQuiz()'>Create and Add Quiz Questions</button>
            <button onclick='deleteQuiz()'>View and Delete Quiz Questions</button>
            <button onclick='setGrades()'>Set Grades</button>
<!--            <button onclick='createQuiz()'>Create Quiz</button>-->

            <div role="main" id="main" data-theme="c" class="ui-content">
            </div>
           
        </div>
    </body>
</html>

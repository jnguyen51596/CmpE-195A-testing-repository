<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<html>
    <head>
        <title>LMS</title>
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
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
		<link rel="stylesheet" href="/css/main.css" />

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script src="/Actions/deleteQuiz.js"></script>
    </head>

    <body onload="deleteQuizQuestion1()">
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Manage Quiz</h1>
            </div>
            <?php
                require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
            ?>
            <br>
            
            <form role="main" id="main" class="ui-content" method="post">
                <a class='ui-btn ui-btn-a ui-corner-all' id="addQuestion" onclick="addQuestion()">Add a Question</a>
                <a class='ui-btn ui-btn-a ui-corner-all' id="delete" onclick="submitDelete()">Delete Selected Questions</a>
                <div id="demo">
                </div>
            </form>
            
        </div>
    </body>
</html>

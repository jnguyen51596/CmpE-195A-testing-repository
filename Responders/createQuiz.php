<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<html>
    <head>
        <title>LMS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- comment out to enable nativeDroid
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

        <script src="/Actions/createQuiz.js"></script>
	    <script src="/Actions/javascriptFunction.js"></script>

        <link rel="stylesheet" href="/plugins/jquery-mobile-datebox-master/css/jqm-datebox.css"/>
        <script src="/plugins/jquery-mobile-datebox-master/js/jqm-datebox.core.js"></script>
        <script src="/plugins/jquery-mobile-datebox-master/js/jqm-datebox.mode.datebox.js"></script>
        <script src="/plugins/jquery-mobile-datebox-master/js/jqm-datebox.mode.calbox.js"></script>
    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Quiz Creation</h1>
            </div><!-- /header -->
            <?php
                require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
            ?>
            <br>
            <div role="main">
                <form name="quizStart" id="quizStart" method="post">
                    <fieldset data-role="fieldcontain">
                        <label for="title">Type in Title:</label>
                        <textarea cols="40" rows="8" name="title" id="title" ></textarea>
                    </fieldset>
                    <fieldset data-role="fieldcontain">
                        <label for="quizNumber">Type in Quiz Number (number only):</label>
                        <textarea cols="40" rows="8" name="quizNumber" id="quizNumber"></textarea>
                    </fieldset>
		            
                    <div class="ui-field-contain">
                        <label>Date Due:</label>
                        <input id="date-id" type="date" data-role="datebox" data-options='{"mode":"calbox"}' />
                    </div>

                    <div class="ui-field-contain">
                        <label>Time Due:</label>
                        <input id="time-id" type="time" data-role="datebox" data-options='{"mode":"timebox"}' />
                    </div>
                    
                    <input  id="start" type="button" value="Create Quiz" onclick="submitStartQuiz()">
                </form>
            </div><!-- /content -->
        </div><!-- /page -->
    </body>
</html>

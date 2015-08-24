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
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
			
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script src="/Actions/javascriptFunction.js"></script>

    </head>

    <body>
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Module Creation</h1>
            </div><!-- /header -->
            <?php
                require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
            ?>
            <br>
            <div role="main">
                <form name="moduleAdd" id="moduleAdd" method="post">
                    <fieldset data-role="fieldcontain">
                        <label for="title">Type in Title:</label>
                        <textarea cols="40" rows="8" name="title" id="title" ></textarea>
                    </fieldset>
                    <fieldset data-role="fieldcontain">
                        <label for="moduleNumber">Type in Module ID (number only):</label>
                        <textarea cols="40" rows="8" name="moduleNumber" id="moduleNumber"></textarea>
                    </fieldset>
                    <input  id="add" type="button" value="Create Module" onclick="submitModuleAdd()">
                </form>
            </div><!-- /content -->
        </div><!-- /page -->
    </body>
</html>

<?php
require '../Actions/authenticate.php';
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
        <link rel="stylesheet" href="../css/font-awesome.min.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <link rel="stylesheet" href="../css/jquerymobile.nativedroid.css" />
        <link rel="stylesheet" href="../css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
        <link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="../Actions/javascriptFunction.js"></script>

    </head>

    <body >
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Thread Creation</h1>
            </div><!-- /header -->
            <div role="main">
                <form action="" method="post">
                    <fieldset data-role="fieldcontain">
                        <label for="threadTitle">Type in title:</label>
                        <textarea cols="40" rows="8" name="threadTitle" id="threadTitle" ></textarea>
                    </fieldset> 
                    <fieldset data-role="fieldcontain">
                        <label for="question">Type in Question:</label>
                        <textarea cols="40" rows="8" name="question" id="question" ></textarea>
                    </fieldset>  
                    <input  id="submitThread" type="button" value="Submit Thread Question" onclick="createThreadIn()"> 
                </form>
            </div><!-- /content -->
        </div><!-- /page -->
    </body>
</html>

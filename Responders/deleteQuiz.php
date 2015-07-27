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


        <script src="login.js"></script>

        <script src="../Actions/javascriptFunction.js"></script>
        <script src="../Actions/quiz.js"></script>
    </head>

    <body onload="deleteQuizQuestion1()">
        <div data-role="page" data-theme="b">
            <div data-role="header" data-theme="b" >
                <h1>Quiz View and Delete: Check to Delete</h1>
            </div>
            <?php
                require 'navbar.php';
            ?>
            <br>
            <form role="main" id="demo" class="ui-content" method="post">

            </form>
            
        </div>
    </body>
</html>

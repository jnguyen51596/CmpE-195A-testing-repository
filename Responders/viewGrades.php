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
    
        <title>Grades Page</title>
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
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
		<link rel="stylesheet" href="/css/main.css" />
				
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		
		
        <script src="/Actions/grades.js"></script>
        <script src="/Actions/gradeTrend.js"></script>

    </head>
    <body>
	<div data-role="page" data-theme="b">
        <div data-role="header" data-theme="b">
            <h1>Mopen</h1>
        </div><!-- /header -->
        <?php
            require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
        ?>
        <br>
        
        <div>
            <label id="gradeStatus">Grades</label>
            <p id="trendStats"></p>
        </div>
        
   
        <script>
            window.onload=getGrades();
        </script>
        
        <div id="results" class="ui-content">
            You do not have any grades for this class yet.

	</div>


    <!-- start trend -->
        
    <div id="total-points" >
    </div>
    
    <div id="two-week-points" >  
    </div>
    
    <div id="result" >  
    </div>
    
    <script type="text/javascript">
        displayTrend();
    </script>

    <!-- end trend -->

	</div>
    </body>
</html>


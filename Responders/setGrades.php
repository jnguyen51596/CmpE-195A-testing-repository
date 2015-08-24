<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Set Grades</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
			
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
	<script src="/Actions/setGrades.js"></script>

</head>

    <body>
	<div data-role="page" data-theme="b">
        <div data-role="header" data-theme="b">
            <h1>Set Grade</h1>
        </div>
        <?php
            require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
        ?>
        <br>
		
		<div id="assignments-id" >
			<script type="text/javascript">
				initializeAssignments();
			</script>
		</div>

	</div>
    </body>
</html>
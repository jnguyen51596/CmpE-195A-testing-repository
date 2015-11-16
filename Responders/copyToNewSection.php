<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<!DOCTYPE html>
<html>
        <head>
        <title>Make a new Section</title>

       	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/font-awesome.min.css" />
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
		<link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
		<link rel="stylesheet" href="/css/main.css" />
				
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		
		<link rel="stylesheet" href="/plugins/jquery-mobile-datebox-master/css/jqm-datebox.css"/>
        <script src="/plugins/jquery-mobile-datebox-master/js/jqm-datebox.core.js"></script>
        <script src="/plugins/jquery-mobile-datebox-master/js/jqm-datebox.mode.calbox.js"></script>
			
        <script src="/Actions/copyToNewSection.js"></script>
</head>
<body>
	<div data-role="page" data-theme="b"> 
		<div data-role="header" data-theme="b">
			<h1>Make a new Section</h1>
		</div>
		<?php
			require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
		?>
		<br>
		<div role="main" class="ui-content">
				<br>
				<label>Select Start Date for First Assignment:</label>
				<div class="ui-field-contain">
                    <input id="date-id" type="date" data-role="datebox" data-options='{"mode":"calbox"}' />
				<button onclick="createSection()">Make the Section!</button>
		</div>
	</div>
</body>
</htlm>
	

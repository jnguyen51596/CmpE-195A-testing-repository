<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<!DOCTYPE html>
<html>
        <head>
        <title>Add a Class</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="shortcut icon" href="favicon.ico">
                        <link rel <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--<link href="css/app.css" rel="stylesheet" /> -->

		<!-- removed to enable nativeDroid theme
		<link rel="stylesheet" href="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
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
		
        <script src="/Actions/addAClass.js"></script>
</head>
<body>
	<div data-role="page" data-theme="b">
		<div role="main" class="ui-content">
			<div data-role="header" data-theme="b">
				<h1>Search for classes</h1>
			</div>
			<?php
				require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
			?>
			<br>
			<label for="search-mini">Search For a Class to Add:</label>
			<input type="search" name="search-mini" id="search-mini" value="" data-mini="true">
			<hr>
			<button onclick="searchClasses()">Go!</button>
		</div>
		<div id="searchResults" class="ui-content">
		</div>
	</div>
</body>
</html>
	
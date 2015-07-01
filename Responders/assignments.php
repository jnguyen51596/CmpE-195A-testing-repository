<!DOCTYPE html>
<html lang="en-US">
<head>

    <title>Assignments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="../css/jquerymobile.nativedroid.css" />
    <link rel="stylesheet" href="../css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
    <link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
		
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
	<script src="../Actions/assignments.js"></script>
	

</head>

<body>
	<div data-role="page" data-theme="b">
		<div data-role="header" data-theme="b">
			<h1>Assignments</h1>
		</div>
		
		<!-- assignment list gets populated here -->
		<div id="assignments-id">
			<script type="text/javascript">
				initializeAssignments();
			</script>
		</div>
		
		<!-- assignment information gets populated here -->
		<div id="assignment-info-id">
			
		</div>
		
	</div>

</body>
</html>


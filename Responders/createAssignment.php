<?php
    require '../Actions/authenticate.php';
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Create An Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!--
    <link href="../css/app.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/themes/default/testcanvas.min.css" />
    <link rel="stylesheet" href="../css/themes/default/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	-->
	<!-- used by datepicker
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  -->
	
	<!--
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
	
	<script src="../Actions/createAssignment.js"></script>
	
</head>

<body>
	
<div data-role="page" data-theme="b">
	<div data-role="header" data-theme="b">
		<h1>Create Assignment</h1>
	</div>
	
	<!-- classes should populate using courseinstructor table -->
	<div id="class-dropdown-id" data-role="fieldcontain">
		<label>Course:</label>
		<script type="text/javascript">
			initializeClassDDList();
		</script>
	</div>
	
	<div data-role="fieldcontain">
		<label>Assignment Name:</label>
		<input type="text" id="assignmentname-id" placeholder="Assignment name"></input>
	</div>
	
	<div data-role="fieldcontain">
		<label>Points:</label>
		<input type="text" id="points-id" placeholder="Points"></input>
	</div>
	
	<!--
	<div data-role="fieldcontain">
		<label for="time-id">Time:</label>
		<input type="text" id="time-id" placeholder="12:00"></input>
	</div>
	
	<fieldset data-role="controlgroup" data-type="horizontal" id="ampm-id">
		<input type="radio" name="ampm" id="am-id"value="am" checked="checked" />
		<label for="am-id">AM</label>
		
		<input type="radio" name="ampm" id="pm-id" value="pm" />
		<label for="pm-id">PM</label>
	</fieldset>
	
	<label>Due Date:</label>
	<input type="text" id="datepicker-id" data-role="date" data-inline="true" placeholder="Select due date"></input>
	<div id="datepicker"></div>

	<script>
		$( "#datepicker-id" ).datepicker();
	</script>
	
	-->
	
	<div data-role="fieldcontain">
		<label>Due Date:</label>
		<input type="text" id="time-id" placeholder="2015-4-24 12:00"></input>
	</div>
	
	<div data-role="fieldcontain">
		<label>Description:</label>
		<textarea name="textarea" id="desc-id" value placeholder="Description"></textarea>
	</div>
	
	<form data-ajax="false" method="POST" enctype="multipart/form-data">
			<input type="file" name="file" id="file" />
			<input type="submit" id="createAssignment-submit" value="Submit" />
	</form>
	
	<script>
		document.getElementById("createAssignment-submit").onclick = createAssignment;
	</script>
	
	<?php
		//if (!empty($_FILES['file']) && isset($_POST['course-select-id'])) {
		if (!empty($_FILES['file'])) {
			$m = new MongoClient();
			$gridfs = $m->selectDB('mopenlms')->getGridFS();
			//$courseID = $_POST['course-select-id'];
				
			try {
				$gridfs->storeUpload('file');
				//$gridfs->storeUpload('file', array('courseID' => $courseID));
			}
				catch (Exception $e) {
			}

			$m->close();
		}
	?>
</div>

</body>
</html>
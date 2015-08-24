<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>

    <title>Assignments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
		
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
	<script src="../Actions/listClasses.js"></script>
	<script src="../Actions/assignments.js"></script>

</head>

<body>
	<?php
		try {
			//if (!empty($_FILES['file']) && isset($_POST['course-select-id'])) {
			if (!empty($_FILES['file'])) {
				$m = new MongoClient();
				$gridfs = $m->selectDB('mopenlms')->getGridFS();
					
				try {
					//$gridfs->storeUpload('file');
					$gridfs->storeUpload('file', array('courseID' => $_POST['file-course-id'], 
														'username' => $_SESSION['username'],
														'title' => $_POST['file-title-id'],
														'ts' => new MongoDate()));
				}
					catch (Exception $e) {
				}

				$m->close();
			}
		}
		catch (MongoConnectionException $e) {
			echo "error: can not connect to mongodb";
		}
	?>

	<div data-role="page" data-theme="b">
		<div data-role="header" data-theme="b">
			<h1>Assignments</h1>
		</div>
		<?php
			require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
		?>
		<br>
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


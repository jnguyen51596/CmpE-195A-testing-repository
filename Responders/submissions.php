<?php
require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Submissions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
	<link rel="stylesheet" href="/css/main.css" />

	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
	<script src="/Actions/submissions.js"></script>
</head>
<body>
	
	<?php

	// if download is set in url, download the file
	if (isset($_GET['download'])) {
		try {
			$m = new MongoClient();
			$gridfs = $m -> selectDB('mopenlms') -> getGridFS();

			$filename = $_GET['download'];
			$file = $gridfs -> findOne(array('filename' => $filename));
			ob_clean();
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			echo $file->getBytes();

			$m->close();
		}
		catch (Exception $e) {
			echo "error";
		}
	}

	?>
	
	<div data-role="page" data-theme="b">
		<div data-role="header" data-theme="b">
			<h1>View Submissions</h1>
		</div>
		<?php
		require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
		?>
		<br>
		<div id="test">
			<ul id="list" data-role="listview"></ul>
		</div>
	</div>
</body>
</html>
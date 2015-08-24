<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Submissions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
	<link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
			
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	
	<script src="/Actions/submissions.js"></script>
</head>
<body>
	
	<?php
		$m = new MongoClient();
		$gridfs = $m -> selectDB('mopenlms') -> getGridFS();
		// if download is set in url, download the file
		if (isset($_GET['download'])) {
			try {
				$filename = $_GET['download'];
				$file = $gridfs -> findOne(array('filename' => $filename));
				ob_clean();
				header('Content-Disposition: attachment; filename="'.$filename.'"');
				echo $file->getBytes();
			}
			catch (Exception $e) {
				echo "error";
			}
		}
		$m->close();
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
	<?php
		// try {
			// $m = new MongoClient();
			// $gridfs = $m -> selectDB('mopenlms') -> getGridFS();
			
			// // if download is set in url, download the file
			// if (isset($_GET['download'])) {
				// try {
					// $filename = $_GET['download'];
					// $file = $gridfs -> findOne(array('filename' => $filename));
					// ob_clean();
					// header('Content-Disposition: attachment; filename="'.$filename.'"');
					// echo $file->getBytes();
				// }
				// catch (Exception $e) {
					// echo "error";
				// }
			// }
			// // else display the files
			// else { 
				// //$cursor = $gridfs -> find(array('courseID' => $_GET['course']));
				// $cursor = $gridfs -> find(array('courseID' => $_POST['courseID']));
				
				// echo '<ul data-role="listview">';
				// foreach ($cursor as $obj) {
					// $name = $obj->getFilename();
					// $author = $obj -> file['username'];
					// $date = $obj->file["ts"];
					// // echo '<li><a data-ajax=\'false\' href="submissions.php?download='.$name.'">
						// // '.$obj->file["title"] .' submitted by: '.$author.' Filename: '.$name.' Size: '.$obj -> getSize().' </a></li>';
					// echo '<li><a data-ajax=\'false\' href="submissions.php?download='.$name.'">
						// '.$obj->file["title"] .' submitted by: '.$author.' on '.date("Y-M-d h:i:s", $date->sec).'</a></li>';
				// }
				// echo '</ul>';
			// }
			// $m->close();
			// // exit(0);
		// }
		// catch (MongoConnectionException $e) {
			// echo "error: can not connect to mongodb";
		// }
		
	?>
</body>
</html>
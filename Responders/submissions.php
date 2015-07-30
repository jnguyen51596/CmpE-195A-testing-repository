<?php
    require '../Actions/authenticate.php';
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Submissions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="../css/jquerymobile.nativedroid.css" />
	<link rel="stylesheet" href="../css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
	<link rel="stylesheet" href="../css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
			
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
	<?php
		try {
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
			// else display the files
			else { 
				$cursor = $gridfs -> find(array('courseID' => $_GET['course']));
				echo '<ul data-role="listview">';
				foreach ($cursor as $obj) {
					$name = $obj->getFilename();
					echo '<li><a data-ajax=\'false\' href="submissions.php?download='.$name.'">
						Filename: '.$name.' Size: '.$obj -> getSize().' </a></li>';
				}
				echo '</ul>';
			}
			$m->close();
			// exit(0);
		}
		catch (MongoConnectionException $e) {
			echo "error: can not connect to mongodb";
		}
		
	?>
</body>
</html>
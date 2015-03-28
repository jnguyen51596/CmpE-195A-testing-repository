<!DOCTYPE html>
<html>
<head>
</head>
	<body>

		<form method="POST" enctype="multipart/form-data">
			<input type="file" name="pic" id="pic" />
			<input type="submit" />
		</form>

		<?php
		
		$m = new MongoClient();
		$gridfs = $m->selectDB('openlms')->getGridFS();
		
		try {
			$gridfs->storeUpload('pic');
		}
		catch (Exception $e) {
		}

		$m->close();
		
		?>

	</body>
</html>
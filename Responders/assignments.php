<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>

    <title>Assignments</title>
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
    
    <script src="/Actions/listClasses.js"></script>
    <script src="/Actions/assignments.js"></script>

</head>

<body>
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

        <div id="download-list">
        </div>
    </div>

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



// file submission
        try {
            if (!empty($_FILES['file'])) {
                $m = new MongoClient();
                $gridfs = $m->selectDB('mopenlms')->getGridFS();

                $title = $_POST['file-title-id'];
                $username = $_SESSION['username'];
                $course = $_POST['file-course-id'];

                if ($gridfs -> findOne(array('title' => $title, 'username' => $username, 'courseID' => $course)) == true) {
                    $m->selectDB('mopenlms') -> selectCollection('fs.files') -> remove(array('title' => $title, 'courseID' => $course, 'username' => $username));
                }

                $gridfs->storeUpload('file', array('courseID' => $course, 
                   'username' => $username,
                   'title' => $title,
                   'type' => 'student'));
                $m->close();
            }
        }
        catch (MongoConnectionException $e) {
            echo "error: can not connect to mongodb";
        }
        ?>

</body>
</html>


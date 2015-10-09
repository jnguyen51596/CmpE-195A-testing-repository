<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Create An Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
            
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    <script src="/Actions/listClasses.js"></script>
    <script src="/Actions/createAssignment.js"></script>
    
</head>

<body>
    
<div data-role="page" data-theme="b">
    <div data-role="header" data-theme="b">
        <h1>Create Assignment</h1>
    </div>
    <?php
        require ($_SERVER['DOCUMENT_ROOT']."/Responders/navbar.php");
    ?>
    <br>
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

    <!-- <div class="status">
    <div class='message error'>
        <i class='fa fa-exclamation'></i>
        <p>This is an error message that goes over two lines on a mobile device in portrait mode.</p>
    </div>
    </div> -->
    
    <script>
        document.getElementById("createAssignment-submit").onclick = createAssignment;
    </script>
    
    <?php


    // if (!empty($_FILES['file'])) {
    //     $variable = "wtf";
    // } else {
    //     $variable = "files name is " . $_FILES['file']['name'];
    // }

    // if (isset($_FILES['file'])) {
    // $variable = "files name is " . $_FILES['file']['name'];
    // } else {
    //     $variable = "du ma";
    // }
    // error_log(print_r($variable, TRUE)); 

        if (isset($_FILES['file'])) {
        // if ($_FILES['file']['name'] != "") {
            
                
            try {
                $m = new MongoClient();
            $gridfs = $m->selectDB('mopenlms')->getGridFS();
            //$courseID = $_POST['course-select-id'];
                $gridfs->storeUpload('file');
                //$gridfs->storeUpload('file', array('courseID' => $courseID));
                $m->close();
            }
                catch (Exception $e) {
                    echo "<p>Warning: an error has occured. Your file was not uploaded!</p>";
            }

            
        }
    ?>
</div>

</body>
</html>
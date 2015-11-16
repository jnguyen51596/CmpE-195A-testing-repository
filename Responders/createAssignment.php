<?php
    require ($_SERVER['DOCUMENT_ROOT'].'/Actions/authenticate.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Create An Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.css" />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.light.css"  id='jQMnDTheme' />
    <link rel="stylesheet" href="/css/jquerymobile.nativedroid.color.blue.css" id='jQMnDColor' />
            
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    <script src="/Actions/createAssignment.js"></script>
    
    <link rel="stylesheet" href="/plugins/jquery-mobile-datebox-master/css/jqm-datebox.css"/>
    <script src="/plugins/jquery-mobile-datebox-master/js/jqm-datebox.core.js"></script>
    <script src="/plugins/jquery-mobile-datebox-master/js/jqm-datebox.mode.datebox.js"></script>
    <script src="/plugins/jquery-mobile-datebox-master/js/jqm-datebox.mode.calbox.js"></script>
    

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
    <!--
    <div id="class-dropdown-id" data-role="fieldcontain">
        <label>Course:</label>
        <script type="text/javascript">
            initializeClassDDList();
        </script>
    </div>
    -->
    <div role="main">
        <div class="ui-field-contain">
            <label>Assignment Name:</label>
            <input type="text" id="assignmentname-id" placeholder="Assignment name"></input>
        </div>
        
        <div class="ui-field-contain">
            <label>Points:</label>
            <input type="text" id="points-id" placeholder="Points"></input>
        </div>

        <div class="ui-field-contain">
            <label>Date Due:</label>
            <input id="date-id" type="date" data-role="datebox" data-options='{"mode":"calbox"}' />
        </div>

        <div class="ui-field-contain">
            <label>Time Due:</label>
            <input id="time-id" type="time" data-role="datebox" data-options='{"mode":"timebox"}' />
        </div>
        
        <div class="ui-field-contain">
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
</div>

</body>
</html>
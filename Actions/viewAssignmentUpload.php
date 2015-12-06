<?php
try {
    $m = new MongoClient();
    $gridfs = $m -> selectDB('mopenlms') -> getGridFS();
    $courseID = $_POST['courseID'];

    $cursor = $gridfs -> find(array('type' => 'instructor', 'courseID' => $courseID));
    foreach ($cursor as $obj) {
        $name = $obj->getFilename();
        $title = $obj -> file['title'];
        $author = $obj -> file['username'];
        $date = $obj->file["uploadDate"];

        echo '<li class="ui-first-child ui-last-child"><a class="ui-btn ui-btn-icon-right ui-icon-carat-r" data-ajax=\'false\' href="?download='.$name.'">
        '.$title .' uploaded by: '.$author.' on '.date("Y-M-d h:i:s", $date->sec).'</a></li>';
    }
    $m->close();
}
catch (MongoConnectionException $e) {
    echo "Error: can not connect to database";
}
?>
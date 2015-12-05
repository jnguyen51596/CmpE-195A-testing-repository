<?php
    try {
        $m = new MongoClient();
        $gridfs = $m -> selectDB('mopenlms') -> getGridFS();
        
        // display the files
        $cursor = $gridfs -> find(array('courseID' => $_POST['courseID']));
        if ($cursor -> count() == 0) {
            echo "Nothing here";
        }
        else {
            foreach ($cursor as $obj) {
                $name = $obj->getFilename();
                $author = $obj -> file['username'];
                $date = $obj->file["uploadDate"];

                echo '<li class="ui-first-child ui-last-child"><a class="ui-btn ui-btn-icon-right ui-icon-carat-r" data-ajax=\'false\' href="?download='.$name.'">
                    '.$obj->file["title"] .' submitted by: '.$author.' on '.date("Y-M-d h:i:s", $date->sec).'</a></li>';

            }
        }
        $m->close();
    }
    catch (MongoConnectionException $e) {
        echo "Error: can not connect to database";
    }
?>
<?php

session_start();
include 'sql/pdo.php';
$data = $_POST['jsondata'];
$parts1= explode("&", $data[0]);
$classID=$parts1[1];
$parts2= explode("&", $data[1]);
$quiznumber=$parts2[1];
$count = 0;
foreach ($data as $d) {
    $pieces = explode("&", $d);
    if ($pieces[0] == "multiplechoice") {
        deleteQuiz1($classID, $quiznumber, $pieces[1]);
        $count+=1;
    } else if ($pieces[0] == "truefalse") {
        deleteQuiz2($classID, $quiznumber, $pieces[1]);
        $count+=1;
    } else if ($pieces[0] == "shortanswer") {
        deleteQuiz3($classID, $quiznumber, $pieces[1]);
        $count+=1;
    } else {
        $count+=1;
    }
}
if ($count == 2) {
    echo "false";
} else {
    echo "true";
}
?>
